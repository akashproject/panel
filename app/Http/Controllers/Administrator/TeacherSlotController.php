<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TeacherSlot;

class TeacherSlotController extends Controller
{

    public function index($id)
    {
        try {
            $schedules = TeacherSlot::where('teacher_id',$id)->get();
            return view('administrator.users.slots',compact('schedules'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }        
    }
}
