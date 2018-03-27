<?php

include 'dbconn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $query = "SELECT * FROM course where course_id='$id'";
    $result = mysqli_query($link, $query);
    $courses = mysqli_fetch_assoc($result);
    

    mysqli_close($link);

    echo json_encode($courses);
}


//http://localhost/iprep/webservices/getCourseById.php?id=1
?>

