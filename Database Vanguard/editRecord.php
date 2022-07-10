<?php
    include 'conn.php';

    $location_php;

    if(isset($_POST['edit_course'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
    
        $sql = "UPDATE course SET `course_name` = '$name' 
                WHERE `c_course_code` = '$id'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            echo '<script> alert("Data Saved"); console.log("Data Saved");</script>';
            header('Location: index_course.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';

            // header('Location: index.php');

        }

    }

    if(isset($_POST['edit_professor'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
    
        $sql = "UPDATE professor SET `professor_name` = '$name' 
                WHERE `p_professor_id` = '$id'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            echo '<script> alert("Data Saved"); console.log("Data Saved");</script>';
            header('Location: index_professor.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';

            // header('Location: index.php');

        }

    }

    if(isset($_POST['edit_learner'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender= $_POST['gender']; 
        $bday = $_POST['bday']; 
        $address = $_POST['address']; 
        $homeNum = $_POST['homeNum']; 
        $cellNum = $_POST['cellNum']; 
        $otherNum = $_POST['otherNum']; 
        $email = $_POST['email']; 
        $altEmail = $_POST['altEmail'];

        $sql = "UPDATE learner SET `learner_name` = '$name',
            `gender` = '$gender',
            `birthdate` = '$bday',
            `address` = '$address',
            `home_phone_number` = '$homeNum',
            `cellphone_number` = '$cellNum',
            `other_phone_number` = '$otherNum',
            `email_address` = '$email',
            `alternative_email` = '$altEmail'
            WHERE `l_learner_id` = '$id'";

        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            echo '<script> alert("Data Saved"); console.log("Data Saved");</script>';
            header('Location: index_learner.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved'. " --- ".
            //  $name .  " ---".
            //  $gender ." ---".
            //  $bday. " ---".
            //  $address ."--- ".
            //  $homeNum ." --- ".
            //  $cellNum ." --- ".
            //  $otherNum." --- ".
            //  $email ." --- ".
            //  $altEmail ." --- ".
            
            '");</script>' ;

            // header('Location: index.php');

        }

    }

    if(isset($_POST['edit_enrollment'])){
        $learner_id = $_POST['learner-id'];
        $course_id = $_POST['course-id'];
        $prof_id = $_POST['prof-id'];
        $date_start = $_POST['date-start'];
        $date_end = $_POST['date-end'];

        $sql = "UPDATE enrollment SET `e_professor_id` = '$prof_id', `date_start` = '$date_start', `date_end` = '$date_end' 
                WHERE `e_learner_id` = '$learner_id' AND `e_course_code` = '$course_id'";
                                
        $sql_run = mysqli_query($conn, $sql);

        if($sql_run)
        {
            echo '<script> alert("Data Saved'. " --- ".
            '");</script>' ;
            header('Location: index_enrollment.php');
            $url1=$_SERVER['REQUEST_URI'];
        } else {
            echo '<script> alert("Data Not Saved");</script>';

            // header('Location: index.php');

        }

    }

    if (isset($_POST['edit_cpdetail'])) {
        $prof_id = $_POST['prof-id'];
        $course_id = $_POST['course-id'];
        $cost = $_POST['cost'];
        $months = $_POST['months'];
        $hours = $_POST['hours'];

        $sql = "UPDATE course_professor_details SET `course_months` = '$months', `hours_per_session` = '$hours', `cost` = '$cost' 
                                                    
        WHERE `cp_course_code` = '$course_id' AND `cp_professor_id` = '$prof_id'";
                        
        $sql_run = mysqli_query($conn, $sql);
        
        if ($sql_run) {
            header('Location: index_cpdetails.php');
            $url1 = $_SERVER['REQUEST_URI'];
            header("Refresh: 5; URL=$url1");
            echo '<script> alert("Data Saved' . " --- " .
                //  $name .  " ---".
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
            //  $name .  " ---".
            $prof_id . " prof--- " .
            $course_id . " course--- " .
            $cost . " cost--- " .
            $months . " months--- " .
            $hours." hours--- ".
            //  $email ." --- ".
            //  $altEmail ." --- ".

            '");</script>';
        }
    }
   
?>

