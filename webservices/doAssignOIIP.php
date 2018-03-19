<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $student_id = $_POST['student_id'];
    $vacancy_id = $_POST['vacancy_id'];
    $fundingStatus = $_POST['funding_status'];
    $jobStatus = $_POST['job_status'];
    $fundingSource = $_POST['funding_source'];
    
    
    $query = "INSERT INTO `student_oiip_assignment`(`student_id`,`vacancy_id`, `funding_status`,`job_status`,`funding_source`) "
            . "VALUES ('$student_id','$vacancy_id','$fundingStatus','$jobStatus','$fundingSource')";
    $result = mysqli_query($link, $query);
    
    if($result){
        $response["result"] = "Inserted successfully";
    } else {
        $response["result"] = "Fail to insert new data";
    }
     
    

    mysqli_close($link);

    echo json_encode($response);
 

}

?>