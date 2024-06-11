<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function index()
    {
        try {
            $users = User::role("teacher")->get();
            return response()->json($users,$this->_statusOK); 

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function show($id){
        try {
            $user = User::role("teacher")->where('id',$id)->first();
            return response()->json($user,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }
}
