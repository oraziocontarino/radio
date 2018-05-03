<?php
/**
 * Autobot project. 
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Radio\ScriptManager;

class VlcApiController extends Controller
{
	private $update_delay_ms = 100;
    private $max_delay_count = 2000;
    private $SERVER_API_ENDPOINT = "http://:banana@localhost:8080/requests";
    public function __construct()
    {
        //...
    }
    public function status(Request $request){
        $var = $request->all();
        return $this->getStatusResponse($request);
    }

	public function playPauseTrack(Request $request){
		return $this->playPauseTrackAPI($request);
	}

    private function microtime_float()
    {
        list ($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

    private function getStatusResponse($request){
        $server_status = null;
        $client_status = $request->get("client_status");
		if(empty($client_status)){
			$server_status = $this->getStatusAPI();
		}else{
            //check if something changed
			$changed = false;
			$current_update_count = 0;
			while(!$changed){
				$server_status = $this->getStatusAPI();
				$changed = $this->compareStatus($client_status, $server_status);
				if($this->max_delay_count == $current_update_count){
					//force response, avoid request timeout
					$changed = true;
				}else if(!$changed){
					usleep($this->update_delay_ms*1000);
				}
				$current_update_count ++;
			}
		}
		return json_encode($server_status);
	}
	private function compareStatus($client_status, $server_status){
		if(
			(array_key_exists("state", $server_status) && $server_status["state"] != $client_status["state"]) ||
			(array_key_exists("time", $server_status) && $server_status["time"] != $client_status["time"]) ||
			(array_key_exists("length", $server_status) && $server_status["length"] != $client_status["length"]) ||
			(array_key_exists("track_id", $server_status) && $server_status["track_id"] != $client_status["track_id"]) ||
			(array_key_exists("track_name", $server_status) && $server_status["track_name"] != $client_status["track_name"])
		){
			return true;
		}
		return false;
	}

	private function getStatusAPI(){
		$output = [];
		$xmlstr = file_get_contents($this->SERVER_API_ENDPOINT."/status.xml");
		$status = new \SimpleXMLElement($xmlstr);
		$output["state"] = strval($status->state);
		$output["time"] = strval($status->time);
		$output["length"] = strval($status->length);
		$output["volume"] = strval($status->volume);
		$output["track_id"] = strval($status->currentplid);
		foreach($status->information->category[0]->info as $key => $value){
			$attributes = $value->attributes();
			if($attributes["name"] == "filename"){
				$output["track_name"] = strval($value);
			}
		}
		$output["debug"] = $xmlstr;
		return $output;
	}

	private function playPauseTrackAPI($request){
		$track_id = $request->get("track_id");
		if(empty($track_id)){
			abort(500, "track_id not found");
		}
		$output = [];
		$xmlstr = file_get_contents($this->SERVER_API_ENDPOINT."/status.xml?command=pl_pause&id=".$track_id);
		return "true";
	}

	private function getDirectoriesWithMp3(){
		HelperFunctions::log("getDirectoriesWithMp3 1");
        $dirs = array_filter(glob('*'), 'is_dir');
		HelperFunctions::log("getDirectoriesWithMp3 2");
		$recursiveDirectoryIterator = new RecursiveDirectoryIterator("/media/pi");
		HelperFunctions::log("getDirectoriesWithMp3 3");
		$iterator = new RecursiveIteratorIterator($recursiveDirectoryIterator, RecursiveIteratorIterator::SELF_FIRST);
		HelperFunctions::log("getDirectoriesWithMp3 4");
		foreach($iterator as $file) {
			if($file->isDir()) {
				HelperFunctions::log(strtoupper($file->getRealpath()), PHP_EOL);
			}
		}
		HelperFunctions::log("getDirectoriesWithMp3 5");
	}
	
}