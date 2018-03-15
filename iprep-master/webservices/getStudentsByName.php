<?php

include 'dbconn.php';

if (isset($_GET['name'])) {
    $name = $_GET['name'];

   
    $query = "SELECT * FROM student where name LIKE '%$name%'";
    $result = mysqli_query($link, $query);
    
    
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
     
    

    mysqli_close($link);

    echo json_encode($student);
}

?>