<?php

class Auth {
    private $username = null; 
    private $password = null; 
    private $loggedIn = false; 
    private static $auth = null;
    
    private function __construct() {
        session_start();
        if(isset($_SESSION['username']) && isset($_SESSION['password'])) { 
            $this->username = $_SESSION['username']; 
            $this->password = $_SESSION['password'];
            $this->loggedIn = true;
        }
    }
    
    public static function getInstance() { 
        if(Auth::$auth == null) { 
            Auth::$auth = new Auth();
        }
        return Auth::$auth; 
    }
    
    public function saveSession($username, $password) { 
        $_SESSION['username'] = $username; 
        $_SESSION['password'] = $password;
    }
    
    public function clearSession() { 
        session_unset();
    }
    
    public function hashPassword($password, $salt) { 
        return md5($salt . $password);
    }
    
    public function generateSalt() { 
        return substr(md5(rand()), 0, 7);
    }
    
    public function authenticate($username, $password) { 
        $user = UserQuery::create()->findOneByUserName($username); 
        if($user != null) { 
            $passwordHash = $this->hashPassword($password, $user->getSalt()); 
            if($passwordHash == $user->getPassword()) { 
                return true; 
            }
        }
        return false; 
    }
    
    public function isLoggedIn() { 
        return $this->loggedIn;
    }
    
    public function getUserName() { 
        return $this->username;
    }
}
