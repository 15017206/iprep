<?php

include 'dbconn.php';

$query = "SELECT * FROM oiip_vacancy JOIN company on oiip_vacancy.company_id = company.company_id";

$result = mysqli_query($link, $query) or die('Error querying database');

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        echo $row["company_id"];
    }
}

mysqli_close($link);

?>