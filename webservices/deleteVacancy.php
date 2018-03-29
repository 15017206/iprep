<?php

include 'dbconn.php';

if (isset($_POST)) {    
    $vacancy_id = $_POST['vacancy_id']; 
    
    $query = "DELETE FROM `oiip_vacancy` WHERE vacancy_id = '$vacancy_id'";
 
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