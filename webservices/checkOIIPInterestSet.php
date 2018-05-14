<?php

include 'dbconn.php';

if (isset($_GET)) {
    $student_id = $_GET['student_id'];

    $query = "select `oiip_interest` from `student` where `student_id`='$student_id'";
    $result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $courses = $row;
}
mysqli_close($link);

if ($courses['oiip_interest'] == NULL){
    $response['result'] = NULL;
} else {
    $response['result'] = $courses['oiip_interest'];
}

echo json_encode($response);
}