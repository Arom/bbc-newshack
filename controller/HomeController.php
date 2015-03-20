<?php

require_once "Controller.php";

class HomeController extends Controller {
    function defaultAction($params) {
        if($this->method == "post") {
            echo "this is post.<br>";
        }
                $this->renderHTML('home.html.twig');

      //  $this->slim->redirect($this->base_url . '/home');
    }

    function testJSONAction($params) {
        require 'JSONRequester.php';
        JSONRequester::getFromURLToArray('http://api.wipmania.com/json');
    }
}
