<?php
 session_start();
 include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href='login.php' >Login</a>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="username">Name</label>
        <input name='username' type="text" placeholder="Name" >
        <br>

        <label for="password">Password</label>
        <input name='password' type="password" placeholder="Password" >
        <br>

        <input type="submit" name='submit' value="register">
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)) {
            echo'Please enter a username';
        } elseif(empty($password)) {
            echo'Please enter a password';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash')";

            try {
                mysqli_query($conn, $sql);
                echo "You are now registered";
                $_SESSION['username'] = $username;

                header("location:home.php");
                exit();
                
            } catch(mysqli_sql_exception) {
                echo "The username is takem";
            }

        }
    }

    mysqli_close($conn);
?>