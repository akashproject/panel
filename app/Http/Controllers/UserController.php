<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserMeta;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        $fieldData = UserMeta::where('user_id',$user->id)->get();
        $user_meta = array();
        foreach ($fieldData as $key => $value) {
            $user_meta[$value->key] = ($value->key == 'expertise')?json_decode($value->value):$value->value;
        }
        if(array_key_exists("expertise",$user_meta)){
            $user_meta['expertise'] = json_decode($user_meta['expertise']);
        }

        return view('user.profile',compact("user_meta"));
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

    public function saveProfile(Request $request)
    {
        try {
            $data = $request->all();
            $user = Auth::user();
            unset($data['_token']);
            foreach($data as $key => $value){
                $value = (is_array($value))?json_encode($value):$value;
                $user_meta = UserMeta::where('key', $key)->where('user_id',$user->id);
                if($user_meta->exists()){
                    $user_meta->update(array("user_id"=>$user->id,"key"=>$key,"value"=>$value));  
                } else {
                    $user_meta->create(array("user_id"=>$user->id,"key"=>$key,"value"=>$value)); 
                }
            }
            return redirect()->back()->with('message', 'Record updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        };
    }

}
