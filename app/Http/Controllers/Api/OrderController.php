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

            $data = $request->all();
            return response()->json($data,$this->_statusOK);
            $order = [
                'order_no' => rand('111111','999999'),
                'user_id' => $user->id,
                'coupon_id' => "1",
                'amount' => $data['amount'],
                'plaform_fee' => $data['plaform_fee'],
                'session_price' => $data['session_price'],
                'tax'=> $data['tax'],
                'status' => "pending",
            ];

            $order = Order::create($order);
            $orderItem = [];

            foreach ($data as $key => $value) {
                $orderItem[$key] = [
                    'order_id' => $order->id,
                    'batch_id' => $value['batch_id'],
                    'quantity' => '1',
                    'price' => $value['price'],
                    'trainer' => $value['trainer'],
                    'teacher_fee' => $value['teacher_fee'],
                    'platform_fee' => $value['commission_amount'],
                ];
            }
            
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
                '' => '',
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
