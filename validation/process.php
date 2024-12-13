<?php


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $usernameErr = $emailErr = ""; 
    $username = $email = '';

    if(empty($_POST['username'])) {
        $usernameErr = "username is required";
    } else {
        $username = htmlspecialchars(trim($_POST['username']));
    }

    
    if(empty($_POST['email'])) {
        $emailErr = "mail is required";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invald email format";
        }
    }

    if(empty($usernameErr) && empty($emailErr)) {
        echo "Form submitted"; 
        echo"<br>";
        echo "Username: " . $username . "<br>" . "Email: " . $email . "<br>";
    } else {
        echo "Errors: <br>";
        echo $usernameErr . "<br>" . $emailErr;
    }
}