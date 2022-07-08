<?php 
    $database_name = "oggl";

        $conn = mysqli_connect("localhost", "root", "", "oggl"); 

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
?>

<!-- 
    $conn = mysqli_connect("localhost", "root", "", $table_name); 
    if($table_name = "course") {

} -->