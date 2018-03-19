<?php

include 'dbconn.php';

$query = "SELECT * FROM course";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $courses[] = $row;
}
mysqli_close($link);

echo json_encode($courses);

?>