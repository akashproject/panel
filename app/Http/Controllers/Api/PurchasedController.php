<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Slot;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchasedController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function joinStream($id){
        try {
            $user = auth("api")->user();
            if(!$user){
                return response()->json(['unauthorize'],$this->_statusErr);
            }
            $currentDay = date('l');
            $currentTime = date('H:i');
            $session = DB::table('purchased_sessions')
                ->join('batches', 'batches.id', '=', 'purchased_sessions.batch_id')
                ->join('users', 'batches.teacher', '=', 'users.id')
                ->where('purchased_sessions.user_id',$user->id)
                ->where('purchased_sessions.id',base64_decode($id))
                ->select("users.name as teacher","users.id as trainer_id","purchased_sessions.session_start", "purchased_sessions.session_end")
                ->first();

            $session->duration = getDuration($session->session_start, $session->session_end);
            $session->experience = get_user_meta($session->trainer_id,"experience");
            $session->expertise = get_user_meta($session->trainer_id,"expertise");

            
            return response()->json($session,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }

    }

    public function liveSessions() {
        try {

            $user = auth("api")->user();
            if(!$user){
                return response()->json(['unauthorize'],$this->_statusErr);
            }

            $currentTime = date('y-m-d H:i:s');

            $sessions = DB::table('purchased_sessions')
                ->join('batches', 'batches.id', '=', 'purchased_sessions.batch_id')
                ->join('users', 'batches.teacher', '=', 'users.id')
                ->where('purchased_sessions.user_id',$user->id)
                ->where('purchased_sessions.status',"1")
                ->select("purchased_sessions.id as id","users.name as trainer","users.id as trainer_id","users.avator","purchased_sessions.session_start","purchased_sessions.session_end","batches.teacher_fee")
                ->where(function($query) use ($currentTime) {
                    $query->whereRaw('purchased_sessions.session_start < purchased_sessions.session_end')
                          ->whereRaw('? BETWEEN purchased_sessions.session_start AND purchased_sessions.session_end', [$currentTime]);
                })
                ->get();
                
                foreach ($sessions as $key => $batch) {
                    $batch->duration = getDuration($batch->session_start, $batch->session_end);
                    $batch->experience = get_user_meta($batch->trainer_id,"experience");
                    $batch->expertise = get_user_meta($batch->trainer_id,"expertise");
                    $sessions[$key] = $batch;
                }
                
            return response()->json($sessions,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function upcomingSessions() {
        try {
            $user = auth("api")->user();
            if(!$user){
                return response()->json(['unauthorize'],$this->_statusErr);
            }
            $currentTime = date('y-m-d H:i:s');
            $nextDays = getNextDaysNames();
            $sessions = DB::table('purchased_sessions')
                ->join('batches', 'batches.id', '=', 'purchased_sessions.batch_id')
                ->join('users', 'batches.teacher', '=', 'users.id')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->select("purchased_sessions.id as id","users.name as trainer","users.id as trainer_id","users.avator","purchased_sessions.session_start","purchased_sessions.session_end","batches.teacher_fee")
                ->where('purchased_sessions.user_id',$user->id)
                ->where('purchased_sessions.status',"1")
                ->where('purchased_sessions.session_start',">",$currentTime)
                ->get();
                
            foreach ($sessions as $key => $batch) {
                $batch->duration = getDuration($batch->session_start, $batch->session_end);
                $batch->session_start = date("M d, h:i",strtotime($batch->session_start));
                $batch->session_end = date("h:i",strtotime($batch->session_end));
                $batch->experience = get_user_meta($batch->trainer_id,"experience");
                $batch->expertise = get_user_meta($batch->trainer_id,"expertise");
                $sessions[$key] = $batch;
            }

            return response()->json($sessions,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function pastSessions() {
        try {
            $user = auth("api")->user();
            if(!$user){
                return response()->json(['unauthorize'],$this->_statusErr);
            }

            $sessions = DB::table('purchased_sessions')
                ->join('batches', 'batches.id', '=', 'purchased_sessions.batch_id')
                ->join('users', 'batches.teacher', '=', 'users.id')
                ->select("purchased_sessions.id as id","users.name as trainer","users.id as trainer_id","users.avator","purchased_sessions.session_start","purchased_sessions.session_end","batches.teacher_fee")
                ->where('purchased_sessions.user_id',$user->id)
                ->where('purchased_sessions.status',"0")
                ->get();
                
            foreach ($sessions as $key => $batch) {
                $batch->duration = getDuration($batch->session_start, $batch->session_end);
                $batch->experience = get_user_meta($batch->teacher,"experience");
                $batch->expertise = get_user_meta($batch->teacher,"expertise");
                $sessions[$key] = $batch;
            }
            return response()->json($sessions,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }
}
