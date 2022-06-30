<?php 
    $database_name;

    $conn = mysqli_connect("localhost", "root", "", "salesman"); 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
