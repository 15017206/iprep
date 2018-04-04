<?php

include 'dbconn.php';

if (isset($_GET['vacancy_id'])) {
    $id = $_GET['vacancy_id'];

    $query = "SELECT * FROM oiip_vacancy JOIN company on oiip_vacancy.company_id = company.company_id WHERE vacancy_id LIKE '%$id%'";

    $result = mysqli_query($link, $query) or die('Error querying database');

    while ($row = mysqli_fetch_assoc($result)) {
        $vacancies[] = $row;
    }
    mysqli_close($link);

    echo json_encode($vacancies);
}
?>