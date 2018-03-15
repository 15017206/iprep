<?php

include 'dbconn.php';

if (isset($_GET['student_id'])) {
    $id = $_GET['student_id'];

   
    $query = "SELECT * FROM student where student_id LIKE '%$id%'";
    $result = mysqli_query($link, $query);
    
    
    $student[] = mysqli_fetch_assoc($result);
     
    

    mysqli_close($link);

    echo json_encode($student);
}

?>