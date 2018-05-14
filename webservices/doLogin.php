<?php


include 'dbconn.php';

session_start();

$user = $_POST["stdId"];
$pass = $_POST["stdPass"];


$query = "SELECT * FROM user WHERE user_id = '$user' AND password = SHA1('$pass')";

$result = mysqli_query($link, $query) or die("Error querying database");

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result);
    $_SESSION["user_id"] = $row['user_id'];
    $_SESSION['student_id'] = $row['user_id'];
    $_SESSION["user_type"] = $row['type']; 
    $student_id = $row['user_id'];
    if($row['type'] == "Staff"){
        echo "Login/Staff";
    } else {
        $query2 = "select * from `student` where `student_id`='$student_id'";
        $result2 = mysqli_query($link, $query2) or die("Error querying database");
        $row2 = mysqli_fetch_array($result2);
        $_SESSION['student_name'] = $row2['name'];
        
        echo "Login/Student";
    }
}

mysqli_close($link);

?>