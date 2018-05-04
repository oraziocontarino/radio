<?php
/**
 * Autobot project. 
 */
namespace App\Radio;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
class HelperFunctions
{
    //To be move in .env config
    //private static $WINDOWS_BASE_PATH = "C:/Users/utente/Desktop/media/pi";
    private static $WINDOWS_BASE_PATH = "E:/Desktop/media/pi";
    private static $LINUX_BASE_PATH = "/media/pi";

    public static function getDirectoriesList($user_path){
        $real_base_path = self::getBasePath();
        $real_external_path = self::getExternalPath($real_base_path, $user_path);
        $directories = File::directories($real_external_path);
        $fixed_directories = [];
        foreach($directories as $dir){
            $fixed_dir = explode($real_base_path, $dir)[1];
            $fixed_dir = str_replace("\\", "/", $fixed_dir);
            array_push($fixed_directories, $fixed_dir);
        }
        return $fixed_directories;
    }

    public static function getFilesList($user_path, $hide_extension=true, $extension="mp3"){
        $real_base_path = self::getBasePath();
        $real_external_path = self::getExternalPath($real_base_path, $user_path)."/*.".$extension;
        $files = File::glob($real_external_path);
        $fixed_files = [];
        $fixed_relative_path = null;
        foreach($files as $file){
            $file = str_replace("\\", "/", $file);
            $fixed_file_path = explode($real_base_path, $file);
            $relative_path = $fixed_file_path[1];

            $components = explode("/", $relative_path);
            $file_name = $components[count($components)-1];
            if(empty($fixed_relative_path)){
                $fixed_relative_path = explode("/".$file_name, $relative_path)[0];
            }
            if($hide_extension){
                $file_name = substr($file_name, 0, (0-strlen($extension)-1));
            }
            array_push($fixed_files, $file_name);
        }
        return [
            "path" => $fixed_relative_path,
            "filesList" => $fixed_files
        ];
    }

    private static function getBasePath(){
        
        $is_windows = str_contains(PHP_OS, [
            'WIN32', 
            'WINNT',
            'Windows'
        ]);
        if($is_windows){
            return self::$WINDOWS_BASE_PATH;
        }else{
            return self::$LINUX_BASE_PATH;
        }
    }
    private static function realpath($path){
        $real = realpath($path);
        if(!empty($real)){
            $real = str_replace("\\", "/", $real);
        }
        return $real;
    }
    private static function getExternalPath($real_base_path, $user_path){
        $user_path = $real_base_path . $user_path;
        $real_user_path = self::realpath($user_path);
        if ($real_user_path === false || strpos($real_user_path, $real_base_path) !== 0) {
            abort(403, "Unauthorized access!");
        } else {
            return $real_user_path;
        }
    }
}