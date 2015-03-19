<?php

require_once 'Controller.php';
include_once '../lib/JSONRequester.php';

class WeatherController extends Controller {

    function defaultAction($params) {
        if ($this->method == "post") {
            echo "post";
        }
    }

    function threeDaysAction($params) {
        $weather = JSONRequester::parseJSONFromURL
                        ("http://weather-api-proxy.cloud.bbc.co.uk/weather/feeds/en/" . $params['id'] . "/3dayforecast.json");
        echo print_r($weather);
    }

    function threeHoursAction($params) {
        $weather = JSONRequester::parseJSONFromURL
                        ("http://weather-api-proxy.cloud.bbc.co.uk/weather/feeds/en/" . $params['id'] . "/3hourlyforecast.json");
        foreach ($weather->forecastContent->forecasts as $forecast) {
            echo $this->getDay($forecast) . " ";
            echo $this->getDate($forecast) . " ";
            echo $this->getTime($forecast) . " ";
            echo $this->getVisibility($forecast) . " ";
            echo $this->getTemp($forecast) . " ";
            echo $this->getType($forecast) . " ";
            echo $this->getWind($forecast)->direction . " ";
            echo $this->getWind($forecast)->windspeed->mph . " ";

            echo "<br />";
        }
    }

    function getTime($forecast) {
        return $forecast->timeSlot;
    }

    function getDay($forecast) {
        return $forecast->dayName;
    }

    function getDate($forecast) {
        return $forecast->localDate;
    }

    function getVisibility($forecast) {
        return $forecast->visibility;
    }

    function getTemp($forecast) {
        return $forecast->temperature->centigrade;
    }

    function getType($forecast) {
        return $forecast->weatherType;
    }

    function getWind($forecast) {
        return $forecast->wind;
    }

}
