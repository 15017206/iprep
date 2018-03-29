<?php

include 'dbconn.php';

if (isset($_POST)) {    
    $course_id = $_POST['course_id']; 
    
    $query = "DELETE FROM `course` WHERE course_id = '$course_id'";
 
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
