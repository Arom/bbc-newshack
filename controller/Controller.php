<?php

class Controller {
    protected $method = "get";
    protected $slim = null;
    protected $db = null;
    protected $apiKey = "YB0MY3VMHyllzPqEf5alVj5bUvGpvDVi";
    protected $apiBaseUrl = "http://data.test.bbc.co.uk/bbcrd-juicer/articles?size=50&recent_first=yes&";
    protected static $extraParams = array();
    protected $base_url = '';

    public function __construct() {
        $this->slim = Slim\Slim::getInstance();
    }

    public function defaultAction($params) {
        die("Error: you need to override defaultAction method in your controller.");
    }

    public function setHTTPMethod($method) {
        $this->method = $method;
    }

    public function renderHTML($template, $data = array()) {
        $data = array_merge($data, Controller::$extraParams);

        $auth = Auth::getInstance();
        if($auth->isLoggedIn()) {
            $data['username'] = $auth->getUserName();
        }

        $view = $this->slim->view();
        $view->parserExtensions = array(new \Slim\Views\TwigExtension());
        $view->setTemplatesDirectory("../view");

        $view->display($template, $data);
    }

    public function addExtraParams($vars = array()) {
        Controller::$extraParams = array_merge(Controller::$extraParams, $vars);
    }

    public function debugAction($params) {
        echo "Method: " . $this->method . "<br><br>Params: <pre>";
        var_dump($params);
        echo "</pre>";
    }
}
