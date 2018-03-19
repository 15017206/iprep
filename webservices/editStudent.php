<?php

include 'dbconn.php';

if (isset($_POST)) {  
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $diploma = $_POST['diploma'];
    $gpa = $_POST['gpa'];
    $tech = $_POST['tech_subj_score'];
    $mobile = $_POST['mobile'];
    $email = $_POST['personal_email'];
    $status = $_POST['iprep_status'];
    $interest = $_POST['oiip_interest'];
    
    $query = "UPDATE `student` SET `name`='$name',`diploma`='$diploma', `gpa`='$gpa',"
            . "`tech_subj_score`='$tech',`mobile`='$mobile',`personal_email`='$email',`iprep_status`='$status'"
            . "`oiip_interest`='$interest', WHERE `student_id='$student_id'";
    
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