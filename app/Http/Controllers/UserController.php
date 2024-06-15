<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function account()
    {

        return view('user.account');
    }

    public function save(Request $request)
    {
        try {
            $data = $request->all();
            $user = Auth::user();

            if ($request->hasFile('avator')) {
                $imageFile = strtolower($user->mobile).'_'.time().'.'.$request->avator->extension();  
                $request->avator->move(public_path('images/teacher'), $imageFile);
                $data['avator'] = 'images/teacher/'.$imageFile;

                $user = User::findOrFail($user->id);
                $user->update($data);
            }            
            return redirect()->back()->with('message', 'Record updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        };
    }


}
