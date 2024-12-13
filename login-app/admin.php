<?php
    include 'partials/header.php';
    include 'partials/navigation.php';

    if(!is_user_logged_in()) {
        redirect('login.php');
    }

    $result = mysqli_query($conn, "SELECT id, username, email, reg_date FROM users");

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['edit_user'])) {
            $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
            $new_email = mysqli_real_escape_string($conn, $_POST['email']);
            $new_username = mysqli_real_escape_string($conn, $_POST['username']);

            $query_status = check_query(update_user($conn, $user_id, $new_username, $new_email));

            if($query_status === true ){
                $_SESSION['message'] = "User updated succesfully to {$new_username}";
                $_SESSION['msg_type'] = 'success';
                redirect('admin.php');
            }
        } elseif(isset($_POST['delete_user'])) {
            $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
           
            $query_status = check_query(delete_user($conn, $user_id));

            if(check_query($query_status === true)) {
                $_SESSION['message'] = 'User deleted succesfully';
                $_SESSION['msg_type'] = 'success';
                redirect('admin.php');
            }
        }
    } 
?>


<h1>Manage Users</h1>

<div class="container">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="notification <?php $_SESSION['msg_type'] ?>">
            <?php 
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
                unset ($_SESSION['msg_type']);
            ?>
        </div>
    <?php endif; ?>
    <table class="user-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Registration Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php while($user = mysqli_fetch_assoc($result)): ?>

        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo full_month($user['reg_date']); ?></td>
            <td>
                <form method="POST" style="display:inline-block;">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                    <button class="edit" type="submit" name="edit_user">Edit</button>
                </form>
                <form method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <button class="delete" type="submit" name="delete_user">Delete</button>
                </form>
            </td>
        </tr>
        
        <?php endwhile ?>


        <!-- Additional user rows can go here -->
        </tbody>
    </table>
</div>
    
<?php
 include 'partials/footer.php';   

 mysqli_close($conn);
?>
