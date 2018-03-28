<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "iprepdb";

$link = mysqli_connect($host,$user,$pass,$db);

session_start();

$user = $_POST["stdId"];
$pass = $_POST["stdPass"];


$query = "SELECT * FROM user WHERE user_id = '$user' AND password = SHA1('$pass')";

$result = mysqli_query($link, $query) or die("Error querying database");

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result);
    $_SESSION["user_id"] = $row['user_id'];
    $_SESSION["user_type"] = $row['type']; 
    
    if($row['type'] == "Staff"){
        echo "Login/Staff";
    } else {
        echo "Login/Student";
    }
    
}

mysqli_close($link);

?>