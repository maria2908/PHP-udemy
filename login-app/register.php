<?php

    include 'partials/header.php';
    include 'partials/navigation.php';

    $error = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        
        if($password !== $confirm_password ) {
            echo"Password to not match";
        } else {

            if(user_exist($conn, $username)) {
                $error = 'Username already exists, please choose another';
            } else {
                
                
                if(check_query(create_user($conn, $username, $email, $password))){
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $user['username'];
                    redirect('admin.php');
                } else {
                    $error = "SOMETHING HAPPENED not data inserted, error" . mysqli_error($conn);
                }
            }
        }
    
    }
?>

<div class="container">
    <div class="form-container">
        <?php if($error): ?>
            <p style="color: red;">
                <?php echo $error ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="">
            <h2>Create your Account</h2>

            <!-- Error message placeholder -->
            <p style="color:red">
                <!-- Error message goes here -->
            </p>

            <label for="username">Username:</label>
            <input placeholder="Enter your username" type="text" name="username" required>

            <label for="email">Email:</label>
            <input placeholder="Enter your email" type="email" name="email" required>

            <label for="password">Password:</label>
            <input placeholder="Enter your password" type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input placeholder="Confirm your password" type="password" name="confirm_password" required>

            <input type="submit" value="Register">
        </form>
    </div>
</div>
    
<?php
 include 'partials/footer.php';
?>


<?php
mysqli_close($conn);
?>