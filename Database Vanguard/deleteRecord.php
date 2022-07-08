<?php
    include 'conn.php';

    if(isset($_POST['delete_course'])){
        $del = $_POST['id'];
        
        echo "<script>console.log('" . $del . ");</script>;";

        $sql = "DELETE FROM course WHERE `c_course_code` = '$del'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            header('Location: index_course.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';
            header('Location: index.php');
        }

    }

    if(isset($_POST['delete_professor'])){
        $del = $_POST['id'];
        
        echo "<script>console.log('" . $del . ");</script>;";

        $sql = "DELETE FROM professor WHERE `p_professor_id` = '$del'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            header('Location: index_professor.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';
            // header('Location: index.php');
        }

    }

    if(isset($_POST['delete_learner'])){
        $del = $_POST['id'];
        
        echo "<script>console.log('" . $del . ");</script>;";

        $sql = "DELETE FROM learner WHERE `l_learner_id` = '$del'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            header('Location: index_learner.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';
            // header('Location: index.php');
        }

    }
   
?>