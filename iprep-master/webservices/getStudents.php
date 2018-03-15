<?php

include 'dbconn.php';

$query = "SELECT * FROM student";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $student[] = $row;
}
mysqli_close($link);

echo json_encode($student);

?>