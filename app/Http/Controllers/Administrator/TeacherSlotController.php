<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TeacherSlot;
use App\Models\Schedule;

class TeacherSlotController extends Controller
{

    public function index($teacher_id)
    {
        try {
            $teacherSlots = TeacherSlot::where('teacher_id',$teacher_id)->get();
            $schedules = Schedule::all();
            return view('administrator.users.slots',compact('schedules'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }        
    }
}
