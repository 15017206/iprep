<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $companyname = $_POST['company_name'];
    $country = $_POST['country'];
    
    $query = "INSERT INTO `company`(`company_name`, `country`) VALUES ('$companyname','$country')";
    $result = mysqli_query($link, $query);
    
    if($result){
        $response["result"] = "Inserted successfully";
    } else {
        $response["result"] = "Fail to insert new data";
    }
     
    

    mysqli_close($link);

    echo json_encode($response);
 

}

?>