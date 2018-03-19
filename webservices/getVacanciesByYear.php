<?php

include 'dbconn.php';

if (isset($_GET['year'])) { 
    $year = $_GET['year']; 

   
    $query = "SELECT * FROM oiip_vacancy where YEAR(internship_start_date)='$year'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
    

    mysqli_close($link);

    echo json_encode($courses);
} 
//http://localhost/iprep/getCourseByGenre.php?genre=Computer%20Science

?>