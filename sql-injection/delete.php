<?php
include('db.php');
$stmt = mysqli_prepare($conn, "DELETE FROM users WHERE id = ?");

if($stmt) {
    $user_id = 11;

mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);

echo "Deleted user";
mysqli_stmt_close($stmt);

} else {
    echo "Error:" . mysqli_error($conn);
} 
