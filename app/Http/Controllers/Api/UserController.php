<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use PHPOpenSourceSaver\JWTAuth\JWTGuard;

class UserController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;


    public function register(Request $request)
    {
      try {
        $user = JWTGuard::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'is_approved' => 1,
        ]);
        $user->assignRole('student');
        $token = auth('api')->login($user);
        return $this->respondWithToken($token);
      } catch(\Illuminate\Database\QueryException $e){
        return response()->json(['error' => $e->errorInfo[2]], 401);
      }
    }

    public function login()
    {
        $credentials = request(['mobile', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
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
}