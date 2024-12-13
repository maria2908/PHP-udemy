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
<a href='index.php' >Sign up</a>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Name</label>
        <input name='username' type="text" placeholder="Name" >
        <br>

        <label for="password">Password</label>
        <input name='password' type="password" placeholder="Password" >
        <br>

        <input type="submit" name='login' value="login">
</form>
</body>
</html>

<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);


    if (empty($username)) {
        echo 'Please enter a username';
    } elseif (empty($password)) {
        echo 'Please enter a password';
    } else {
        
        $sql = "SELECT username, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header('location:home.php');
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "No user found";
        }

        $stmt->close();
        mysqli_close($conn);
    }
}
?>
