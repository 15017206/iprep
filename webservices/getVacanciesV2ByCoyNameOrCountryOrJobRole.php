<?php

include 'dbconn.php';

if (isset($_GET['query'])) {
    $querySearch = $_GET['query'];
    $query = "SELECT * FROM oiip_vacancy JOIN company on oiip_vacancy.company_id = company.company_id" . 
            " WHERE `oiip_vacancy`.`job_role` LIKE '%$querySearch%'".
            " OR `company`.`company_name` LIKE '%$querySearch%'".
            " OR `company`.`country` LIKE '%$querySearch%'"
            ;

    $result = mysqli_query($link, $query) or die('Error querying database');

    while ($row = mysqli_fetch_assoc($result)) {
        $vacancies[] = $row;
    }
    mysqli_close($link);

    echo json_encode($vacancies);
}
?>