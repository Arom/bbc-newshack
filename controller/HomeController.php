<?php

require_once "Controller.php";

class HomeController extends Controller { 
    function defaultAction($params) { 
        if($this->method == "post") { 
            echo "this is post.<br>";
        }
        $this->renderHTML('test.html.twig', array('x' => 'yvalue'));
    }
}