<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    //
    public function index()
    {
        try {
            $batches = DB::table('batches')
                
                ->join('slots', 'slots.id', '=', 'batches.slot')
                ->join('courses', 'courses.id', '=', 'batches.course_id')
                ->join('users', 'users.id', '=', 'batches.teacher')
                ->select("batches.id as id","users.name as teacher","courses.name as course","batches.price as price","batches.discounted_price as discounted_price","batches.status as status")
                ->get();
            return view('administrator.batches.index',compact('batches'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }
}
