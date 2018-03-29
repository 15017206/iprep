<?php

include 'dbconn.php';

if(ISSET($_GET["company_id"])){
    $id = $_GET["company_id"];
    $query = "SELECT * FROM company WHERE company_id = '$id'";

    $result = mysqli_query($link, $query) or die('Error querying database');

    $companies[] = mysqli_fetch_assoc($result);
    
    mysqli_close($link);

    echo json_encode($companies);
    
}


?>