<?php 

    $limit = 20;
    $page = isset($_GET['page'])  ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM salesman LIMIT $start, $limit";
    $sql_run = $conn->query($sql);
    $data = $sql_run->fetch_all(MYSQLI_ASSOC);

    if ($table_name == 'Course' ) {
        $sql1 = "SELECT count(salesman_number) AS id FROM salesman";
    }

    if ($table_name == 'Courses') {

        $sql1 = "SELECT count(course_id) AS id FROM Courses";

    }else if ($table_name == 'Student') {

        $sql1 = "SELECT count(student_id) AS id FROM Students";
        
    } else if ($table_name == 'Professor') {

        $sql1 = "SELECT count(professor_id) AS id FROM Professors";

    }

    $sql_run1 = $conn->query($sql1);

    $count = $sql_run1->fetch_all(MYSQLI_ASSOC);
    $total = $count[0]['id'];
    $pages = ceil($total / $limit); 

    $previous = $page - 1;
    $next = $page + 1; 


?>