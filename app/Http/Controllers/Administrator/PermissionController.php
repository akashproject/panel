<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        try {
            $permissions = Permission::all();
            return view('administrator.permissions.index',compact('permissions'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
			
            $validatedData = $request->validate([
                'permission' => 'required',
            ]);
            Permission::create(['name' => $data['permission']]);
            return redirect()->back()->with('message', 'Permission updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }
}
