<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
//$_SESSION[''];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">

            <!--Logo/Brand/etc-->
            <a class="navbar-brand" href="#">
                <img src="" width="30" height="30" alt="">
            </a>

            <!--Links in navbar-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="graceyap_dashboard_course.php">Courses</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="graceyap_dashboard_studenthascourse.php">Student with courses</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="graceyap_dashboard_oiip.php">OIIP</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="graceyap_dashboard_company.php">Company</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>
</html>