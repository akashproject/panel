<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slot;
use Illuminate\Support\Facades\DB;

class SlotController extends Controller
{
    //
    public function index()
    {
        try {
            $slots = Slot::all();
            return view('administrator.slot.index',compact('slots'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function add() {
        return view('administrator.slot.add');
    }

    public function show($id)
    {
        try {
            $slot = Slot::find($id);
            return view('administrator.slot.show',compact('slot'));
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
            if($data['slot_id'] <= 0){
                $slot = Slot::create($data);
                
            } else {
                $slot = Slot::findOrFail($data['slot_id']);
                $slot->update($data);
            }

            return redirect()->back()->with('message', 'Slot updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    
    public function delete($id) {
        $slot = Slot::findOrFail($id);
        $slot->delete();
        return redirect()->route('admin-slots');
    }
}
