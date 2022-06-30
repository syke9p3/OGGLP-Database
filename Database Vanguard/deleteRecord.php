<?php
    include 'conn.php';

    if(isset($_POST['delete_course'])){
        $del = $_POST['id'];
        
        echo "<script>console.log('" . $del . ");</script>;";

        $sql = "DELETE FROM salesman WHERE `salesman_number` = '$del'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            header('Location: index.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';
            header('Location: index.php');
        }

    }
   
?>