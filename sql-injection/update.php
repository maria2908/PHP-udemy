<?php
include('db.php');
$stmt = mysqli_prepare($conn, "UPDATE users SET username = ? WHERE id = ?");

if($stmt) {
    $user_id = 11;
    $username = "Edwin";

mysqli_stmt_bind_param($stmt, 'si', $username, $user_id);
mysqli_stmt_execute($stmt);

echo "Updated user";
mysqli_stmt_close($stmt);

} else {
    echo "Error:" . mysqli_error($conn);
} 
