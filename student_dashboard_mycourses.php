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
        $student_id = $_SESSION['student_id'];
        ?>
        <script>
            $(document).ready(function () {
                showMyEnrolledCourses();
            });
            function showMyEnrolledCourses() {
                var output = "";
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudentHasCourseByStudentId.php",
                    data: {student_id: "<?php echo $student_id; ?>"},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            output += "<li class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                    "<div class='d-flex w-100 justify-content-between'>" +
                                    "<h5 class='mb-1'>"+ response[i].course_name +"</h5>" +
                                    "<small>"+ response[i].course_genre +"</small>" +
                                    "</div>" +
                                    "<p class='mb-1'></p>" +
                                    "<span class='badge badge-warning'>$"+response[i].course_cost+"</span>&nbsp;<span class='badge badge-success'>"+response[i].status+"</span>" +
                                    "<br/>" +
                                    "<a href=''><span class='badge badge-info'>Make claim</span></a>&nbsp;" +
                                    "<a href=''><span class='badge badge-info'>Submit IMDA approval email</span></a>" +
                                    "<br/>" +
                                    "<small>"+response[i].course_provider+"</small>" +
                                    "</li>";
                        }
                        $("#big_container").html(output);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }
        </script>
    </head>
    <body>

        <div class="container">
            <br/>

            <!--List of courses Applied-->
            <div class="alert alert-success" role="alert">

                <!--Add some-->
                <p>List of courses applied:</p>
                <div cla        ss="list-group">
                    <ul class="list-group" id="big_container">

<!--                        <li class='list-group-item list-group-item-action flex-column align-items-start'>
                            <div class='d-flex w-100 justify-content-between'>
                                <h5 class='mb-1'>How to hack LEO 2.0 - Hackathon</h5>
                                <small>IT Security</small>
                            </div>
                            <p class='mb-1'></p>
                            <span class='badge badge-warning'>$60.00</span>&nbsp;<span class='badge badge-success'>Approved</span>
                            <br/>
                            <a href=''><span class='badge badge-info'>Make claim</span></a>
                            <a href=''><span class='badge badge-info'>Submit IMDA approval email</span></a>
                            <br/>
                            <small>Coursera</small>
                        </li>-->

                    </ul>
                </div>
            </div>
        </div>

        <!--Modal for Apply New Course-->
        <div class="modal fade" id="apply_new_course_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Apply new course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal for Make claim for course-->
        <div class="modal fade" id="make_claim_course_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Make Claim for course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal for submit IMDA approval email-->
        <div class="modal fade" id="submit_imda_approval_email_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
