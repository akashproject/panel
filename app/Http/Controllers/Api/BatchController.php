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

class BatchController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function index() {
        try {
            $batches = DB::table('batches')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->get();
            return response()->json($batches,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function liveSessions() {
        try {
            $currentDay = date('l');
            $currentTime = date('H:i');

            $batches = DB::table('batches')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->join('users', 'users.id', '=', 'batches.teacher')
                ->where('slots.day',$currentDay)
                ->where('batches.status',"1")
                ->select("batches.id as batch_id","users.name as trainer","users.avator","courses.name as course","slots.day","slots.start_time","slots.end_time","batches.teacher_fee")
                ->where(function($query) use ($currentTime) {
                    $query->whereRaw('slots.start_time < slots.end_time')
                          ->whereRaw('? BETWEEN slots.start_time AND slots.end_time', [$currentTime]);
                })
                ->orWhere(function($query) use ($currentTime) {
                    $query->whereRaw('slots.start_time > slots.end_time')
                          ->whereRaw('? >= slots.start_time OR ? <= slots.end_time', [$currentTime, $currentTime]);
                })
                ->get();
                foreach ($batches as $key => $batch) {
                    $batch->duration = getDuration($batch->start_time, $batch->end_time);
                    $batch->price = $batch->teacher_fee+get_theme_setting("commission_amount");
                    $batches[$key] = $batch;
                }
                
            return response()->json($batches,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function upcomingSessions() {
        try {
            $nextDays = getNextDaysNames();
            $batches = DB::table('batches')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->join('users', 'users.id', '=', 'batches.teacher')
                ->select("batches.id as batch_id","users.name as trainer","users.avator","courses.name as course","slots.day","slots.start_time","slots.end_time","batches.teacher_fee")
                ->whereIn('slots.day',$nextDays)
                ->where('batches.status',"1")
                ->get();

            foreach ($batches as $key => $batch) {
                $batch->duration = getDuration($batch->start_time, $batch->end_time);
                $batch->price = $batch->teacher_fee+get_theme_setting("commission_amount");
                $batches[$key] = $batch;
            }

            return response()->json($batches,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function show($id) {
        try {
            $batches = DB::table('batches')
                ->where('batches.id',$id)
                ->first();
            return response()->json($batches,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }
}
