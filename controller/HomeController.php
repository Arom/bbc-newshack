<?php

require_once "Controller.php";

class HomeController extends Controller { 
    function defaultAction($params) { 
        if($this->method == "post") { 
            echo "this is post.<br>";
        }
        $this->renderHTML('home.html.twig');
    }
    
    function testJSONAction($params) { 
        require 'JSONRequester.php';
        JSONRequester::getFromURLToArray('http://api.wipmania.com/json');
    }
}