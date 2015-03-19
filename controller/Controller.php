<?php

class Controller { 
    protected $method = "get"; 
    protected $slim = null;
    protected $db = null; 
    
    public function __construct() {
        $this->slim = Slim\Slim::getInstance();
    }
    
    public function defaultAction($params) { 
        die("Error: you need to override defaultAction method in your controller.");
    }
    
    public function setHTTPMethod($method) {
        $this->method = $method; 
    } 
    
    public function renderHTML($template, $data = null) { 
        $view = $this->slim->view(); 
        $view->parserExtensions = array(new \Slim\Views\TwigExtension());
        $view->setTemplatesDirectory("../view");
        
        $view->display($template, $data);
    }
    
    public function debugAction($params) { 
        echo "Method: " . $this->method . "<br><br>Params: <pre>"; 
        var_dump($params); 
        echo "</pre>";
    }
}

