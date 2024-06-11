<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;


    public function register()
    {
        try {
           
            return response()->json($batches,$this->_statusOK); 
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }
}