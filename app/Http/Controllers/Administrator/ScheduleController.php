<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        try {
            $schedules = Schedule::all();
            return view('administrator.schedule.index',compact('schedules'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function add() {
        return view('administrator.schedule.add');
    }

    public function show($id)
    {
        try {
            $schedule = Schedule::find($id);
            return view('administrator.schedule.show',compact('schedule'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'day' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
            ]);
            $data['slug'] = strtolower($data['day']).'-'.str_replace(':','-',$data['start_time']).'-'.str_replace(':','-',$data['end_time']);       
            if($data['schedule_id'] <= 0){
                $schedule = Schedule::create($data);
                
            } else {
                $schedule = Schedule::findOrFail($data['schedule_id']);
                $schedule->update($data);
            }

            return redirect()->back()->with('message', 'Schedule updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    
    public function delete($id) {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect('/administrator/courses');
    }
}
