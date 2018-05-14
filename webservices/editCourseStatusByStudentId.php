<?php

include 'dbconn.php';

if (isset($_POST)) { 
    $status = $_POST['status']; 
    $student_id = $_POST['student_id'];
    
    $query = "UPDATE `student_has_course` SET `status`='$status' WHERE `student_id='$student_id'";
    
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