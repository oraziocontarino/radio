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





/*
    Working with XML. Usage: 
    $xml=xml2ary(file_get_contents('1.xml'));
    $link=&$xml['ddd']['_c'];
    $link['twomore']=$link['onemore'];
    // ins2ary(); // dot not insert a link, and arrays with links inside!
    echo ary2xml($xml);
*/

// XML to Array
function xml2ary(&$string) {
    $parser = xml_parser_create();
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parse_into_struct($parser, $string, $vals, $index);
    xml_parser_free($parser);

    $mnary=array();
    $ary=&$mnary;
    foreach ($vals as $r) {
        $t=$r['tag'];
        if ($r['type']=='open') {
            if (isset($ary[$t])) {
                if (isset($ary[$t][0])) $ary[$t][]=array(); else $ary[$t]=array($ary[$t], array());
                $cv=&$ary[$t][count($ary[$t])-1];
            } else $cv=&$ary[$t];
            if (isset($r['attributes'])) {foreach ($r['attributes'] as $k=>$v) $cv['_a'][$k]=$v;}
            $cv['_c']=array();
            $cv['_c']['_p']=&$ary;
            $ary=&$cv['_c'];

        } elseif ($r['type']=='complete') {
            if (isset($ary[$t])) { // same as open
                if (isset($ary[$t][0])) $ary[$t][]=array(); else $ary[$t]=array($ary[$t], array());
                $cv=&$ary[$t][count($ary[$t])-1];
            } else $cv=&$ary[$t];
            if (isset($r['attributes'])) {foreach ($r['attributes'] as $k=>$v) $cv['_a'][$k]=$v;}
            $cv['_v']=(isset($r['value']) ? $r['value'] : '');

        } elseif ($r['type']=='close') {
            $ary=&$ary['_p'];
        }
    }    
    
    _del_p($mnary);
    return $mnary;
}

// _Internal: Remove recursion in result array
function _del_p(&$ary) {
    foreach ($ary as $k=>$v) {
        if ($k==='_p') unset($ary[$k]);
        elseif (is_array($ary[$k])) _del_p($ary[$k]);
    }
}

// Array to XML
function ary2xml($cary, $d=0, $forcetag='') {
    $res=array();
    foreach ($cary as $tag=>$r) {
        if (isset($r[0])) {
            $res[]=ary2xml($r, $d, $tag);
        } else {
            if ($forcetag) $tag=$forcetag;
            $sp=str_repeat("\t", $d);
            $res[]="$sp<$tag";
            if (isset($r['_a'])) {foreach ($r['_a'] as $at=>$av) $res[]=" $at=\"$av\"";}
            $res[]=">".((isset($r['_c'])) ? "\n" : '');
            if (isset($r['_c'])) $res[]=ary2xml($r['_c'], $d+1);
            elseif (isset($r['_v'])) $res[]=$r['_v'];
            $res[]=(isset($r['_c']) ? $sp : '')."</$tag>\n";
        }
        
    }
    return implode('', $res);
}

// Insert element into array
function ins2ary(&$ary, $element, $pos) {
    $ar1=array_slice($ary, 0, $pos); $ar1[]=$element;
    $ary=array_merge($ar1, array_slice($ary, $pos));
}
}
