<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::all();
            return view('administrator.orders.index',compact('orders'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function show($id) {
        try {
            $order = Order::findOrFail($id);
            $orderItems = OrderItem::where('order_id',$id)->get();
            //dd($orderItems);
            $user = User::findOrFail($order->user_id);
            $transactions = Transaction::where('order_id',$id)->get();
            return view('administrator.orders.show',compact('order','orderItems','user','transactions'));
        } catch(\Illuminate\Database\QueryException $e){
            
        }
    }
}
