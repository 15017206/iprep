<?php

include 'dbconn.php';

if (isset($_GET['cohort'])) {
    $cohort = $_GET['cohort'];

   
    $query = "SELECT * FROM student where cohort LIKE '%$cohort%'";
    $result = mysqli_query($link, $query);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
     
     
    

    mysqli_close($link);

    echo json_encode($students);
}

?>