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

    if(isset($_POST['delete_enrollment'])){
        $learner_id = $_POST['learner-id'];
        $course_id = $_POST['course-id'];
        
        echo "<script>console.log('" . $del . ");</script>;";

        $sql = "DELETE FROM enrollment WHERE `e_learner_id` = '$learner_id' AND `e_course_code` = '$course_id'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            header('Location: index_enrollment.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';
            // header('Location: index.php');
        }

    }

    if (isset($_POST['delete_cpdetail'])) {
        $prof_id = $_POST['prof-id'];
        $course_id = $_POST['course-id'];
        $cost = $_POST['cost'];
        $months = $_POST['months'];
        $hours = $_POST['hours'];
    
        $sql = "DELETE FROM course_professor_details WHERE `cp_course_code` = '$course_id' AND  `cp_professor_id` = '$prof_id'";
    
    
        $sql_run = mysqli_query($conn, $sql);
    
        if ($sql_run) {
            header('Location: index_cpdetails.php');
            $url1 = $_SERVER['REQUEST_URI'];
            header("Refresh: 5; URL=$url1");
            echo '<script> alert("Data Saved' . " --- " .
                //  $name .  " ---".
                $learner_id . " --- " .
                $prof_id . " --- " .
                $course_id . " --- " .
                $date_start . " --- " .
                $date_end . " --- " .
                //  $otherNum." --- ".
                //  $email ." --- ".
                //  $altEmail ." --- ".
    
    
    
    
                '");</script>';
        } else {
            echo '<script> alert("Data Not Saved' . " --- " .
                '");</script>';
        }
    }
   
?>