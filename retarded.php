<?php

/**
 * @author Bibhas
 * @copyright 2010
 */

class Retarded{
    public function EchoInPre($text){
        echo "<pre>" . $text . "</pre>";
    }
    
    public function SayHello(){
        self::_epre("Hello, This is the Retarded Framework v0.1 built by Bibhas Chandra Debnath.");
    }
    
    public function ConUrl($baseUrl,$param_array){
        $escUrl=rawurlencode($baseUrl);
        $param="";
        if(count($param_array)>0){
            $param .= "?";
            foreach ($param_array as $name=>$value) {
                $name=urlencode($name);
                $value=urlencode($value);
                $param.="$name=$value&";
            }
            $param=substr($param,0,(strlen($param)-1));
        }
        $retUrl=htmlspecialchars($escUrl.$param);
        return $retUrl;
    }
    
    public function ObjectToArray($data){ // Converts a Nested stdObject to a full associative Array
        if(is_array($data) || is_object($data)){
            $result = array();
            foreach($data as $key => $value){
                $result[$key] = self::objectToArray($value);
            }
            return $result;
        }
        return $data;
    }
    
    public function ArrayPrint($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    
    public function WriteFile($text, $location, $mode="w+"){
        $fp=fopen($location, $mode);
        fwrite($fp, $text);
        fclose($fp);
    }
    
    public function GetWebPage( $url )
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "SpiderMan", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        );
    
        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );
    
        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }
}

?>