<?php

class JSONRequester {
    
    public static function parseJSONFromURL($url, $method = "get", $params = null) { 
        $json = file_get_contents($url);
        return json_decode($json);
    }
}
