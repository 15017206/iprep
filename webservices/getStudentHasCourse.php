<?php

include 'dbconn.php';

$query = "SELECT * FROM `student_has_course` INNER JOIN `course` ON `student_has_course`.`course_id` =`course`.`course_id` INNER JOIN `student` ON `student_has_course`.`student_id`=`student`.`student_id`";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $details[] = $row;
}

mysqli_close($link);

echo json_encode($details);
?>