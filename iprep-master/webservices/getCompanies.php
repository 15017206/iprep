<?php

include 'dbconn.php';

$query = "SELECT * FROM company";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $companies[] = $row;
}
mysqli_close($link);

echo json_encode($companies);

?>