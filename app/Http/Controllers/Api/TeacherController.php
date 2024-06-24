<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{

    public $_statusOK = 200;
    public $_statusErr = 500;

    public function index()
    {
        try {
            $users = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'teacher');
                }
            )->where('is_approved',"1")->where('status',"1")->get();

            foreach ($users as $key => $user) {
                $user->experience = get_user_meta($user->id,"experience");
                $user->sessions = DB::table('batches')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->join('users', 'users.id', '=', 'batches.teacher')
                ->where('users.id',$user->id)
                ->where('batches.status',"1")
                ->select("batches.id as batch_id","courses.name as course","slots.day","slots.start_time","slots.end_time","batches.teacher_fee")
                ->get();
                $users[$key] = $user;
            }
            return response()->json($users,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function show($id){
        try {
            $user = User::select('id','avator','name','email','mobile')->where('id',$id)->first();
            $user->about_me = get_user_meta($user->id,"about_me");
            $user->expertise = get_user_meta($user->id,"expertise");
            $user->sebi_id = get_user_meta($user->id,"sebi_id");
            $user->language = get_user_meta($user->id,"language");
            $user->experience = get_user_meta($user->id,"experience");
            return response()->json($user,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }
}
