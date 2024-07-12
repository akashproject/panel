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
use App\Models\State;
use App\Models\Referrer;
use App\Models\ReferEarn;
use App\Models\PurchasedSession;
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

    public function getStates(){
        try {
            $states = State::select('name','code')->get();
            return response()->json($states,$this->_statusOK);
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
            $order = [
                'order_no' => rand('111111','999999'),
                'user_id' => $user->id,
                'coupon_id' => (isset($data['coupon']) && $data['coupon'] != null)?$data['coupon']['id']:null,
                'amount' => $data['payableAmount'],
                'plaform_fee' => $data['plaformFee'],
                'session_price' => $data['sessionPrice'],
                'tax'=> $data['taxAmount'],
                'status' => "pending",
            ];

            $order = Order::create($order);
            $orderItem = [];

            foreach ($data['cartItem'] as $key => $value) {
                $orderItem[$key] = [
                    'order_id' => $order->id,
                    'batch_id' => $value['batch_id'],
                    'quantity' => '1',
                    'price' => $value['price'],
                    'trainer' => $value['trainer_id'],
                    'teacher_fee' => $value['teacher_fee'],
                    'platform_fee' => $value['commission_amount'],
                ];
            }
            
            OrderItem::insert($orderItem);
            if(isset($data['coupon']) && $data['coupon'] != null){
                ReferEarn::create([
                    'refer_by'=> $data['coupon']['id'],
                    'refer_to'=> $user->id,
                    'order_id'=> $order->id,
                    'code'=> $data['coupon']['code'],
                ]);
            }
            

        return response()->json($order,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function applyCoupon(Request $request){
        try {
            $data = $request->all();
            $coupon = Referrer::where('code',$data['code'])->first();
            return response()->json($coupon,$this->_statusOK);
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
            
            // $order->update([
            //     '' => '',
            // ]);

            $payment = [
                'order_id' => $data['order_id'],
                'type' => $data['type'],
                'card_type' => $data['card_type'],
                'card' => $data['card'],
                'amount' => $data['amount'],
                'date' => date("Y-m-d h:i:s"),
                'payment_id' => $data['payment_id'],
                'status' => $data['status'],
            ];

            $transaction = Transaction::create($payment);

            $order = Order::findOrFail($data['order_id']);
            if($data['status'] == 'paid') {
                $order->update([
                    'status' => "completed"
                ]);

                $orderItem = OrderItem::where('order_id',$order->id)->get();

                foreach ($orderItem as $key => $value) {
                    $batch = DB::table('batches')
                    ->join('slots', 'slots.id', '=', 'batches.slot')
                    ->where('batches.id',$value->batch_id)
                    ->select("slots.day","slots.start_time","slots.end_time")
                    ->first();

                    $currentDay = date('l'); 
                    $currentTime = date('h:i:s');                    
                    if(($currentDay == $batch->day) && (strtotime($batch->start_time) < strtotime($currentTime) && strtotime($currentTime) < strtotime($batch->end_time))){
                        $session_start = date("y-m-d ",strtotime($batch->day)).' '.$batch->start_time;
                        $session_end = date("y-m-d ",strtotime($batch->day)).' '.$batch->end_time;
                    } else {
                        $session_start = getNextDateByDayName($batch->day).' '.$batch->start_time;
                        $session_end = getNextDateByDayName($batch->day).' '.$batch->end_time;
                    }
                    
                    PurchasedSession::create([
                        'order_id'=>$order->id,
                        'user_id' => $order->user_id,
                        'batch_id' => $value->batch_id, 
                        'session_start' => $session_start,
                        'session_end' => $session_end,
                        'status' => "1",
                    ]);
                }
                return response()->json($order,$this->_statusOK);
            }

            
            
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

}
