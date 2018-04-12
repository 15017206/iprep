<?php

include 'dbconn.php';

$query = "SELECT * FROM company 
INNER JOIN oiip_vacancy ON company.company_id=oiip_vacancy.company_id
WHERE oiip_vacancy.vacancy_id NOT IN (SELECT vacancy_id FROM student_oiip_assignment)";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $vacancies[] = $row;
}
mysqli_close($link);

echo json_encode($vacancies);

?>