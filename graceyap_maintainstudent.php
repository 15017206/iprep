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
        include 'navbar_staff.php';
        ?>
        <script>
            $(document).ready(function () {

                var student_id, name, diploma, gpa, mobile, personal_email, iprep_status, oiip_interest, cohort;

                refreshStudents();

                $("#update_student").on("show.bs.modal", function (e) {
                    var clicked = $(e.relatedTarget);

                    var studentId = clicked.data('id');
                    var modal = $(this);
                    console.log("student_id = " + studentId);

                    $.ajax({
                        type: "GET",
                        url: "http://localhost/iprep/webservices/getStudentById.php",
                        data: "student_id=" + studentId,
                        cache: false,
                        dataType: "JSON",
                        success: function (data, textStatus) {
                            modal.find('#student_id').val(data[0].student_id);
                            modal.find('#name').val(data[0].name);
                            modal.find('#diploma').val(data[0].diploma);
                            modal.find('#gpa').val(data[0].gpa);
                            modal.find('#tech_subg_score').val(data[0].tech_subg_score);
                            modal.find('#mobile').val(data[0].mobile);
                            modal.find('#personal_email').val(data[0].personal_email);
                            modal.find('#iprep_status').val(data[0].iprep_status);
                            modal.find('#oiip_interest').val(data[0].oiip_interest);
                            modal.find('#cohort').val(data[0].cohort);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                });

                $("#update_student").submit(function (e) {
                    var modal = $("#update_student");
                    var id = modal.find('#student_id').val();
                    var name = modal.find('#name').val();
                    var diploma = modal.find('#diploma').val();
                    var gpa = modal.find('#gpa').val();
                    var tech_subj_score = modal.find('#tech_subj_score').val();
                    var mobile = modal.find('#mobile').val();
                    var personal_email = modal.find('#personal_email').val();
                    var iprep_status = modal.find('#iprep_status').val();
                    var oiip_interest = modal.find('#oiip_interest').val();
                    var cohort = modal.find('#cohort').val();

                    var data = {student_id: id, name: name, diploma: diploma, gpa: gpa, tech_subj_score: tech_subj_score, mobile: mobile, personal_email: personal_email, iprep_status: iprep_status, oiip_interest: oiip_interest, cohort: cohort};
                    console.log(data);
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/editStudent.php",
                            data: data,
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus) {

                                $('#update_student').modal('hide');
                                console.log(data["result"]);
                                console.log("textStatus: " + textStatus);
                                setTimeout(function () {
                                    refreshStudents();
                                }, 1000);

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });
                    }
                });

                // Create new student to DB
                $("#add_student").submit(function (e) {
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/doAddStudent.php",
                            data: $("#add_student").serialize(),
                            cache: false,
                            dataType: "JSON",
                            success: function (response) {
                                alert(response.result);
                                $('#add_student')[0].reset();
                                setTimeout(function () {
                                    refreshStudents();
                                }, 1000);
                                //$('#form1')[0].reset();
                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                                alert("fail");
                            }
                        });
                    }
                });

                $("#delete_student").on("show.bs.modal", function (e) {
                    var clicked = $(e.relatedTarget);

                    var studentId = clicked.data('id');
                    var modal = $(this);
                    modal.find("#hidden_id").val(studentId);
                });
                $("#delete_student").submit(function (e) {
                    var modal = $("#delete_student");
                    var studentId = modal.find("#hidden_id").val();
                    console.log(studentId + "");
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();
                        $.ajax({
                            type: "GET",
                            url: "http://localhost/iprep/webservices/deleteStudent.php",
                            data: {student_id: studentId},
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus)
                            {
                                $("#delete_student").modal('hide');
                                setTimeout(function () {
                                    refreshStudents();
                                }, 1000);
                                //$('#form1')[0].reset();

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
//                                alert("fail"); fail but still can successfully add. weird
                            }

                        });
                    }

                })
                $("#filterCohort").keyup(function () {
                    var cohort = $("#filterCohort").val();
                    var output = "";
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/iprep/webservices/getStudentsByCohort.php",
                        data: "cohort=" + cohort,
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            if (response.length > 0) {
                                for (var i = 0; i < response.length; i++) {

                                    output += "<li class='list-group-item'><small>" + response[i].name + "</small><br/>" +
                                            "<small>" + response[i].cohort + ", " + response[i].student_id + ", " + response[i].diploma + ", " + response[i].iprep_status + "</small><br/>" +
                                            "<a href='#' data-id='" + response[i].student_id + "' data-toggle='modal' data-target='#update_student'  class='badge badge-warning'>Update</a>" + "&nbsp;" +
//                                            "<a href='#' data-id='" + response[i].student_id + "' data-toggle='modal' data-target='#delete_student'  class='badge badge-danger'>Delete</a>"+
                                            "</li>";
                                }

                            } else {
                                output += "<li class='list-group-item'>No students in this cohort</li>";

                            }
                            $("#listgroup1").html(output);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                });

            }); //End of document.ready

            function refreshStudents() {
                // Read all students from DB

                var output = "";

                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudents.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {

                            output += "<li class='list-group-item'><small>" + response[i].name + "</small><br/>" +
                                    "<small>" + response[i].cohort + ", " + response[i].student_id + ", " + response[i].diploma + ", " + response[i].iprep_status + "</small><br/>" +
                                    "<a href='#' data-id='" + response[i].student_id + "' data-toggle='modal' data-target='#update_student'  class='badge badge-warning'>Update</a>" + "&nbsp;" +
//                                    "<a href='#' data-id='" + response[i].student_id + "' data-toggle='modal' data-target='#delete_student'  class='badge badge-danger'>Delete</a>" +
                                    "</li>";
                        }
                        $("#listgroup1").html(output);
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
            <div class="row">
                <div class="col-sm">
                    <br/>
                    <div class="alert alert-primary" role="alert">
                        <h5 id="header1">Add students to database:</h5>
                        <form id="add_student" method="" action="">
                            <!--Student ID-->
                            <div class="form-group">
                                <label for="input1">Student ID:</label>
                                <input type="number" name="student_id" required class="form-control" id="input1" placeholder="required">
                            </div>

                            <!--Name-->
                            <div class="form-group">
                                <label for="input1">Name:</label>
                                <input type="text" name="name" class="form-control" required id="input1" placeholder="required">
                            </div>

                            <!--Diploma-->
                            <div class="form-group">
                                <label for="input1">Diploma:</label>
                                <input type="text" name="diploma" class="form-control" required id="input1" placeholder="required">
                            </div>

                            <!--GPA-->
                            <div class="form-group">
                                <label for="input1">GPA:</label>
                                <input type="text" name="gpa" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--Tech Subj Score-->
                            <div class="form-group">
                                <label for="input1">Tech Subj Score:</label>
                                <input type="number" name="tech_subj_score" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--Mobile No.-->
                            <div class="form-group">
                                <label for="input1">Mobile:</label>
                                <input type="tel" name="mobile" class="form-control" required id="input1" placeholder="required">
                            </div>

                            <!--personal email-->
                            <div class="form-group">
                                <label for="input1">personal email:</label>
                                <input type="email" name="email" class="form-control" required id="input1" placeholder="required">
                            </div>

                            <!--iprep statuses-->
                            <!--                            <div class="form-group">
                                                            <label for="input1">iprep status:</label>
                                                            <input type="text" name="iprep_status" class="form-control" id="input1" placeholder="">
                                                        </div>-->
                            <div class="form-group">
                                <label for="iprep_status">iPrep status</label>
                                <select class="form-control" name="iprep_status" id="iprep_status">
                                    <option value="Valid">Valid</option>
                                    <option value="Withdrawn">Withdrawn</option>
                                    <option value="KIV">KIV</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Not applicable">Not applicable</option>
                                </select>
                            </div>

                            <!--oiip interest-->
                            <!--                            <div class="form-group">
                                                            <label for="input1">oiip interest:</label>
                                                            <input type="text" name="oiip_interest" class="form-control" id="input1" placeholder="">
                                                        </div>-->

                            <!--cohort-->
                            <div class="form-group">
                                <label for="input1">cohort</label>
                                <input type="number" name="cohort" class="form-control" required id="input1" placeholder="required">
                                <small>eg. 2019, 2080</small>
                            </div>

                            <button type="submit" id="submit1" class="btn btn-primary mb-2">Add</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm">
                    <br/>
                    <div class="alert alert-info" role="alert">
                        <h5>Students currently in db</h5>


                        <div class="form-group">
                            <label for="filterCohort">Filter Cohort:</label>
                            <input type="number" name="filterCohort" required class="form-control" id="filterCohort" placeholder="Year of Enrolment">
                        </div> 

                        <br/>

                        <ul class="list-group" id="listgroup1">
                            <!--<li class='list-group-item'>
                                <small>Toh Kee Heng s/o Srinivasan</small><br/>
                                <small>15003786, DIT</small><br/>
                                <a href="#" class="badge badge-warning">Update</a>
                                <a href="#" class="badge badge-danger" onclick=''>Delete</a>
                            </li>-->
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!--Modal for Updating student-->
        <div class="modal fade" id="update_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateStudent" method="" action="">
                        <div class="modal-body">

                            <!--Student ID-->
                            <div class="form-group">
                                <label for="student_id">Student ID:</label>
                                <input type="number" name="student_id" disabled required class="form-control" id="student_id" placeholder="">
                            </div>

                            <!--Name-->
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" required id="name" placeholder="">
                            </div>

                            <!--Diploma-->
                            <div class="form-group">
                                <label for="diploma">Diploma:</label>
                                <input type="text" name="diploma" class="form-control" required id="diploma" placeholder="">
                            </div>

                            <!--GPA-->
                            <div class="form-group">
                                <label for="gpa">GPA:</label>
                                <input type="text" name="gpa" class="form-control" id="gpa" placeholder="">
                            </div>

                            <!--Tech Subj Score-->
                            <div class="form-group">
                                <label for="tech_subj_score">Tech Subj Score:</label>
                                <input type="number" name="tech_subj_score" id="tech_subj_score" class="form-control" placeholder="">
                            </div>

                            <!--Mobile No.-->
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="tel" name="mobile" class="form-control" required id="mobile" placeholder="">
                            </div>

                            <!--personal email-->
                            <div class="form-group">
                                <label for="email">personal email:</label>
                                <input type="email" name="personal_email" class="form-control" required id="personal_email" placeholder="">
                            </div>

                            <!--iprep statuses-->
                            <!--                            <div class="form-group">
                                                            <label for="iprep_status">iprep status:</label>
                                                            <input type="text" name="iprep_status" class="form-control" id="iprep_status" placeholder="">
                                                        </div>-->
                            <div class="form-group">
                                <label for="iprep_status">iPrep status</label>
                                <select class="form-control" name="iprep_status" id="iprep_status">
                                    <option value="Valid">Valid</option>
                                    <option value="Withdrawn">Withdrawn</option>
                                    <option value="KIV">KIV</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Not applicable">Not applicable</option>
                                </select>
                            </div>

                            <!--oiip interest-->
                            <div class="form-group">
                                <label for="oiip_interest">oiip interest:</label>
                                <input type="text" name="oiip_interest" class="form-control" id="oiip_interest" placeholder="">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    <div>Not interested for OIIP</div>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    <div>Interested for OIIP</div>
                                </label>
                            </div>

                            <!--cohort-->
                            <div class="form-group">
                                <label for="cohort">cohort:</label>
                                <input type="text" name="cohort" class="form-control" required id="cohort" placeholder="">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit_edited" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!--Modal for Deleting student-->
        <div class="modal fade" id="delete_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="deleteStudent" method="" action="">
                        <div class="modal-body">

                            <!--Student ID-->
                            <div class="form-group">
                                <label id="labelForDelete">Are you sure you want to delete this student</label>
                            </div>
                            <input id="hidden_id" name="hidden_id" type="hidden">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="submit_edited" class="btn btn-primary">Delete Student</button>

                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

