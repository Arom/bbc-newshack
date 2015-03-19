<?php

include_once 'Controller.php';
include_once '../lib/JSONRequester.php';

class MusicEventsController extends Controller {

    function defaultAction($params) {
        
    }

    function isEventOK($event, $genre) {
        $is = false;
        $eventArtists = $event->artists->artist;
        if (is_array($event->artists->artist)) {
            foreach ($eventArtists as $artist) {
                if ($this->isArtistInGenre($genre, urlencode($artist))) {
                    $is = true;
                    break;
                }
            }
        } else {
            if ($this->isArtistInGenre($genre, urlencode($event->artists->artist))) {
                $is = true;
            }
        }
        return $is;
    }
    function displayImg($event){
        foreach($event->image as $img){
            if($img->size == "extralarge"){
                $img = (array) $img;
               echo "<img src=".$img['#text']."> <br />";
            }
        }
    }
    function getEventsByLocationAction($params) {

        $events = JSONRequester::parseJSONFromURL(
                        "http://ws.audioscrobbler.com/2.0/?method=geo.getevents&location=" . $params['location'] . "&api_key=" . $this->lastFMKey . "&format=json"
        );
        echo "<h1> Matched Events </h1>";
        foreach ($events->events->event as $item) {
                if ($this->isEventOK($item, $params['genre'])) {
                    $this->displayImg($item);
                    echo "Title: " . $item->title . "<br />";
                    if (is_array($item->artists->artist)) {
                        echo "Line up: ";
                        foreach ($item->artists->artist as $artist) {
                            echo $artist . " ";
                        }
                        echo "<br />";
                    } else {
                        echo "Artist : " . $item->artists->artist . " <br />";
                    }
                }
            
        }
    }

    function isArtistInGenre($findGenre, $artist) {
        $is = false;
        $tags = JSONRequester::parseJSONFromURL(""
                        . "http://ws.audioscrobbler.com/2.0/?method=artist.gettoptags&artist=" . $artist . "&api_key=" . $this->lastFMKey . "&format=json"
                        . "");
        foreach ($tags->toptags as $tag) {
            if (is_array($tag)) {
                foreach ($tag as $genre) {
                    if (is_object($genre)) {
                        if ($genre->count > 0) {
                            if ($genre->name == $findGenre) {
                                $is = true;
                                break;
                            }
                        }
                    }
                }
            }
        }
        return $is;
    }

}
