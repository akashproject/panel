<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function allSettings(){
        try {
            $fieldData = Setting::select('key','value')->get();
            $settings = [];
            foreach($fieldData as $value){
                $settings[$value->key] = $value->value;
            }

            return response()->json($settings,$this->_statusOK); 
        }  catch(\Illuminate\Database\QueryException $e){
            return response()->json($e->getMessage(),$this->_statusErr); 
        }
    }
}
