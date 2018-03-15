<?php

include 'dbconn.php';

if (isset($_GET['diploma'])) {
    $dip = $_GET['diploma'];

   
    $query = "SELECT * FROM student where diploma = '$dip'";
    $result = mysqli_query($link, $query);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $student[] = $row;
    }
     
     
    

    mysqli_close($link);

    echo json_encode($student);
}

?>