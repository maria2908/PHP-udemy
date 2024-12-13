<?php

class User {
    public $name = 'Maria'; 
    protected $email = 'varya@gmail.com';
    private $password = '123';

    public function displayEmail() {
        return $this->email;
    }

    public function displayPassword() {
        return $this->password;
    }
}

class AdminUser extends User {

    public function getEmailAgain() {
        return $this->email . "From admin class";
    }

    public function displayFromAdmin() {
    }

}

$user = new User;

echo $user->displayPassword();

// $admin = new AdminUser();

// echo $admin->getEmailAgain();




