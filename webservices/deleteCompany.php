<?php

include 'dbconn.php';

if (isset($_POST)) {    
    $company_id = $_POST['company_id']; 
    
    $query = "DELETE FROM `company` WHERE company_id = '$company_id'";
 
    $result = mysqli_query($link, $query);
    
    if($result){
        $response["result"] = "Deleted successfully";
    } else {
        $response["result"] = "Fail to delete data";
    }
     
    mysqli_close($link);

    echo json_encode($response);
 

}

?>
