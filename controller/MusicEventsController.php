<?php
include_once 'Controller.php';
include_once '../lib/JSONRequester.php';


class MusicEventsController extends Controller {

    function defaultAction($params) {
        
    }
   //Is event suitable for user taste?
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
    //Displays available images for the events
    function displayImg($event){
        foreach($event->image as $img){
            if($img->size == "extralarge"){
                $img = (array) $img;
               echo "<img src=".$img['#text']."> <br />";
            }
        }
    }
    function getEventsByLocationAction($params) {
    $lastFMKey = "876909ca137a1bee9bad357d6f066b0a";
        //Get max of 30 events in 100km range of location
        $events = JSONRequester::parseJSONFromURL(
                        "http://ws.audioscrobbler.com/2.0/?method=geo.getevents&location=" . $params['location'] . "&api_key=" . $lastFMKey . "&distance=100&limit=30&format=json"
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
    //Artist contains appropriate genre tags?
    function isArtistInGenre($findGenre, $artist) {
            $lastFMKey = "876909ca137a1bee9bad357d6f066b0a";

        $is = false;
        $tags = JSONRequester::parseJSONFromURL(""
                        . "http://ws.audioscrobbler.com/2.0/?method=artist.gettoptags&artist=" . $artist . "&api_key=" . $lastFMKey . "&format=json"
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
