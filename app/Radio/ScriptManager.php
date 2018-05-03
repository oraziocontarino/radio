<?php
/**
 * Autobot project. 
 */
namespace App\Radio;
use Illuminate\Support\Facades\Log;
class ScriptManager
{
    public static $SCRIPT_COMMANDS = [ 
        "PLAY_MUSIC", 
        "PAUSE_MUSIC",
        "PREV_TRACK",
        "NEXT_TRACK"
    ];

    public static function runScript($script)
    {
        $script_ext = PHP_OS == "WINNT" ? ".bat" : ".sh";
        $script_name = null;

        if(!in_array(self::$SCRIPT_COMMANDS, $script)){
            return false;
        }

        shell_exec($script.$script_ext);
        return true;
    }
}