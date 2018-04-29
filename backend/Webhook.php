<?php 
include "ServerConfig.php";
include "HelperFunctions.php";

class Webhook{
	private static $endpoint = [
		"status" => "/requests/status.xml",
	];
	private static $update_delay_ms = 100;
	private static $max_delay_count = 2000;

	public static function doPost($request){
		if(!isset($request["api"]) || empty($request["api"])){
			return;
		}
		$output = [];
		switch($request["api"]){
			case "status":
				echo self::getStatusResponse($request);
			break;
		}
	}

	public static function doGet($request){
		if(!isset($request["api"]) || empty($request["api"])){
			return;
		}
		$output = [];
		switch($request["api"]){
			case "test":
			$os = HelperFunctions::getOs();
			//HelperFunctions::log($os);
			break;
			case "playFolder":
				self::playFolder($request);
			break;
		}

		//foreach($output as $key => $value){
			//echo "[".$key."] = ".print_r($value, true)."</br>";
		//}
	}



	private static function playFolder($request){
		$os = HelperFunctions::getOs();
		if($os == HelperFunctions::$OS_WINDOWS){
			HelperFunctions::log(__DIR__ . DIRECTORY_SEPARATOR);
			//$out = shell_exec("shell-script/windows/run-vlc-service.bat ../");
		}else if($os == HelperFunctions::$OS_LINUX){
			HelperFunctions::log("CANNOT RUN VLC IN LINUX, NOT CURRENTLY IMPLEMENTED!");
		}
	}

	private static function getStatusResponse($request){
		$server_status = null;
		if(!isset($request["vlcInterfaceStatus"]) || empty($request["vlcInterfaceStatus"])){
			$server_status = self::getStatusAPI();
		}else{
			//check if something changed
			$client_status = $request["vlcInterfaceStatus"];
			$changed = false;
			$current_update_count = 0;
			while(!$changed){
				$server_status = self::getStatusAPI();
				$changed = self::compareStatus($client_status, $server_status);
				if(self::$max_delay_count == $current_update_count){
					//force response, avoid request timeout
					$changed = true;
				}else if(!$changed){
					usleep(self::$update_delay_ms*1000);
				}
				$current_update_count ++;
			}
		}
		getDirectoriesWithMp3();
		sleep(10);
		return json_encode($server_status);
	}
	private static function compareStatus($client_status, $server_status){
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

	private static function getStatusAPI(){
		$output = [];
		$xmlstr = file_get_contents(ServerConfig::getBaseUrl().self::$endpoint["status"]);
		$status = new SimpleXMLElement($xmlstr);
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

	public static function getDirectoriesWithMp3(){
        $dirs = array_filter(glob('*'), 'is_dir');
		$a = 5;
		$iterator = new RecursiveIteratorIterator(
					new RecursiveDirectoryIterator("/media/pi"), 
				RecursiveIteratorIterator::SELF_FIRST);

		foreach($iterator as $file) {
			if($file->isDir()) {
				
				HelperFunctions::log(strtoupper($file->getRealpath()), PHP_EOL);
			}
		}
    }
}