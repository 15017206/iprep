<?php

include 'dbconn.php';
$vacancy_id = $_GET['vacancy_id'];
$query = "SELECT * FROM `oiip_vacancy` INNER JOIN `company` ON `oiip_vacancy`.`company_id` = `company`.`company_id` WHERE `vacancy_id` = '$vacancy_id'";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $vacancies = $row;
}
mysqli_close($link);

echo json_encode($vacancies);

?>