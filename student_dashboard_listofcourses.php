<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <?php
        include 'scripts.php';
        include 'navbar_student.php';
        ?>
        <!--<script src="scripts/courses_staffDashboard.js" type="text/javascript"></script>-->
    </head>
    <body>
        <div class="container">
            <br/>

            <div class="alert alert-info" role="alert">List of available courses:
                <br><br>
                <!--Add some courses here-->
                <div class="list-group" id="courseDetails">
                    <ul class="list-group">
                        <li href="#" data-toggle="modal" data-target="#courses_only_modal_modify" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Introduction to IoT & Embedded Systems</h5>
                                <small>IT Security</small>
                            </div>
                            <div class="w-100">
                                <span class="badge badge-warning">S$60.00</span>&nbsp;<a href=""><span class="badge badge-success">Enroll course</span></a>
                            </div>
                            <small>Coursera</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </body>
</html>
