<?php
/**
 * Autobot project. 
 */
namespace App\Radio;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
class HelperFunctions
{
    public static function getDirectories($windows_path, $linux_path, $user_path){
        $real_base_path = self::getBasePath($windows_path, $linux_path);
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

    private static function getBasePath($windows_path, $linux_path){
        
        $is_windows = str_contains(PHP_OS, [
            'WIN32', 
            'WINNT',
            'Windows'
        ]);
        if($is_windows){
            return $windows_path;
        }else{
            return $linux_path;
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