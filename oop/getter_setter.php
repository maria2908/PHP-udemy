<?php

class User {
    private $name;
    private $email;

    public function __construct($name, $email){
        $this->setEmail($email);
        // $this->email = $email;
        // $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            echo 'Not a valid email';
        }
    }

    public function displayUserInfo() {
        return "User: " . $this->getEmail();
    }
}

$user = new User('maria', 'emailgmail.com');

$user->setEmail('vsd@gmail.com');
$user->setEmail('vs21222d@gmail.com');


echo $user->displayUserInfo();
