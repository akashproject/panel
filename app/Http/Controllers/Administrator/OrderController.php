<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
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
            $order = DB::table('orders')->where('id',"1")->first();
            return view('administrator.orders.show',compact('order'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }
}
