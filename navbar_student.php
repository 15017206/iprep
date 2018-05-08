<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$_SESSION['student_id'] = 15035033;
$_SESSION['student_name'] = "John";
?>
<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Welcome, <?php echo $_SESSION['student_name']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="student_dashboard_listofcourses.php">Apply Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student_dashboard_mycourses.php">My Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student_dashboard_oiip.php">OIIP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>
</html>
