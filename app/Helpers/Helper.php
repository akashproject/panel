<?php

use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use App\Models\Setting;
use App\Models\UserMeta;

if (! function_exists('check_device')) {
    function check_device($param = null){
        $device = "";
        switch ($param) {
            case 'desktop':
                $device = Agent::isDesktop();
                break;
            case 'tablet':
                $device = Agent::isTablet();
            case 'mobile':
                $device = Agent::isPhone();
                break;
            case 'os':
                $device = Agent::device();
                break;
        }
        
        return $device;
    }
}

if (! function_exists('getSizedImage')) {
    function getSizedImage($id,$size = '') {
        $size = ($size)?$size.'_':"";
        $media = DB::table('media')->where('id',$id)->first();
       
        if($media){
            $filename = env('APP_URL').$media->path.'/'.$size.$media->filename;
            return $filename;
        } else {
            return false;
        }
    }
}

if (! function_exists('getAttachmentUrl')) {
    function getAttachmentUrl($id) {
        $media = DB::table('media')->where('id',$id)->first();
        if($media){
            return $filename = env('APP_URL').$media->path.'/'.$media->filename;
        } else {
            return false;
        }
    }
}

if (! function_exists('thousandsCurrencyFormat')) {
    function thousandsCurrencyFormat($num) {
        if($num>1000) {
            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];
            return $x_display;
        }
        return $num;
    }
}

if (! function_exists('get_theme_setting')) {
    function get_theme_setting($value){
        $settings = Setting::where('key',$value)->first();
        return (isset($settings->value))?$settings->value:"null";
    }
}

if (! function_exists('getNextDateByDayName')) {
    function getNextDateByDayName($dayName) {
        $currentDate = date('Y-m-d');
        $nextDate = date('Y-m-d', strtotime("next $dayName", 	strtotime($currentDate)));
        return $nextDate;
    }
}

if (! function_exists('get_user_meta')) {
    function get_user_meta($user_id,$value){
        $user_meta = UserMeta::where('user_id',$user_id)->where('key',$value)->first();
        return (isset($user_meta->value))?$user_meta->value:null;
    }
}

if (! function_exists('save_user_meta')) {
    function save_user_meta($id,$key,$value){
        $user_meta = UserMeta::where('key', $key)->where('user_id',$id);
        if($user_meta->exists()){
            $user_meta->update(array("user_id"=>$id,"key"=>$key,"value"=>$value));  
        } else {
            $user_meta->create(array("user_id"=>$id,"key"=>$key,"value"=>$value)); 
        }

        return $user_meta;
    }
}
if (! function_exists('getNextDaysNames')) {
    function getNextDaysNames($days = 7) {
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $result = [];

        // Get today's day index
        $today = (int) date('w');
        // Loop through next days
        foreach ($daysOfWeek as $key => $dayofWeek) {
            $key += 1;
            $nextDayIndex = ($today + $key) % 7; // Calculate next day index
            if($key == 7) break;
            $result[] = $daysOfWeek[$nextDayIndex]; // Add day name to result
            
        }
        return $result;
    }
}

if (! function_exists('getDuration')) {
    function getDuration($start_time, $end_time) {
        // Create DateTime objects from the start and end times
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);

        // Calculate the difference between the two times
        $interval = $start->diff($end);

        // Format the interval to a readable string
        $minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
        return $minutes;
    }
}

if (! function_exists('random_strings')) {
    function random_strings($length_of_string) {
    
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result),
                        0, $length_of_string);
    }
}
?>
