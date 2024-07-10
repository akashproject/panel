<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referrer;

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
}
