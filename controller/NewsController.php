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
        
        // tutja jakies wywalanie do htmla chyba bedzie
        foreach ( $news as $n) {
            echo($n->title . "\n" . $n.getShortContent . "\n\n");
        }
    }
    
    // example id: c8e9bf17ec9494fed5c7071b90c119d76ab8ffbe
    function getSimilarNewsAction($params) {
        $jsonData = JSONRequester::parseJSONFromURL($this->apiBaseUrl . "like-ids[]=" . $params['id'] . $this->apiKey);
        $news = $this->getNewsFromJson($jsonData);
        
        // tutja jakies wywalanie do htmla chyba bedzie
        foreach ( $news as $n) {
            echo($n->title . "\n" . $n.getShortContent . "\n\n");
        }
    }
    
    function getNewsFromJson($json) {
        $allNews = array();
        
        foreach($json->hits as $hit){
            $news = new News();
            $news->setTitle($hit->title);
            $news->setShortContent($hit->description);
            $news->setContent($hit->body);
            $news->setImage($hit->image);
            $news->setUrl($hit->url);
            array_push($allNews, $news);
        }
        return $allNews;
    }
    
}
