<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $student_id = $_POST['student_id'];
    $interest = $_POST['oiip_interest'];
    
    $queryCheck = "UPDATE `student` SET `oiip_interest`='$interest' WHERE `student_id` = '$student_id'";

    $result = mysqli_query($link, $queryCheck);
    
    if($result){
        $response["result"] = "Updated successfully";
    } else {
        $response["result"] = "Fail to update data";
    }
    
    mysqli_close($link);

    echo json_encode($response);
   
}

?>
