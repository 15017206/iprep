<?php

include 'dbconn.php';
//to be completed
if (isset($_GET['month']) && isset($_GET['year']) && isset($_GET['search']) && isset($_GET['diploma'])) {
    $month = $_GET['month']; //e.g. January, March
    $year = $_GET['year']; //e.g. 2016,2017,2020
    $search = $_GET['search'];
    $diploma = $_GET['diploma'];
    
    $query = "SELECT * FROM oiip_vacancy WHERE  ";
    
    if($month == "All"){
        
    }
    
    if($year == "All"){
        $nmonth = date('m',strtotime($month));
        $n = "YEAR(internship_start_date)='$year'";
    }
    
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
    

    mysqli_close($link);

    echo json_encode($courses);
}
 

//http://localhost/iprep/getCourseByGenre.php?genre=Computer%20Science
?>
