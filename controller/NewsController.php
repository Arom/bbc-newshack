<?php
/**
 * Description of NewsController.
 *
 * @author agilob
 */

include_once 'Controller.php';
include_once '../lib/JSONRequester.php';
require_once '../config.php';

class NewsController extends Controller {
    
    function defaultAction($params) {
        die("NewsController:default:not implemented");
    }
    
    function getNewsByKeywordAction($params) {
        $jsonData = JSONRequester::parseJSONFromURL($this->apiBaseUrl. "q=" . $params['k'] . $this->apiKey);
        $news = $this->getNewsFromJson($jsonData);
        
    }
    
    // example id: c8e9bf17ec9494fed5c7071b90c119d76ab8ffbe
    function getSimilarNewsAction($params) {
        $jsonData = JSONRequester::parseJSONFromURL($this->apiBaseUrl . "like-ids[]=" . $params['id'] . $this->apiKey);
        $news = $this->getNewsFromJson($jsonData);
        
    }
    
    function getNewsFromJson($json) {
        $news = 1; 
        foreach($json->hits as $hit){
            echo $hit->description . "<br>";
        }
        return $news;
    }
    
}
