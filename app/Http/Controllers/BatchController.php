<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\Slot;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BatchController extends Controller
{
    private $_loggedin_user;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $batches = DB::table('batches')
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->where('batches.teacher',$this->getLoggedInUser()->id)
                ->get();
            return view('batches.index',compact('batches'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $slots = Slot::whereRaw('max > 0')->get();
        $courses = Course::all();
        return view('batches.add',compact('slots','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'course_id' => 'required',
                'slot' => 'required',
                'teacher_fee' => 'required',
            ]);
            $data['teacher'] = $this->getLoggedInUser()->id;
            //$data['sku'] = "sku_".rand(0000,9999);
         
            if($data['batch_id'] <= 0){
                $batch = Batch::create($data);
                //update max slot
                $slot = Slot::findOrFail($data['slot']);
                $slot->update(['max' => $slot->max = $slot->max-1]);
            } else {
                $batch = Batch::findOrFail($data['batch_id']);
                $batch->update($data);
            }

            return redirect()->back()->with('message', 'Record updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Batch $batch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        //
    }

    protected function getLoggedInUser()
    {
        return $this->_loggedin_user = Auth::user();
    }
}
