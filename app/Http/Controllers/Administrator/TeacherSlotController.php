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
            $teacherSlot = TeacherSlot::where('teacher_id',$teacher_id)->first();
            $schedules = Schedule::all();
            return view('administrator.users.slots',compact('schedules','teacherSlot','teacher_id'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'min' => 'required',
                'max' => 'required',
                'slots' => 'required',
            ]);

            $data['slots'] = json_encode($data['slots']);
            if($data['teacher_slot_id'] <= 0){
                $teacherSlot = TeacherSlot::create($data);
            } else {
                $teacherSlot = TeacherSlot::findOrFail($data['teacher_slot_id']);
                $teacherSlot->update($data);
            }

            return redirect()->back()->with('message', 'Schedule updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }
}
