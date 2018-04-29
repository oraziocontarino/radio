<?php 
class ServerConfig{
	private static $server = [
		"password" => "banana",
		"address" => "localhost",
		"port" => "8080"
	];
	
	public static function getBaseUrl(){
		return "http://:".self::$server["password"]."@".self::$server["address"].":".self::$server["port"];
	}
}
