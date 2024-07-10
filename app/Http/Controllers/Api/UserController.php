<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
  public $_statusOK = 200;
  public $_statusErr = 500;

  public function register(Request $request)
  {
    try {
      $data = $request->all();
      
      $user = User::create([
        'name' => $data['user']['name'],
        'email' => $data['user']['email'],
        'mobile' => $data['user']['mobile'],
        'password' => Hash::make("123456"),
        'is_approved' => "1",
        'status' => "1",
      ]);
      $user->assignRole('student');

      foreach ($data['userMeta'] as $key => $meta) {
        $user_meta = UserMeta::where('key', $key)->where('user_id',$user->id);
        if($user_meta->exists()){
          $user_meta->update(array("user_id"=>$user->id,"key"=>$key,"value"=>$meta));  
        } else {
          $user_meta->create(array("user_id"=>$user->id,"key"=>$key,"value"=>$meta)); 
        }
      }
      
      $token = auth('api')->login($user);
      return $this->respondWithToken($token);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function login(Request $request)
  {
    $data = $request->all();
    $user = User::where('mobile',$data['mobile'])->first();
    if (!$token = auth("api")->login($user)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    return $this->respondWithToken($token);
  }

  public function getAuthUser(Request $request)
  {
    $user = auth("api")->user();
    return response()->json($user);
  }

  public function logout()
  {
    auth()->logout();
    return response()->json(['message'=>'Successfully logged out']);
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth('api')->factory()->getTTL() * 60
    ]);
  }

  public function getOtp(Request $request){
    try {
      $data = $request->all();
      $randOTP = rand("111111","999999");
      if($data){
        return response()->json($randOTP);
      }
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

}