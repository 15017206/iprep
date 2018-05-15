<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <?php
        include 'scripts.php';
        include 'navbar_staff.php';
        ?>
        <script>
            $(document).ready(function () {
                show();
                // When a modal is submitted
                $('#course_status_form').submit(function () {
                    var student_id = $('#student_id_input').val();
                    var status = $('#course_status_dropdown').val();
                    var course_id = $('#course_id_input').val();
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/iprep/webservices/editCourseStatusByStudentId.php",
                        data: {student_id: student_id, status: status, course_id: course_id},
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            alert(response.result);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                });

                $('#search_name_studentid').keyup(function () {
                    var query = $('#search_name_studentid').val();
                    var company_id_array = ["x"];
                    var list_of_courses = "";
                    $("#big_container").empty();
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/iprep/webservices/getStudentHasCourseByStudentIdOrStudentNameOrCourseName.php",
                        data: {query: query},
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            for (var i = 0; i < response.length; i++) {
                                var course_id = response[i].course_id;
                                //Related to vacancies, put response[i] here

                                var course_name = response[i].course_name;
                                var course_cost = response[i].course_cost;
                                var course_status = response[i].status;
                                var course_genre = response[i].course_genre;
                                var course_provider = response[i].course_provider;
                                var student_id = response[i].student_id;
                                var student_name = response[i].name;
                                var student_diploma = response[i].diploma;
                                var student_gpa = response[i].gpa;
                                var tech_subj_score = response[i].tech_subj_score;
                                var student_mobile = response[i].mobile;
                                var student_personal_email = response[i].personal_email;
                                var student_iprep_status = response[i].iprep_status;
                                var student_oiip_interest = response[i].oiip_interest;
                                var student_cohort = response[i].cohort;
                                // check if the company_id is in the array. If not inside, add it in.
                                for (var j = 0; j <= company_id_array.length; j++) {
                                    var list_of_courses_with_students = "";
                                    var list_of_courses = "";
                                    if (course_id !== company_id_array[j]) {
                                        // If the array has checked the last index
                                        if (j === company_id_array.length - 1) {
                                            company_id_array.push(course_id);
                                            // Related to companies, put response[i] here

                                            list_of_courses_with_students += "<li class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                                    "<div class='d-flex w-100 justify-content-between'>" +
                                                    "<h5 class='mb-1'>" + course_name + "</h5>" +
                                                    "<small>" + course_genre + "</small>" +
                                                    "</div>" +
                                                    "<span class='badge badge-success'>$" + course_cost + "</span>" +
                                                    "<br/>" +
                                                    "<ul class='list-group' id='course_" + course_id + "'>" +
                                                    "</ul>" +
                                                    "<br/>" +
                                                    "<small>" + course_provider + "</small>" +
                                                    "</li>";
                                            $("#big_container").append(list_of_courses_with_students);
                                        }
                                    } else {
                                        break;
                                    }
                                }
                                list_of_courses += "<li class='list-group-item justify-content-between align-items-center'>" +
                                        "<div style='font-weight:bold'>" + student_name + ", " + student_id + "</div><span class='badge badge-info'>" + student_diploma + ", " + student_gpa + "</span>" +
                                        "<br/><small>Tech Sub Score: " + tech_subj_score + " | Mobile: " + student_mobile + " | Personal Email: " + student_personal_email + "</small>" +
                                        "<br/><small>iPrep status: " + student_iprep_status + " | Oiip interest: " + student_oiip_interest + " | Cohort: " + student_cohort + "</small>" +
                                        "<br/><a href='#' onclick='getCourseStatusFromStudentId(" + student_id + ")' class='cell_class badge badge-warning' data-toggle='modal' data-target='#change_course_status'>" + course_status + "</a>" +
                                        "</li>";
                                $("#course_" + course_id).append(list_of_courses);
                            }
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                })
            }); // end of document.ready

            function show() {
                var company_id_array = ["x"];
                var list_of_courses = "";
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudentHasCourse.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            var course_id = response[i].course_id;
                            //Related to vacancies, put response[i] here

                            var course_name = response[i].course_name;
                            var course_cost = response[i].course_cost;
                            var course_status = response[i].status;
                            var course_genre = response[i].course_genre;
                            var course_provider = response[i].course_provider;
                            var student_id = response[i].student_id;
                            var student_name = response[i].name;
                            var student_diploma = response[i].diploma;
                            var student_gpa = response[i].gpa;
                            var tech_subj_score = response[i].tech_subj_score;
                            var student_mobile = response[i].mobile;
                            var student_personal_email = response[i].personal_email;
                            var student_iprep_status = response[i].iprep_status;
                            var student_oiip_interest = response[i].oiip_interest;
                            var student_cohort = response[i].cohort;
                            // check if the company_id is in the array. If not inside, add it in.
                            for (var j = 0; j <= company_id_array.length; j++) {
                                var list_of_courses_with_students = "";
                                var list_of_courses = "";
                                if (course_id !== company_id_array[j]) {
                                    // If the array has checked the last index
                                    if (j === company_id_array.length - 1) {
                                        company_id_array.push(course_id);
                                        // Related to companies, put response[i] here

                                        list_of_courses_with_students += "<li class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                                "<div class='d-flex w-100 justify-content-between'>" +
                                                "<h5 class='mb-1'>" + course_name + "</h5>" +
                                                "<small>" + course_genre + "</small>" +
                                                "</div>" +
                                                "<span class='badge badge-success'>$" + course_cost + "</span>" +
                                                "<br/>" +
                                                "<ul class='list-group' id='course_" + course_id + "'>" +
                                                "</ul>" +
                                                "<br/>" +
                                                "<small>" + course_provider + "</small>" +
                                                "</li>";
                                        $("#big_container").append(list_of_courses_with_students);
                                    }
                                } else {
                                    break;
                                }
                            }
                            list_of_courses += "<li class='list-group-item justify-content-between align-items-center'>" +
                                    "<div style='font-weight:bold'>" + student_name + ", " + student_id + "</div><span class='badge badge-info'>" + student_diploma + ", " + student_gpa + "</span>" +
                                    "<br/><small>Tech Sub Score: " + tech_subj_score + " | Mobile: " + student_mobile + " | Personal Email: " + student_personal_email + "</small>" +
                                    "<br/><small>iPrep status: " + student_iprep_status + " | Oiip interest: " + student_oiip_interest + " | Cohort: " + student_cohort + "</small>" +
                                    "<br/><a href='#' onclick='getCourseStatusFromStudentId(" + student_id + ")' class='cell_class badge badge-warning' data-toggle='modal' data-target='#change_course_status'>" + course_status + "</a>" +
                                    "</li>";
                            $("#course_" + course_id).append(list_of_courses);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            function getCourseStatusFromStudentId(student_id) {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudentHasCourseByStudentId.php",
                    data: {student_id: student_id},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            $("#change_course_status_title").text("Change course status for " + response[i].name);
                            $('#course_status_dropdown').val(response[i].status);
                            $('#student_id_input').val(response[i].student_id);
                            $('#course_id_input').val(response[i].course_id);
                        }
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
            <p>List of students with courses:</p>

            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="navbar-brand" href="#" id="11">Filter:</div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--<form class="form-inline">-->
                    <br/>
                        <input class="form-control" id="search_name_studentid" type="search" placeholder="Name/Student ID or Course name" aria-label="Search">
                    <!--</form>-->
                </div>
            </nav>
            <br/>

            <br/>
            <!--            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Show only Unassigned Vacancies</label>
                        </div>-->
            <br/>

            <!--Add some students here-->
            <div class="list-group">

                <ul id="big_container" class="list-group">
                    <!--                    <li class='list-group-item list-group-item-action flex-column align-items-start'>
                                            <div class='d-flex w-100 justify-content-between'>
                                                <h5 class='mb-1'>Introduction of ioT & Embedded Systems</h5>
                                                <small>4 months</small>
                                            </div>
                                            <span class='badge badge-success'>$600.00</span>
                                            <br/>
                                            <ul class='list-group'>
                                                <li class='list-group-item justify-content-between align-items-center'>
                                                    Lee Tze Jian&nbsp;<span class='badge badge-info'>DMSD</span>
                                                    <br/><span class='badge badge-warning'>Ongoing</span>
                                                </li>
                                            </ul>
                                            <br/>
                                            <small>Coursera</small>
                                        </li>-->
                    <!--                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">How to hack LEO 2.0 - Hacking course</h5>
                                                <small>2 days</small>
                                            </div>
                                            <span class="badge badge-success">$600.00</span>
                                            <br/>
                                            <ul class="list-group">
                                                <li class="list-group-item justify-content-between align-items-center">
                                                    Toh Kee Heng&nbsp;<span class="badge badge-info">DIT</span>
                                                    <br/><span class="badge badge-warning">Ongoing</span>
                                                </li>
                                            </ul>
                                            <br/>
                                            <small>Code Academy</small>
                                        </li>-->
                </ul>

                <!--                <a href="#" data-toggle="modal" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Grace Yap Jr. (15063493)</h5>
                                        <small>Still doing course</small>
                                    </div>
                                    <div class="d-flex w-100">
                                        <span class="badge badge-warning">DBIS</span>
                                    </div>
                                    <p class="mb-1">Introduction to Programming - Internet of Things&nbsp;<span class="badge badge-success">Approved</span></p>
                                    <small>Coursera</small>
                                </a>-->
            </div>

            <!--Modal for students has courses-->
            <div class="modal fade" id="courses_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Student course status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name:</label>
                                    <input type="text" class="form-control" id="" placeholder="eg. Tan Ah Teck">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Course Orgin:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Coursera</option>
                                        <option>Khan Academy</option>
                                        <option>Code Academy</option>
                                        <option>OASIS</option>
                                        <option>Brazzers</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Course Status:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>New</option>
                                        <option>Approved</option>
                                        <option>Completed</option>
                                        <option>Payment Requested</option>
                                        <option>Payment Received</option>
                                        <option>Payment Disbursed</option>
                                        <option>Rejected</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">Save changes</button>
                            <button type="button" class="btn btn-danger">Delete student</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal for courses and students-->
            <div class="modal fade" id="courses_only_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add new courses</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name of new course:</label>
                                <input type="text" class="form-control" id="" placeholder="eg. Introduction to IoT">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Course Genre:</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Programming</option>
                                    <option>IT Security</option>
                                    <option>Internet of Things</option>
                                    <option>Cognitive Technology</option>
                                    <option>Data Analytics</option>
                                    <option>Tech Support</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Cost:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">S$</span>
                                    </div>
                                    <input type="number" class="form-control" id="" placeholder="Please put in SGD, eg. SGD$0.06">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Course Provider:</label>
                                <input type="text" class="form-control" id="" placeholder="eg. Coursera, Codeacademy">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal to change course status-->
            <div class="modal fade" id="change_course_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form id="course_status_form" method="" action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="change_course_status_title">Change course status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="student_id_input">Student ID:</label>
                                <input class="form-control" id="student_id_input" type="text" placeholder="" readonly>
                                <br/>
                                <label for="course_id_input">Course ID:</label>
                                <input class="form-control" id="course_id_input" type="text" placeholder="" readonly>
                                <br/>
                                <label for="course_status_dropdown">Course Status:</label>
                                <select class="form-control" id="course_status_dropdown">
                                    <option value="New">New</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Payment requested">Payment requested</option>
                                    <option value="Payment received">Payment received</option>
                                    <option value="Payment disbursed">Payment disbursed</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
