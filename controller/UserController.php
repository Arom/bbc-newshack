<?php

require_once 'Controller.php';
class UserController extends Controller {
    
    public function registerAction($params) { 
        if($this->method == "post") {
            $params = $_POST;
            
            $auth = Auth::getInstance(); 
            
            $registrationErrors = $auth->registrationErrors($params);
            if($registrationErrors != false) { 
                $this->renderHTML('register.html.twig', array('registererror' => $registrationErrors));
                die(); 
            }

            $username = $params['username'];
            $salt = $auth->generateSalt(); 
            $password = $auth->hashPassword($params['password'], $salt);
            
            $user = new User(); 
            $user->setUserName($username);
            $user->setPassword($password);
            $user->setSalt($salt);
            $user->save();
            
            $this->addExtraParams(array('registersuccess' => true));
        }
        $this->renderHTML('register.html.twig');
    }
    
    public function loginAction($params) { 
        if($this->method == "post") {
            $params = $_POST;
            
            $auth = Auth::getInstance();

            if($auth->authenticate($params['username'], $params['password'])) { 
                $auth->saveSession($params['username'], $params['password']);
                $this->slim->redirect($this->base_url . 'home');
            }
            else { 
                $auth->clearSession(); 
                $this->addExtraParams(array('loginerror' => 'Incorrect username or password. '));
                __run_controller('home');
            }
        }
        else {
            
        }
    }
    
    public function logoutAction($params) { 
        $auth = Auth::getInstance(); 
        $auth->clearSession();
        
        $this->slim->redirect($this->base_url . 'home');
    }
}