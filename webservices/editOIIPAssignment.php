<?php

include 'dbconn.php';

if (isset($_POST)) { 
    $oiip_id = $_POST['oiip_assignment_id'];
    $student_id = $_POST['student_id'];
    $vacancy_id = $_POST['vacancy_id'];
    $fundStatus = $_POST['funding_status'];
    $jobStatus = $_POST['job_status'];
    
    $query = "UPDATE `student_oiip_assignment` SET `student_id`='$student_id',`vacancy_id`='$vacancy_id', `funding_status`='$fundStatus',"
            . "`job_status`='$jobStatus' WHERE `oiip_assignment_id='$oiip_id'";
    
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