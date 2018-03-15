<?php

include 'dbconn.php';

if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];

   
    $query = "SELECT * FROM course where genre='$genre'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
    

    mysqli_close($link);

    echo json_encode($courses);
}


//http://localhost/iprep/getCourseByGenre.php?genre=Computer%20Science
?>

