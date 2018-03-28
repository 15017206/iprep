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
                var output = "";


                // Create new student to DB
                $("#form1").submit(function (e) {
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/doAddStudent.php",
                            data: $("#form1").serialize(),
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus)
                            {
                                alert(data + textStatus);
                                location.reload();
                                //$('#form1')[0].reset();

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                                alert("fail");
                            }

                        });
                    }
                });

                // Read all students from DB
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudents.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {

                            output += "<li class='list-group-item'><small>" + response[i].name + "</small><br/>" +
                                    "<small>" + response[i].cohort + ", " + response[i].student_id + ", " + response[i].diploma + "</small><br/>" +
                                    "<a href='#' id='" + response[i].student_id + "' data-toggle='modal' data-target='#update_student' onclick='updateStudent(" + response[i].student_id + ")' class='badge badge-warning'>Update</a></li>";
                        }
                        $("#listgroup1").append(output);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });

                // Edit new student to DB
                $("#form2").submit(function (e) {
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/editStudent.php",
                            data: $("#form2").serialize(),
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus)
                            {
                                alert(textStatus);
                                location.reload();
                                //$('#form1')[0].reset();

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                                alert("fail");
                            }

                        });
                    }
                });

            }); //End of document.ready

            // Update student
            function updateStudent(student_id) {
                $("#exampleModalLongTitle").html("Update Student of ID " + student_id);

                // use ajax to perform another GET function
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudentById.php?student_id=" + student_id,
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            $("#student_id").val(student_id);
                            $("#name").val(response[i].name);
                            $("#diploma").val(response[i].diploma);
                            $("#gpa").val(response[i].gpa);
                            $("#tech_subj_score").val(response[i].tech_subj_score);
                            $("#mobile").val(response[i].mobile);
                            $("#personal_email").val(response[i].personal_email);
                            $("#iprep_status").val(response[i].iprep_status);
                            $("#oiip_interest").val(response[i].oiip_interest);
                            $("#cohort").val(response[i].cohort);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                        alert("fail");
                    }
                });
            }

            // Delete student
//            function deleteStudent(student_id) {
//                var confirmDelete = confirm("Delete student of " + student_id + "?");
//                if (confirmDelete) {
//                    alert("ok, deleted");
//                }
//            }
        </script>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <br/>
                    <div class="alert alert-primary" role="alert">
                        <h5 id="header1">Add students to database:</h5>
                        <form id="form1" method="" action="">
                            <!--Student ID-->
                            <div class="form-group">
                                <label for="input1">Student ID:</label>
                                <input type="number" name="student_id" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--Name-->
                            <div class="form-group">
                                <label for="input1">Name:</label>
                                <input type="text" name="name" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--Diploma-->
                            <div class="form-group">
                                <label for="input1">Diploma:</label>
                                <input type="text" name="diploma" class="form-control" id="input1" placeholder="">
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
                                <input type="tel" name="mobile" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--personal email-->
                            <div class="form-group">
                                <label for="input1">personal email:</label>
                                <input type="email" name="email" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--iprep statuses-->
                            <div class="form-group">
                                <label for="input1">iprep status:</label>
                                <input type="text" name="iprep_status" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--oiip interest-->
                            <div class="form-group">
                                <label for="input1">oiip interest:</label>
                                <input type="text" name="oiip_interest" class="form-control" id="input1" placeholder="">
                            </div>

                            <!--cohort-->
                            <div class="form-group">
                                <label for="input1">cohort</label>
                                <input type="number" name="cohort" class="form-control" id="input1" placeholder="">
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

                        <form method="" action="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked="">
                                <label class="form-check-label" for="defaultCheck1">
                                    <div>Show only current year</div>
                                </label>
                            </div>
                        </form>
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
                    <form id="form2" method="" action="">
                        <div class="modal-body">

                            <!--Student ID-->
                            <div class="form-group">
                                <label for="student_id">Student ID:</label>
                                <input type="number" name="student_id" class="form-control" id="student_id" placeholder="">
                            </div>

                            <!--Name-->
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="">
                            </div>

                            <!--Diploma-->
                            <div class="form-group">
                                <label for="diploma">Diploma:</label>
                                <input type="text" name="diploma" class="form-control" id="diploma" placeholder="">
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
                                <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="">
                            </div>

                            <!--personal email-->
                            <div class="form-group">
                                <label for="email">personal email:</label>
                                <input type="email" name="personal_email" class="form-control" id="personal_email" placeholder="">
                            </div>

                            <!--iprep statuses-->
                            <div class="form-group">
                                <label for="iprep_status">iprep status:</label>
                                <input type="text" name="iprep_status" class="form-control" id="iprep_status" placeholder="">
                            </div>

                            <!--oiip interest-->
                            <div class="form-group">
                                <label for="oiip_interest">oiip interest:</label>
                                <input type="text" name="oiip_interest" class="form-control" id="oiip_interest" placeholder="">
                            </div>

                            <!--cohort-->
                            <div class="form-group">
                                <label for="cohort">cohort:</label>
                                <input type="text" name="cohort" class="form-control" id="cohort" placeholder="">
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
    </body>
</html>

