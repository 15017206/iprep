<?php

include 'dbconn.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $course_id = $_GET['course_id'];

    $query = "SELECT * FROM `student_has_course`".
            " INNER JOIN `course` ON `student_has_course`.`course_id`=`course`.`course_id`".
            " INNER JOIN `student` ON `student`.`student_id`=`student_has_course`.`student_id`". 
            " WHERE `student_has_course`.`student_id`='$student_id'".
            "AND `student_has_course`.`course_id`='$course_id'"
            ;
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $course = $row;
    }


    mysqli_close($link);

    echo json_encode($course);
}
?>