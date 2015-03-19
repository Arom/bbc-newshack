<?php

require_once 'Controller.php';
class UserController extends Controller {
    
    public function registerAction($params) { 
        if($this->method == "get") {
            $auth = Auth::getInstance(); 

            $username = $params['username'];
            $salt = $auth->generateSalt(); 
            $password = $auth->hashPassword($params['password'], $salt);

            $user = new User(); 
            $user->setUserName($username);
            $user->setPassword($password);
            $user->setSalt($salt);
            $user->save();
        }
        else { 
            
        }
    }
    
    public function loginAction($params) { 
        if($this->method == "post") {
            $auth = Auth::getInstance();

            if($auth->authenticate($_POST['username'], $_POST['password'])) { 
                $auth->saveSession($_POST['username'], $_POST['password']);
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