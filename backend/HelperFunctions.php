<?php 
class HelperFunctions{
    private static $log_file = "../log/backend.log";
    public static $OS_WINDOWS = "windows";
    public static $OS_LINUX = "linux";
    
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
