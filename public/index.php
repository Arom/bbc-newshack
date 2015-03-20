
<?php
require '../vendor/autoload.php';
require '../config.php';

Propel::init("../model/build/conf/newshack-conf.php");

set_include_path(get_include_path() . PATH_SEPARATOR . '../model/build/classes' . PATH_SEPARATOR . '../controller' . PATH_SEPARATOR . '../lib');

require '../lib/Auth.php';
$auth = Auth::getInstance();

$app = new \Slim\Slim($slim_config);

$app->get('/', function () {
    __run_controller();
});
$app->post('/', function () {
    __run_controller("home", null, null, "post");
});
$app->get('/:controller(/:action)(/:params)', function($controller, $action = null, $params = null) {
    __run_controller($controller, $action, $params);
});
$app->post('/:controller(/:action)(/:params)', function($controller, $action = null, $params = null) {
    __run_controller($controller, $action, $params, "post");
});

$app->run();

function __run_controller($controller = "home", $action = null, $params = null, $method = "get") {
    $controller = ucfirst($controller);
    $controllerClass = $controller . "Controller";
    include_once $controllerClass . ".php";
    $controllerObject = new $controllerClass();

    $controllerObject->setHTTPMethod($method);

    if ($action == null) {
        $action = "default";
    }
    $actionMethod = lcfirst($action) . "Action";
    if (!method_exists($controllerClass, $actionMethod)) {
        die("Error: action <b>" . $action . "</b> not found in <b>" . $controller . "</b> controller :(");
    }

    if ($params == null) {
        $params = array();
    } else {
        $params = __create_params_array($params);
    }

    $controllerObject->$actionMethod($params);
}

function __create_params_array($params) {
    $paramsTempArray = explode(',', $params);
    $paramsArray = array();
    foreach ($paramsTempArray as $item) {
        if (!strpos($item, ":")) {
            array_push($paramsArray, $item);
        } else {
            $paramsArray[substr($item, 0, strpos($item, ":"))] = substr($item, strpos($item, ":") + 1);
        }
    }

    return $paramsArray;
}
