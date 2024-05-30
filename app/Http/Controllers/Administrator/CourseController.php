<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function index()
    {
        try {
            $courses = Course::all();
            return view('administrator.courses.index',compact('courses'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function add() {
        return view('administrator.courses.add');
    }

    public function show($id)
    {
        try {
            $course = Course::find($id);
            return view('administrator.courses.show',compact('course'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function curriculum($id){
        try {
            $carriculam = Curriculum::where('course_id',$id)->get();
            $course = Course::find($id);
            return view('administrator.courses.curriculum',compact('carriculam','id','course'));       
        } catch(\Illuminate\Database\QueryException $e){
        }     
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $data['slug'] = strtolower(str_replace(' ','-',$data['name']));  
            if($data['course_id'] <= 0){
                $course = Course::create($data);
            } else {
                $course = Course::findOrFail($data['course_id']);
                $course->update($data);
            }
            return redirect()->back()->with('message', 'Course updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    
    public function delete($id) {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/administrator/courses');
    }
}
