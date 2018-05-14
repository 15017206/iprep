<?php

include 'dbconn.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $query = "SELECT * FROM `student_oiip_assignment` INNER JOIN `oiip_vacancy` ON `oiip_vacancy`.`vacancy_id`=`student_oiip_assignment`.`vacancy_id` INNER JOIN `company` ON `company`.`company_id`=`oiip_vacancy`.`company_id` WHERE student_id='$student_id'";
    $result = mysqli_query($link, $query);


    while ($row = mysqli_fetch_assoc($result)) {
        $details[] = $row;
    }

    mysqli_close($link);

    echo json_encode($details);
}
?>
