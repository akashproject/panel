<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        try {
            $users = User::all();
            return view('administrator.users.index',compact('users'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function userByCategory($role)
    {
        try {
            $users = User::role($role)->get();;
            return view('administrator.users.index',compact('users'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('administrator.users.show',compact('user'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
            ]);
            if($data['user_id'] <= 0){
                User::create($data);
            } else {
                $user = User::findOrFail($data['user_id']);
                $user->update($data);
            }
            return redirect()->back()->with('message', 'User updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function approve($id) {
        $user = User::findOrFail($id);
        $user->is_approved = 1;
        $user->save();
        return redirect()->back()->with('success', 'User approved successfully.');
    }


    public function delete($id) {
        $user = User::findOrFail($id);
        $course->delete();
        return redirect('/administrator/users');
    }
}
