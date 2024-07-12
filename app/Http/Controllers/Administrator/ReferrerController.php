<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrer;
use Illuminate\Support\Facades\DB;

class ReferrerController extends Controller
{
    //
    public function index()
    {
        try {
            $referrers = Referrer::all();
            return view('administrator.referrers.index',compact('referrers'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function add() {
        return view('administrator.referrers.add');
    }

    public function show($id){
        try {
            $referrer = Referrer::findOrFail($id);
            return view('administrator.referrers.show',compact('referrer'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'code' => 'required',
                'commission' => 'required',
                'discount' => 'required',
            ]);
            if($data['referrer_id'] <= 0){
                $referrer = Referrer::create($data);
            } else {
                $referrer = Referrer::findOrFail($data['referrer_id']);
                $referrer->update($data);
            }
            return redirect()->back()->with('message', 'referrer updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function referEarn()
    {
        try {
            $referearns = DB::table('refer_earns')
                ->join('users', 'users.id', '=', 'refer_earns.refer_to')
                ->join('referrers', 'referrers.id', '=', 'refer_earns.refer_by')
                ->join('orders', 'orders.id', '=', 'refer_earns.order_id')
                ->select("orders.id as order_id","orders.order_no","referrers.name as refer_by","users.name as refer_to","referrers.code","referrers.discount","referrers.commission","referrers.status",)->get();

            return view('administrator.referrers.referearns',compact('referearns'));
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }
}
