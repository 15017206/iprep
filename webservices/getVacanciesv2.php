<?php

include 'dbconn.php';

$query = "SELECT * FROM oiip_vacancy";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $vacancies[] = $row;
}
mysqli_close($link);

echo json_encode($vacancies);

?>