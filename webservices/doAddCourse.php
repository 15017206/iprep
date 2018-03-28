<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $coursename = $_POST['name'];
    $genre = $_POST['genre'];
    $cost = $_POST['cost'];
    $course_provider = $_POST['provider'];
    $query = "INSERT INTO `course`(`name`, `genre`, `cost`, `course_provider`) VALUES ('$coursename','$genre', $cost, '$course_provider')";
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