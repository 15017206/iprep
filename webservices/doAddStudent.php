<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $id = $_POST['student_id'];
    $name = $_POST['name'];
    $diploma = $_POST['diploma'];
    $gpa = $_POST['gpa'];
    $tech = $_POST['tech_subj_score'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $status = $_POST['iprep_status'];
    $interest = $_POST['oiip_interest'];
    
    
    $query = "INSERT INTO `student`(`student_id`,`name`, `diploma`,`gpa`,`tech_subj_score`,`mobile`,`personal_email`,`iprep_status`,`oiip_interest`) VALUES ('$id','$name','$diploma','$gpa','$tech','$mobile','$email','$status','$interest')";
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
