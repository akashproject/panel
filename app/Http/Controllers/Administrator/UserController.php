<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Hash;

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

    public function add() {
        return view('administrator.users.add');
    }

    public function userByCategory($role){
        try {
            $users = User::role($role)->get();
            return view('administrator.users.index',compact('users'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
        
    }

    public function show($id){
        try {
            $user = User::findOrFail($id);
            $fieldData = UserMeta::where('user_id',$user->id)->get();
            $user_meta = array();
            foreach ($fieldData as $key => $value) {
                $user_meta[$value->key] = $value->value;
            }
            return view('administrator.users.show',compact('user','user_meta'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }        
    }

    public function insert(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'mobile' => 'required',
            ]);

            $password = "12345678";
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($password),
                'is_approved' => "0",
                'status' => "1",
                'email_verified_at' => date('Y-m-d h:i:s'),
            ]);
            $user->assignRole('teacher');

            return redirect()->back()->with('message', 'User inserted successfully!');
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

            $user = User::findOrFail($data['user_id']);
            $user->update($data);

            return redirect()->back()->with('message', 'User updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function saveProfile(Request $request)
    {
        try {
            $data = $request->all();
            $user = User::findOrFail($data['user_id']);
            unset($data['_token']);
            foreach($data as $key => $value){
                $user_meta = UserMeta::where('key', $key)->where('user_id',$user->id);
                if($user_meta->exists()){
                    $user_meta->update(array("user_id"=>$user->id,"key"=>$key,"value"=>$value));  
                } else {
                    $user_meta->create(array("user_id"=>$user->id,"key"=>$key,"value"=>$value)); 
                }
            }
            return redirect()->back()->with('message', 'Record updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        };
    }

    public function approve($id,$is_approve) {
        $user = User::findOrFail($id);
        $user->is_approved = $is_approve;
        $user->save();
        return redirect()->back()->with('success', 'User approved successfully.');
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/administrator/users');
    }

    public function addStreamPlayer($id){
        try {
            $user_meta = [
                'streaming_player' =>(get_user_meta($id,"streaming_player"))?get_user_meta($id,"streaming_player"):'',
                'user_id' =>$id,
            ];

            return view('administrator.users.add-stream-player',compact("user_meta"));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function saveStreamPlayer(Request $request) {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'user_id' => 'required',
                'streaming_player' => 'required',
            ]);

            save_user_meta($data['user_id'],"streaming_player",$data['streaming_player']);
            return redirect()->back()->with('message', 'Record updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }
}
