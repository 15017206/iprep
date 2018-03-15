<?php

include 'dbconn.php';

$query = "SELECT user_id,type FROM user";

$result = mysqli_query($link, $query) or die('Error querying database'); 

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}
mysqli_close($link);

echo json_encode($users);

?>