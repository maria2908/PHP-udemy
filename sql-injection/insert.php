<?php

$conn = mysqli_connect('localhost', 'root', '', 'prepare_stmt_db');
$stmt = mysqli_prepare($conn, "INSERT INTO users (username, password, email, reg_date) VALUES(?, ?, ?, ?)");

if($stmt) {
    $username = "Maria";
    $email = 'varyaa2002@gmail.com';
    $password = "123";
    $reg_date = date('Y-m-d');

mysqli_stmt_bind_param($stmt, 'ssss', $username, $password, $email, $reg_date);
mysqli_stmt_execute($stmt);

echo "New user";
mysqli_stmt_close($stmt);

} else {
    echo "Error:" . mysqli_error($conn);
} 
