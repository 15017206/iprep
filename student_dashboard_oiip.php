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
                showMyOIIP();
                checkIfOIIPInterestIsSet("<?php echo $student_id; ?>");
                $('#oiip_interest').submit(function () {
                    var answer = $('input[name=exampleRadios]:checked').val();
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/iprep/webservices/doIIPInterest.php",
                        data: {student_id: "<?php echo $student_id; ?>", oiip_interest: answer},
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
            });
            function showMyOIIP() {
                var output = "";
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getOIIPAssignmentsByStudentId.php",
                    data: {student_id: "<?php echo $student_id; ?>"},
//                    data: {student_id: 15082233},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            output += "<li data-toggle='modal' data-target='#courses_modal' class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                    "<div class='d-flex w-100 justify-content-between'>" +
                                    "<h5 class='mb-1'>" + response[i].job_role + "</h5>" +
                                    "<small>" + response[i].country + "</small>" +
                                    "</div>" +
                                    "<p class='mb-1'></p>" +
                                    "<span class='badge badge-warning'>Funding Status: Applied</span>&nbsp;<span class='badge badge-warning'>Job Status: " + response[i].job_status + "</span>&nbsp;<span class='badge badge-warning'>Funding source: " + response[i].funding_source + "</span>" +
                                    "<br/><br/>" +
//                                    "<button type='button' data-toggle='modal' data-target='#uploadfiles' class='btn btn-primary btn-sm'>Upload Files</button>" +
//                            "<a href=''><span class='badge badge-info'>Request OIIP approval from IMDA</span></a>"+
//                            "<a href=''><span class='badge badge-info'>Submit OIIP approval email</span></a>"+
                                    "<br/>" +
                                    "<small>" + response[i].allowance_currency + " " + response[i].company_mthly_allowance + "</small>" +
                                    "</li>";
                        }
                        $("#big_container").html(output);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            function checkIfOIIPInterestIsSet(student_id) {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/checkOIIPInterestSet.php",
                    data: {student_id: student_id},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        if (response.result == null) {
                            $('#oiip_interest_alert').show();
                            $('#small_subtitle').text("You have not indicated your interest for Overseas Internship yet.");
                        } else {
                            $('#oiip_interest_alert').hide();
                            if (response.result == "1") {
                                $('#small_subtitle').text("You have expressed interest for Overseas Internship.");
                            } else if (response.result == "0") {
                                $('#small_subtitle').text("You are not interested in Overseas Internship.");
                            }
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
        <br/>
        <!--About OIIP-->
        <div class="container">
            <div id="oiip_interest_alert" class="alert alert-info" role="alert">
                <p>OIIP Interest</p>        
                <form id="oiip_interest" method="" action="">
                    <div>Are you interested for Overseas Internship?</div>
                    <small>Please choose carefully. No change is allowed</small>
                    <!--Interest for OIIP-->
                    <div class="form-check">
                        <input class="form-check-input" required type="radio" name="exampleRadios" id="exampleRadios1" value="1">
                        <label class="form-check-label" for="exampleRadios1">Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="0">
                        <label class="form-check-label" for="exampleRadios2">No</label>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit decision</button>
                </form>
            </div>

            <div class="alert alert-warning" role="alert">
                <p>OIIP assignment:</p>
                <small id="small_subtitle"></small>
                <div class="list-group">
                    <ul class="list-group" id="big_container">
                    </ul>
                </div>
            </div>
        </div>

        <!--Modal for uploading files-->
        <div class="modal fade" id="uploadfiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload files here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>OIIP approval email</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Air ticket</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Final report</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>MAS currency forex exchange rate</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Annex E</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Annex F</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                            </ul>
                        </form>
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
