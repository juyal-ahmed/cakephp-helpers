<?php
class WscrapperHelper extends AppHelper {
    var $helpers = array('Text');
    
    function __construct(){
    
    }
    
        
    /*
    * 
    * @ param string $url as 'http://maps.google.com'; Page url location which you want to fetch
    * @ param string $proxy [optional] as '[proxy IP]:[port]'; Proxy address and port number 
    * which you want to use
    * @ param string $userpass [optional] as '[username]:[password]'; Proxy authentication 
    * username and password
    * @ return a url page html content
    * */
     
    function getPage($url, $proxy='', $userpass='') {
     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     
        if(!empty($proxy))
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
     
        if(!empty($userpass))
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $userpass);
     
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
     
    /*
    * 
    * @ param string $data Full html content which you want to parse
    * @ param string $s_tag Start tag of html content
    * @ param string $e_tag End tag of html content
    * @ return middle html content from given start tag and end tag of $data
    * */
     
    function getValueByTagName( $data, $s_tag, $e_tag) {
            $s = strpos( $data,$s_tag) + strlen( $s_tag);
            $e = strlen( $data);
            $data= substr($data, $s, $e);
            $s = 0;
            $e = strpos( $data,$e_tag);
            $data= substr($data, $s, $e);
            $data= substr($data, $s, $e);
            return  $data;
    }    
}