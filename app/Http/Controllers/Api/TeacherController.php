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
            //User::role("teacher")->get();
            $users = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'teacher');
                }
            )->where('is_approved',"1")->where('status',"1")->get();
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
