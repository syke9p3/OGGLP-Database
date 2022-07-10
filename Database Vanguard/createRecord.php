<?php
include 'conn.php';

if (isset($_POST['add_course'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "INSERT INTO course (`c_course_code`,`course_name`) VALUES ('$id','$name')";
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run) {
        header('Location: index_course.php');
        echo '<script> alert("Data Saved"); console.log("Data Saved");</script>';

        $url1 = $_SERVER['REQUEST_URI'];
        header("Refresh: 5; URL=$url1");
    } else {
        echo '<script> alert("Data Not Saved");</script>';
        header('Location: index.php');
    }
}

if (isset($_POST['add_professor'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "INSERT INTO professor (`p_professor_id`,`professor_name`) VALUES ('$id','$name')";
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run) {
        header('Location: index_professor.php');
        $url1 = $_SERVER['REQUEST_URI'];
        header("Refresh: 5; URL=$url1");
    } else {
        echo '<script> alert("Data Not Saved");</script>';
        header('Location: index.php');
    }
}

if (isset($_POST['add_learner'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $bday = $_POST['bday'];
    $address = $_POST['address'];
    $homeNum = $_POST['homeNum'];
    $cellNum = $_POST['cellNum'];
    $otherNum = $_POST['otherNum'];
    $email = $_POST['email'];
    $altEmail = $_POST['altEmail'];

    $sql = "INSERT INTO learner (`l_learner_id`, `learner_name`,`gender`, `birthdate`, `address`, `home_phone_number`, `cellphone_number`, `other_phone_number` ,`email_address`, `alternative_email`) VALUES ('$id', '$name', '$gender', '$bday', '$address', '$homeNum',  '$cellNum',  '$otherNum','$email', '$altEmail')";
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run) {
        header('Location: index_learner.php');
        echo '<script> alert("Data Saved"); console.log("Data Saved");</script>';

        $url1 = $_SERVER['REQUEST_URI'];
        header("Refresh: 5; URL=$url1");
    } else {
        '<script> alert("Data Not Saved' . " --- " .
            $name .  " ---" .
            $gender . " ---" .
            $bday . " ---" .
            $address . "--- " .
            $homeNum . " --- " .
            $cellNum . " --- " .
            $otherNum . " --- " .
            $email . " --- " .
            $altEmail . " --- " .

            '");</script>';
    }
}

if (isset($_POST['add_enrollment'])) {
    $learner_id = $_POST['learner-id'];
    $prof_id = $_POST['prof-id'];
    $course_id = $_POST['course-id'];
    $date_start = $_POST['date-start'];
    $date_end = $_POST['date-end'];

    $sql = "INSERT INTO enrollment (`e_learner_id`,`e_course_code`,`e_professor_id`,`date_start`,`date_end`) VALUES ('$learner_id','$course_id','$prof_id','$date_start','$date_end')";


    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run) {
        header('Location: index_enrollment.php');
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


if (isset($_POST['add_cpdetail'])) {
    $prof_id = $_POST['prof-id'];
    $course_id = $_POST['course-id'];
    $cost = $_POST['cost'];
    $months = $_POST['months'];
    $hours = $_POST['hours'];

    $sql = "INSERT INTO course_professor_details (`cp_course_code`,`cp_professor_id`,`course_months`,`hours_per_session`,`cost`) VALUES ('$course_id','$prof_id','$months','$hours','$cost')";


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
