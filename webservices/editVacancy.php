<?php

include 'dbconn.php';

if (isset($_POST)) { 
    $vacancy_id = $_POST['vacancy_id'];
    $startDate = $_POST['iip_start_date'];
    $endDate = $_POST['iip_end_date'];
    $allowance = $_POST['mthly_allowance'];
    $currency = $_POST['currency'];
    $role = $_POST['role'];
    $company_id = $_POST['company_id'];
    $accprovided = $_POST['accomodation_provided'];
    $tixprovided = $_POST['air_ticket_provided'];
    
    $query = "UPDATE `oiip_vacancy` SET `internship_start_date`='$startDate',`internship_end_date`='$endDate',"
            . "`company_mthly_allowance`='$allowance', `allowance_currency`='$currency',`job_role`='$role',"
            . "`company_id`='$company_id',`accomodation_provided`='$accprovided',`air_ticket_provided`)='$tixprovided'"
            . "WHERE `vacancy_id='$vacancy_id'";
    
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