<?php

include 'dbconn.php';

if (isset($_POST)) {    
    $course_id = $_POST['course_id'];
    $name = $_POST['course_name'];
    $genre = $_POST['course_genre'];
    $cost = $_POST['course_cost'];
    $provider = $_POST['course_provider'];
    
    $query = "UPDATE `course` SET `name`='$name',`genre`='$genre', `cost`='$cost',"
            . "`course_provider`='$provider' WHERE `course_id`='$course_id'";
 
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