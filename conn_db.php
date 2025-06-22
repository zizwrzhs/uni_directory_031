<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $name = "uni_directory";
    $conn = new mysqli($server, $user, $password, $name);

    if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
    } else {
    mysqli_set_charset($conn, 'utf8');	
    }
?>