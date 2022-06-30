<?php
    include 'conn.php';

    if(isset($_POST['add_course'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
    
        $sql = "INSERT INTO salesman (`salesman_number`,`salesman_name`, `total_sales`, `commission`) VALUES ('$id','$name','$price', 100)";
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            header('Location: index.php');
            echo '<script> alert("Data Saved"); console.log("Data Saved");</script>';

            $url1=$_SERVER['REQUEST_URI'];
            header("Refresh: 5; URL=$url1");
        } else {
            echo '<script> alert("Data Not Saved");</script>';
            header('Location: index.php');

        }
        
    }

   
?>