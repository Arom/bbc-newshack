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
      $p = array();
      $p['news_data'] = $this->getNewsByKey("cat");
      $this->renderHTML('news.html.twig', $p);
    }

    function getNewsByKey($keyword) {
        $jsonData = JSONRequester::parseJSONFromURL($this->apiBaseUrl. "q=" . $keyword . '&apikey=' . $this->apiKey);
        return $this->getNewsFromJson($jsonData);
    }

    function getNewsByKeywordAction($params) {
        $jsonData = JSONRequester::parseJSONFromURL($this->apiBaseUrl. "q=" . $params['k'] . '&apikey=' . $this->apiKey);
        return $this->getNewsFromJson($jsonData);
    }

    // example id: c8e9bf17ec9494fed5c7071b90c119d76ab8ffbe
    function getSimilarNewsAction($params) {
        $jsonData = JSONRequester::parseJSONFromURL($this->apiBaseUrl . "like-ids[]=" . $params['id'] . '&apikey=' . $this->apiKey);
        $news = $this->getNewsFromJson($jsonData);

        $this->renderHTML('news.html.twig');
    }

    function getNewsFromJson($json) {
        $allNews = array();

        foreach($json->hits as $hit){
            $news = new News();
            $news->setTitle($hit->title);
            $news->setShortContent($hit->description);
            $news->setContent($hit->body);
            
            if (is_null($hit->image) || $hit->image == "") {
                $news->setImage("https://newevolutiondesigns.com/images/freebies/cat-wallpaper-2.jpg");
            } else {
                $news->setImage($hit->image);
            }

            $news->setUrl($hit->url);
            array_push($allNews, $news);
        }
        return $allNews;
    }

}
