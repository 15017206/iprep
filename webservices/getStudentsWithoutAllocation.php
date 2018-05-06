<?php

include 'dbconn.php';

$query = "SELECT * FROM student WHERE `student`.student_id NOT IN (SELECT `student_id` FROM `student_oiip_assignment`)";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $student[] = $row;
}
mysqli_close($link);

echo json_encode($student);

?>