<?php

include 'dbconn.php';

if (isset($_GET['course_id']) && isset($_GET['status'])) {
    $status = $_GET['status'];
    $course_id = $_GET['course_id'];
   
    $query = "SELECT * FROM student_has_course, student WHERE student_has_course.student_id = student.student_id AND status='$status' AND course_id='$course_id'";
    $result = mysqli_query($link, $query);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
     
    

    mysqli_close($link);

    echo json_encode($students);
}

?>