<?php

include 'dbconn.php';

if (isset($_GET)) {    
    $student_id = $_GET['student_id']; 
    
    $query = "DELETE FROM `student` WHERE student_id = '$student_id'";
 
    $result = mysqli_query($link, $query);
    
    if($result){
        $response["result"] = "Deleted successfully";
    } else {
        $response["result"] = "Fail to delete data";
    }
     
    mysqli_close($link);

    echo json_encode($response);

}

?>