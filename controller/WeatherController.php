<?php

require_once 'Controller.php';
include_once '../lib/JSONRequester.php';

class WeatherController extends Controller {

    function defaultAction($params) {
        if ($this->method == "post") {
            $container = array();
            $p = array();

            $weather = JSONRequester::parseJSONFromURL
                            ("http://weather-api-proxy.cloud.bbc.co.uk/weather/feeds/en/" . $params['id'] . "/3hourlyforecast.json");
            $counter = 1;
            foreach ($weather->forecastContent->forecasts as $forecast) {
                $counter++;
                $container = array();
                $container['day'] = $forecast->dayName;
                $container['date'] = $this->getDate($forecast);
                $container['time'] = $this->getTime($forecast);
                $container['visibility'] = $this->getVisibility($forecast);
                $container['temp'] = $this->getTemp($forecast);
                $container['type'] = $this->getType($forecast);
                $container['winddir'] = $this->getWind($forecast)->direction;
                $container['windmph'] = $this->getWind($forecast)->windspeed->mph;
                array_push($p, $container);
            }

            $p['counter'] = $counter;
            $this->renderHTML('weather.html.twig');
        }
    }

    function threeDaysAction($params) {
        $weather = JSONRequester::parseJSONFromURL
                        ("http://weather-api-proxy.cloud.bbc.co.uk/weather/feeds/en/" . $params['id'] . "/3dayforecast.json");
        echo print_r($weather);
    }

    function threeHoursAction($params) {
        $wArray = array(); 
        $weather = JSONRequester::parseJSONFromURL
                        ("http://weather-api-proxy.cloud.bbc.co.uk/weather/feeds/en/" . $params['id'] . "/3hourlyforecast.json");
        foreach ($weather->forecastContent->forecasts as $forecast) {
            
            $singleWeather = array(); 
            $singleWeather['time'] = $this->getTime($forecast); 
            $singleWeather['visibility'] = $this->getVisibility($forecast);
            $singleWeather['temp'] = $this->getTemp($forecast);
            $singleWeather['type'] = $this->getType($forecast);
            $singleWeather['windSpeed'] = $this->getWind($forecast)->windspeed->mph;
            array_push($wArray, $singleWeather);
        }
        
        echo json_encode($wArray);
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
