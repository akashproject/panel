<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Slot;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    //

    public $_statusOK = 200;
    public $_statusErr = 500;

    public function index(Request $request) {
        try {
            $user = auth("api")->user();

            $orders = DB::table('orders')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->get();
            return response()->json($batches,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $user = auth("api")->user();
            if(!$user){
                return response()->json(['unauthorize'],$this->_statusErr);
            }
            $order = [
                'order_no' => rand('111111','999999'),
                'user_id' => $user->id,
                'coupon_id' => "1",
                'amount' => "1500",
                'status' => "pending",
            ];

            $order = Order::create($order);

            $orderItem = [
                [
                    'order_id' => $order->id,
                    'batch_id' => "1",
                    'quantity' => "1",
                    'price' => "1000",
                ],
                [
                    'order_id' => $order->id,
                    'batch_id' => "2",
                    'quantity' => "1",
                    'price' => "500",
                ],
            ];

            OrderItem::insert($orderItem);

        return response()->json($order,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function payment(Request $request){
        try {
            $data = $request->all();

            $user = auth("api")->user();
            if(!$user){
                return response()->json(['unauthorize'],$this->_statusErr);
            }

            $order = Order::findOrFail($data['order_id']);
            $order->update([
                ''
            ]);

            $payment = [
                'order_id' => $data['order_id'],
                'type' => $data['type'],
                'card_type' => $data['card_type'],
                'card' => $data['card'],
                'amount' => $data['amount'],
                'date' => $data['date'],
                'payment_id' => $data['payment_id'],
                'status' => $data['status'],
            ];

            $transaction = Transaction::create($payment);

            $order = Order::findOrFail($data['order_id']);
            if($data['status'] == 'paid') {
                $order->update([
                    'status' => "completed"
                ]);
            }

            return response()->json($order,$this->_statusOK);
            
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

}
