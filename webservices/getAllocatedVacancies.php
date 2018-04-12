<?php

include 'dbconn.php';

$query = "SELECT * FROM oiip_vacancy INNER JOIN company ON oiip_vacancy.company_id=company.company_id INNER JOIN student_oiip_assignment ON oiip_vacancy.vacancy_id=student_oiip_assignment.vacancy_id INNER JOIN student ON student_oiip_assignment.student_id=student.student_id WHERE oiip_vacancy.vacancy_id IN (SELECT vacancy_id FROM student_oiip_assignment)";

$result = mysqli_query($link, $query) or die('Error querying database');

while ($row = mysqli_fetch_assoc($result)) {
    $vacancies[] = $row;
}
mysqli_close($link);

echo json_encode($vacancies);

?>