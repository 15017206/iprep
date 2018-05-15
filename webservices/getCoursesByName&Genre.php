<?php

include 'dbconn.php';

if (isset($_GET)) {
    $genre=" ";
    $name=" ";
    if(isset($_GET['genre'])){
        $genre = $_GET['genre'];
    }
    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }
    
    $courses=array();
   
    $query = "SELECT * FROM course where course_genre LIKE '%$genre%' AND course_name LIKE '%$name%'";
    $result = mysqli_query($link, $query);
    while (($row = mysqli_fetch_assoc($result))!== NULL) {
        $courses[] = $row;
    }
    

    mysqli_close($link);

    echo json_encode($courses);
}


//http://localhost/iprep/getCourseByGenre.php?genre=Computer%20Science
?>

