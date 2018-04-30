<?php
/**
 * Autobot project. 
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
class RadioController extends Controller
{
    public function __construct()
    {
        //...
    }

    public function mediaplayer(Request $request)
    {
        // Log::debug("webhook received a message");
        $time_start = $this->microtime_float();

        //return view('radio', ['bot_list' => $bot_list]);
        return view('mediaplayer');
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
}