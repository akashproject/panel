<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('administrator.dashboard');
    }

    public function chcekMailTemplate($template){
        try {
            return view('emails.'.$template);
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }
    
}