<?php
    include 'conn.php';

    $location_php;

    if(isset($_POST['edit_course'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
    
        $sql = "UPDATE salesman SET `salesman_name` = '$name', 
                                    `total_sales` = '$price'
                WHERE `salesman_number` = '$id'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            echo '<script> alert("Data Saved"); console.log("Data Saved");</script>';
            header('Location: index.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';

            header('Location: index.php');

        }

    }
   
?>