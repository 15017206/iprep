<?php

include 'dbconn.php';

if (isset($_POST)) {

    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];

    $queryCheck = "SELECT * FROM student_has_course WHERE student_id = '$student_id' AND course_id = '$course_id'";
    $checkfornew = mysqli_query($link, $queryCheck);

    if (mysqli_num_rows($checkfornew) == 1) {
        $response["result"] = "Application exists or previously rejected";
    } else {

        $insertQuery = "INSERT INTO student_has_course (student_id, course_id, status) VALUES ('$student_id', '$course_id', 'New' )";
        $status = mysqli_query($link, $insertQuery) or die(mysqli_error($link));
        $response["result"] = "Enroll complete";
    }

    echo json_encode($response);
}
?>
