<?php

include 'dbconn.php';
 
    
$diploma = "dmsd";
$courses = array();

$query = "SELECT * FROM student_has_course, student, course WHERE student_has_course.student_id = student.student_id "
        . "AND student_has_course.course_id = course.course_id";

$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $courses[] = $row;
}



mysqli_close($link);

echo json_encode($courses);
 

?>