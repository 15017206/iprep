<?php

include 'dbconn.php';

if (isset($_POST)) { 
    $vacancy_id = $_GET['vacancy_id'];
    
    $query = "DELETE FROM `student_oiip_assignment` WHERE `student_oiip_assignment`.`vacancy_id` = '$vacancy_id'";
    
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