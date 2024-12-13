<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        // Example credentials
        $username = 'admin';
        $password = 'secret';

        // Get the input from the user
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];


        if($input_username == $username && $input_password == $password ) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $input_username;

            header("Location:admin.php");
            exit;
        } else {
            $message = 'Invalid username or password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login page</h2>

    <?php if (isset($message)): ?>
        <p style="color:red"><?php echo $message ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for='username'>Username</label>
        <input id='username' type="text" name="username">

        <label for='password'>Password</label>
        <input id='password' type="password" name='password'><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>