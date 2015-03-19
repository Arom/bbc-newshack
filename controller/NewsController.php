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
        $jsonData = JSONRequester::parseJSONFromURL($this->baseUrl . $params['k'] . $this->apiKey);
        
        foreach($jsonData->hits as $hit){
            echo $hit->description . "<br>";
        }
        
    }
    
}
