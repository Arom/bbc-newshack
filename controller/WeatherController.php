<?php

require_once 'Controller.php';

class WeatherController extends Controller {
    function defaultAction($params) {
       if($this->method == "post"){
           echo "post";
       }
    }
}
