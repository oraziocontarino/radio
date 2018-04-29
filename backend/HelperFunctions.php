<?php 
class HelperFunctions{
    private static $log_file = "/var/www/project-radio.com/public_html/radio/log/backend.log";
    public static $OS_WINDOWS = "windows";
    public static $OS_LINUX = "linux";
    
    function urlExists($url=NULL)  
    {  
        if($url == NULL) return false;  
        $ch = curl_init($url);  
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        $data = curl_exec($ch);  
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
        curl_close($ch);  
        if($httpcode>=200 && $httpcode<300){  
            return true;  
        } else {  
            return false;  
        }  
    }  

    /* return Operating System */
    public static function getOs(){
        if ( isset( $_SERVER ) ) {
            $agent = $_SERVER['HTTP_USER_AGENT'];
        }
        else {
            global $HTTP_SERVER_VARS;
            if ( isset( $HTTP_SERVER_VARS ) ) {
                $agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
            }
            else {
                global $HTTP_USER_AGENT;
                $agent = $HTTP_USER_AGENT;
            }
        }
        $agent = strtolower($agent);
        if (strpos($agent, "windows") !== false) {
            return self::$OS_WINDOWS;
        }
        if (strpos($agent, "linux") !== false) {
            return self::$OS_LINUX;
        }

        if (strpos($agent, "win") !== false) {
            return self::$OS_WINDOWS;
        }
    }

    public static function log($message){
        $date = "[".date('Y/m/d H:i:s')."] ";
        try{
            error_log($date.print_r($message, true).PHP_EOL, 3, self::$log_file);
        }catch(Exception $e){
            error_log($date."Cannot log string".PHP_EOL, 3, self::$log_file);
            error_log($date.$e->getMessage().PHP_EOL, 3, self::$log_file);
        }
    }
}
