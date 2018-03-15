<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $coursename = $_POST['course_name'];
    $genre = $_POST['genre'];
    
    $query = "INSERT INTO `course`(`name`, `genre`) VALUES ('$coursename','$genre')";
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