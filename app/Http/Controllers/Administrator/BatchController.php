<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    public function index(){
        try {
            $batches = DB::table('batches')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->join('users', 'users.id', '=', 'batches.teacher')
                ->select("batches.id as id","users.name as teacher","courses.name as course","batches.teacher_fee as price","batches.status as status")
                ->get();
            return view('administrator.batches.index',compact('batches'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
            var_dump($e->getMessage()); 
        }
    }

    public function show($id) {
        try {
            $batch = DB::table('batches')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->join('users', 'users.id', '=', 'batches.teacher')
                ->select("batches.id as id","users.name as teacher","courses.name as course","batches.teacher_fee as price","batches.status as status","slots.day","slots.start_time","slots.end_time")
                ->where('batches.id',$id)
                ->first();
                return view('administrator.batches.show',compact('batch'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'status' => 'required',
            ]);
            
            $batch = Batch::findOrFail($data['batch_id']);
            $batch->update($data);
            return redirect()->back()->with('message', 'Batch updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }
}
