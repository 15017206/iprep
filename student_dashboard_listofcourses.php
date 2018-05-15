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
        <script>
            var student_id = "<?php echo $_SESSION['student_id'] ?>";
            $(document).ready(function () {
                showCourses();
            });
            function showCourses() {
                var output = "";
                $.ajax({
                    type: "GET",
                    url: "/webservices/getCourses.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            output += "<li href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                    "<div class='d-flex w-100 justify-content-between'>" +
                                    "<h5 class='mb-1'>" + response[i].course_name + "</h5>" +
                                    "<small>" + response[i].course_genre + "</small>" +
                                    "</div>" +
                                    "<div class='w-100'>" +
                                    "<span class='badge badge-warning'>$" + response[i].course_cost + "</span>&nbsp;<a href='#' onclick='enrollCourse(" + response[i].course_id + ")'><span class='badge badge-success'>Enroll course</span></a>" +
                                    "</div>" +
                                    "<small>" + response[i].course_provider + "</small>" +
                                    "</li>";
                        }
                        $("#big_container").html(output);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            function enrollCourse(course_id) {
                if (confirm("Enroll?")) {
                    $.ajax({
                        type: "POST",
                        url: "/webservices/doApplyCourse.php",
                        data: {student_id: student_id, course_id: course_id},
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            alert(response.result);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error "+ obj.result + textStatus + ": " + errorThrown);
                        }
                    });
                }
            }

        </script>
    </head>
    <body>
        <div class="container">
            <br/>

            <div class="alert alert-info" role="alert">List of available courses:
                <br><br>

                <!--Add some courses here-->
                <div class='list-group' id='courseDetails'>
                    <ul class='list-group' id="big_container">
                        <li href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' class='list-group-item list-group-item-action flex-column align-items-start'>
                            <div class='d-flex w-100 justify-content-between'>
                                <h5 class='mb-1'>Introduction to IoT & Embedded Systems</h5>
                                <small>IT Security</small>
                            </div>
                            <div class='w-100'>
                                <span class='badge badge-warning'>S$60.00</span>&nbsp;<a href=''><span class='badge badge-success'>Enroll course</span></a>
                            </div>
                            <small>Coursera</small>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </body>
</html>
