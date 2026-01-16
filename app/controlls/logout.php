<?php
    
    namespace code\controlls;

require_once __DIR__ . '/../../vendor/autoload.php';
session_start();

use code\models\user;

Class Logout 
{
    private $users;

    public function __construct()
    {
        $this->users = new User;
    }

    public function logOut()
    {
        $this->users->logOut();

        header("Location: ../Home");

        exit;
    }
}
    $logout = new Logout;
    $logout->logOut();
    
?>