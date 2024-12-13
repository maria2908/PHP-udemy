<?php

    $db_server = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'food';

    // Attempt to connect to the database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    // Check if the connection failed
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }   

?>