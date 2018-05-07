<?php

include 'dbconn.php';

if (isset($_POST)) { 
    $vacancy_id = $_POST['vacancy_id'];
    $fundStatus = $_POST['funding_status'];
    $jobStatus = $_POST['job_status'];
    $fundingSource = $_POST['funding_source'];
    
    $query = "UPDATE `student_oiip_assignment` SET `funding_status`='$fundStatus', `job_status`='$jobStatus', `funding_source`='$fundingSource' WHERE `vacancy_id`='$vacancy_id' ";
    
    $result = mysqli_query($link, $query);
    
    if($result){
        $response["result"] = "Updated successfully";
    } else {
        $response["result"] = "Fail to update data";
    }
     
    

    mysqli_close($link);

    echo json_encode($response);
}
?>