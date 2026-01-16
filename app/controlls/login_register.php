<?php
    
    namespace code\controlls;

require_once __DIR__ . '/../../vendor/autoload.php';

use code\models\user;

Class AuthController
{
    private $user;

    public function __construct()
    {
        session_start();

        $this->user = new User;
    }

    public function login()
    {
        $this->user->setEmail($_POST['email']);
        $this->user->setPassword($_POST['password']);

        $result = $this->user->login();

        if($result === true){
            $_SESSION['userid'] = $this->user->getUserId();
            $_SESSION['username'] = $this->user->getName();
            $_SESSION['role'] = $this->user->getRole();
        }
        else{
            echo "Wrong Email or Password";
        }
    }

    public function register()
    {

        $this->user->setName($_POST['name']);
        $this->user->setEmail($_POST['email']);
        $this->user->setPassword($_POST['password']);

        $result = $this->user->register();

        if($result === false){
            echo "Email is already in use";
        }
    }

}

$login = new AuthController;

        if(isset($_POST['login']))
            $login->login();

        if(isset($_POST['register']))
            $login->register();

?>