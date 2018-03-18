w<?php

include 'dbconn.php';

if (isset($_GET['vacancy_id']) && isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $vacancy_id = $_GET['vacancy_id'];
   
    $query = "SELECT * FROM student_oiip_assignment WHERE student_id='$student_id' AND vacancy_id='$vacancy_id'";
    $result = mysqli_query($link, $query);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $details[] = $row;
    }
     
    

    mysqli_close($link);

    echo json_encode($details);
}

?>