<?php
/**
 * Autobot project. 
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Radio\HelperFunctions;
use Illuminate\Support\Facades\File;

class RadioController extends Controller
{
    public function __construct()
    {
        //...
    }
    public function test(Request $request){
        $files = File::glob("C:/Users/utente/Desktop/media/pi/*.mp3");

        echo print_r($files, true);
        return $files;
        //echo "this is a test function";
        //return "this is a test function";

    }
    public function mediaplayer(Request $request)
    {
        $time_start = $this->microtime_float();

        //return view('radio', ['bot_list' => $bot_list]);
        return view('mediaplayer');
        //return view('mediaplayer2'); 
    }

    private function microtime_float()
    {
        list ($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

    public function status(Request $request){
        $var = $request->all();
        Log::debug("test");
        Log::debug(print_r($var));
    }

    public function getDirectories(Request $request){
        $user_path = $request->get('user_path');
        if(empty($user_path)){
            abort(500, "HTTP 'user_path' is requiered!");
        }
        $directories = HelperFunctions::getDirectoriesList($user_path);
        
        return json_encode($directories);
    }
   
    public function getTracksList(Request  $request){
        $user_path = $request->get('user_path');
        if(empty($user_path)){
            abort(500, "HTTP 'user_path' is requiered!");
        }
        $files = HelperFunctions::getFilesList($user_path);
       
        return json_encode($files);
    }
}
