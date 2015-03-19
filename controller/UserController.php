<?php

require_once 'Controller.php';
class UserController extends Controller {
    
    public function registerAction($params) { 
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
    
    public function loginAction($params) { 
        $auth = Auth::getInstance();
        
        if($auth->authenticate($params['username'], $params['password'])) { 
            $auth->saveSession($params['username'], $params['password']);
            echo "logged in";
        }
        else { 
            echo "not logged in";
        }
    }
    
    public function logoutAction($params) { 
        $auth = Auth::getInstance(); 
        
        $auth->clearSession();
    }
    
    public function checkLoggedInAction($params) { 
        $auth = Auth::getInstance(); 
        
        die($auth->isLoggedIn());
    }
}