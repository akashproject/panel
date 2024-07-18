<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\Slot;
use App\Models\Course;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    private $_loggedin_user;
    
    public function index()
    {
        //
        try {
            $reports =  DB::table('order_items')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
           // ->join('purchased_sessions', 'purchased_sessions.order_id', '=', 'orders.id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('batches', 'batches.id', '=', 'order_items.batch_id')
            ->join('courses', 'courses.id', '=', 'batches.course_id')
            ->join('slots', 'slots.id', '=', 'batches.slot')
            ->where('order_items.trainer',$this->getLoggedInUser()->id)
            ->select('users.*','orders.*','orders.status as status','courses.name as course','order_items.teacher_fee as teacher_fee','slots.day','slots.start_time','slots.end_time')
            //->whereRaw('GROUP by `order_items`.id;')
            ->get();

         //   dd($reports);
            $totalCustomer = OrderItem::where('trainer',$this->getLoggedInUser()->id)->count();
            $earning = OrderItem::where('trainer',$this->getLoggedInUser()->id)->sum('teacher_fee');
            $pastedBatches = DB::table('purchased_sessions')
                            ->join('batches', 'batches.id', '=', 'purchased_sessions.batch_id')
                            ->where('batches.teacher',$this->getLoggedInUser()->id)
                            ->where('purchased_sessions.status',"0")
                            ->count();
            $upcomingBatches = DB::table('purchased_sessions')
            ->join('batches', 'batches.id', '=', 'purchased_sessions.batch_id')
            ->where('batches.teacher',$this->getLoggedInUser()->id)
            ->where('purchased_sessions.status',"1")
            ->count();

            return view('reports.index',compact('reports','totalCustomer','earning','pastedBatches','upcomingBatches'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    protected function getLoggedInUser()
    {
        return $this->_loggedin_user = Auth::user();
    }
}
