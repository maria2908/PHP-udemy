<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welcome
    <?php
    if (isset($_SESSION['username'])) {
        echo "Welcome, " . htmlspecialchars($_SESSION['username']);
    } else {
        echo "Session not set or expired. Please log in.";
    }
    ?>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="submit" name="logout" value="logout" />
    </form>
</body>
</html>

<?php 

    if(empty($_SESSION['loggedin'])){
        header('Location: login.php');
        echo"You must to login first";
    }

    if(isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
?>