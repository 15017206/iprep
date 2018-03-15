<?php

include 'dbconn.php';

if (isset($_GET['course_id']) && isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $course_id = $_GET['course_id'];
   
    $query = "SELECT * FROM student_has_course WHERE student_id='$student_id' AND course_id='$course_id'";
    $result = mysqli_query($link, $query);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $details[] = $row;
    }
     
    

    mysqli_close($link);

    echo json_encode($details);
}

?>