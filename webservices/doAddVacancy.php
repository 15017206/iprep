<?php

include 'dbconn.php';

if (isset($_POST)) { 
    
    $startDate = $_POST['iip_start_date'];
    $endDate = $_POST['iip_end_date'];
    $allowance = $_POST['mthly_allowance'];
    $currency = $_POST['currency'];
    $role = $_POST['role'];
    $company_id = $_POST['company_id'];
    $accprovided = $_POST['accomodation_provided'];
    $tixprovided = $_POST['air_ticket_provided'];
    
    $query = "INSERT INTO `oiip_vacancy`(`internship_start_date`,`internship_end_date`,`company_mthly_allowance`,"
            . "`allowance_currency`,`job_role`,`company_id`,`accomodation_provided`,`air_ticket_provided`)"
            . "VALUES ('$startDate','$endDate','$allowance','$currency','$role','$company_id','$accprovided','$tixprovided')";
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