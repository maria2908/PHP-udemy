<?php 

class User {
    public static $userCount = 0;
    public $userInstanceCount = 0;

    public function __construct(){
        self::$userCount++;
        $this->userInstanceCount++;
    }

    public static function getUserCount(){
        return 'Total users' . self::$userCount;
    }
}
$user = new User();
$user1 = new User();

echo $user->userInstanceCount . "<br>";
echo $user1->userInstanceCount . "<br>";

echo User::getUserCount();