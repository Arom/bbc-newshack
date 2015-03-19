<?php
include_once 'Controller.php';
include_once '../lib/JSONRequester.php';
require_once '../config.php';
class MusicEventsController extends Controller{
    function defaultAction($params) {
        
    }
    
    function getEventsByLocationAction($params){
    $lastFMKey = "876909ca137a1bee9bad357d6f066b0a";
        $events = JSONRequester::parseJSONFromURL(
                "http://ws.audioscrobbler.com/2.0/?method=geo.getevents&location=".$params['location']."&api_key=".$lastFMKey."&format=json"
                );
        var_dump($events);
        foreach($events as $item){
            for($i = 0; $i < sizeof($item); $i++) { 
                $event = $item->event[$i];   
                var_dump($event->title);
            }
        }
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

