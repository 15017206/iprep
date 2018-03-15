<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    
    $queryCheck = "SELECT * FROM student_has_course WHERE student_id = '$student_id' AND course_id = '$course_id'";
    $checkfornew = mysqli_query($link, $queryCheck); 

    if ($checkfornew) {
        $response["result"] = "Application exists or previously rejected";
    } else {
        $insertQuery = "INSERT INTO student_has_course(student_id, course_id,status) 
                VALUES  
                ('$student_id','$course_id','new')"; 
        $status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));
    }

    
   
}

?>
