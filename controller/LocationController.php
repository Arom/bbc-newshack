<?php

include_once 'Controller.php';
include_once '../config.php';
include_once '../lib/JSONRequester.php';

class LocationController extends Controller {

    function defaultAction($params) {
        parent::defaultAction($params);
    }

    function searchPlacenameAction($params) {

        $place = JSONRequester::parseJSONFromURL
                        ("http://data.bbc.co.uk/locservices-locator/locations?apikey="
                        . $this->apiKey . "&vv=2&format=json&order=importance&filter=domestic&search=" . $params['placename']);
        foreach ($place->response->content->locations->locations as $location) {
            echo $location->name . " <br />";
        }
    }

    function findLocationIDByCoordinatesAction($params) {
        if ($this->method == "post") {
            $locationArray = array();
            $place = JSONRequester::parseJSONFromURL
                            ("http://data.bbc.co.uk/locservices-locator/locations?apikey="
                            . $this->apiKey . "&vv=2&format=json&order=importance&filter=domestic&longitude="
                            . $params['long']
                            . "&latitude=" . $params['lat']);
            foreach ($place->response->content->locations->locations as $location) {
                $oneLocation = array();
                $oneLocation['id'] = $location->id;
                $oneLocation['name'] = $location->name;
                array_push($locationArray, $oneLocation);
                break;
            }
            echo json_encode($locationArray);
        }
    }

    function findLocationByCoordinatesAction($params) {
        $place = JSONRequester::parseJSONFromURL
                        ("http://data.bbc.co.uk/locservices-locator/locations?apikey="
                        . $this->apiKey . "&vv=2&format=json&order=importance&filter=domestic&longitude="
                        . $params['long']
                        . "&latitude=" . $params['lat']);
        foreach ($place->response->content->locations->locations as $location) {
            $placeName = $location->name;
            break;
            //Available info $location-> ;
//            id:
//            name:
//            container
//            language
//            timezone
//            country
//            latitude
//            longitude
//            placeType
//            distance
//            isWithinContext: bool
        }
        return $placeName;
    }

}
