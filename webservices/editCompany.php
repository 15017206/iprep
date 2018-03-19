<?php

include 'dbconn.php';

if (isset($_POST)) { 
    $company_id = $_POST['company_id'];
    $name = $_POST['company_name'];
    $country = $_POST['country'];
    
    $query = "UPDATE `company` SET `company_name`='$name',`country`='$country' WHERE `company_id`='$company_id', ";
    
    $result = mysqli_query($link, $query);
    
    if($result){
        $response["result"] = "Updated successfully";
    } else {
        $response["result"] = "Fail to update data";
    }
     
    

    mysqli_close($link);

    echo json_encode($response);
}
?>