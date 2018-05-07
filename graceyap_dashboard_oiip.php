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
            var company_id_array = ["x"];
            list_of_vacancies2 = "";
            var crud_status = "";
            $(document).ready(function () {
                getUnassignedVacancies();
                getAssignedVacancies();

                $("#form_modal").submit(function () {
                    if (crud_status == "assign") {
                        alert("assign");

                        var student_id = $("#exampleFormControlSelect1").val();
                        var vacancy_id = $("#vacancy_id").val();
                        var funding_status = $("#exampleFormControlSelect2").val();
                        var job_status = $("#exampleFormControlSelect3").val();
                        var funding_source = $("#exampleFormControlSelect4").val();

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/doAssignOIIP.php",
                            data: {student_id: student_id, vacancy_id: vacancy_id, funding_status: funding_status, job_status: job_status, funding_source: funding_source},
                            cache: false,
                            dataType: "JSON",
                            success: function (response) {
                                alert(response.result);
                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });
                        location.reload();
                    } else if (crud_status == "update") {
                        alert("update");

                        var vacancy_id = $("#vacancy_id").val();
                        var funding_status = $("#exampleFormControlSelect2").val();
                        var job_status = $("#exampleFormControlSelect3").val();
                        var funding_source = $("#exampleFormControlSelect4").val();

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/editOIIPAssignment.php",
                            data: {vacancy_id: vacancy_id, funding_status: funding_status, job_status: job_status, funding_source: funding_source},
                            cache: false,
                            dataType: "JSON",
                            success: function (response) {
                                alert(response.result);
                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });
                        location.reload();
                    }
                })

            }); // end of document.ready

            function getUnassignedVacancies() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getUnallocatedVacancies.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            var company_id = response[i].company_id;
                            //Related to vacancies, put response[i] here

                            var country = response[i].country;
                            var vacancy_id = response[i].vacancy_id;
                            var internship_start_date = response[i].internship_start_date;
                            var internship_end_date = response[i].internship_end_date;
                            var allowance_currency = response[i].allowance_currency;
                            var company_mthly_allowance = response[i].company_mthly_allowance;
                            var accomodation_provided = response[i].accomdation_provided;
                            var job_role = response[i].job_role;
                            var air_ticket_provided = response[i].air_ticket_provided;
                            if (accomodation_provided == 1) {
                                accomodation_provided = "Have accomodation";
                            } else {
                                accomodation_provided = "Dont have accomodation";
                            }
                            if (air_ticket_provided == 1) {
                                air_ticket_provided = "have air ticket";
                            } else {
                                air_ticket_provided = "dont have air ticket";
                            }

                            // check if the company_id is in the array. If not inside, add it in.
                            for (var j = 0; j <= company_id_array.length; j++) {
                                var list_of_company_with_vacancies = "";
                                var list_of_vacancies = "";
                                if (company_id !== company_id_array[j]) {
                                    // If the array has checked the last index
                                    if (j === company_id_array.length - 1) {
                                        company_id_array.push(company_id);
                                        // Related to companies, put response[i] here
                                        var company_name = response[i].company_name
                                        var country = response[i].country;
                                        list_of_company_with_vacancies += "<li id='companyID_" + company_id + "' class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                                "<div class='d-flex w-100 justify-content-between'>" +
                                                "<h5 class='mb-1'>" + company_name + "</h5>" +
                                                "<small>Company ID: " + company_id + "</small>" +
                                                "</div>" +
                                                "<ul id='list_of_companies_with_vacancies_small_placeholder" + company_id + "' class='list-group'>" +
                                                // Need another for loop to loop various vacancies here
                                                "</ul>" +
                                                "<small>" + country + "</small>" +
                                                "</li>";
                                        $("#container_vacancies_students").append(list_of_company_with_vacancies);
                                    }
                                } else {
                                    break;
                                }
                            }
                            list_of_vacancies += "<li class='list-group-item justify-content-between align-items-center'>" +
                                    "<small style='font-weight: bold; color: red'>Unassigned Vacancy</small><br/>" +
                                    "<small>" + job_role + ", " + internship_start_date + " to " + internship_end_date + ", " + allowance_currency + " " + company_mthly_allowance + "<br/> " + accomodation_provided + ", " + air_ticket_provided + "</small>" +
                                    "<br/><a href='' data-toggle='modal' data-target='#modal_assign_student_vacancy'><span onclick='getVacancyAndCompanyRecordsAssign(" + vacancy_id + ")' class='badge badge-info'>Assign student to vacancy</span></a>" + "&nbsp;" +
                                    "</li>";
                            $("#list_of_companies_with_vacancies_small_placeholder" + company_id).append(list_of_vacancies);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }
            function getAssignedVacancies() {
                //var company_id_array = ["y"];
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getAllocatedVacanciesv2.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            var company_id = response[i].company_id;
                            //Related to vacancies, put response[i] here

                            var student_id = response[i].student_id;
                            var country = response[i].country;
                            var vacancy_id = response[i].vacancy_id;
                            var internship_start_date = response[i].internship_start_date;
                            var internship_end_date = response[i].internship_end_date;
                            var allowance_currency = response[i].allowance_currency;
                            var company_mthly_allowance = response[i].company_mthly_allowance;
                            var accomodation_provided = response[i].accomdation_provided;
                            var job_role = response[i].job_role;
                            var air_ticket_provided = response[i].air_ticket_provided;
                            if (accomodation_provided == 1) {
                                accomodation_provided = "Have accomodation";
                            } else {
                                accomodation_provided = "Dont have accomodation";
                            }
                            if (air_ticket_provided == 1) {
                                air_ticket_provided = "have air ticket";
                            } else {
                                air_ticket_provided = "dont have air ticket";
                            }
                            var student_name = response[i].name;
                            var student_diploma = response[i].diploma;
                            var gpa = response[i].gpa;
                            var tech_subj_score = response[i].tech_subj_score;
                            var mobile = response[i].mobile;
                            var cohort = response[i].cohort;
                            
                            var funding_status = response[i].funding_status;
                            var job_status = response[i].job_status;
                            var funding_source = response[i].funding_source;

                            // check if the company_id is in the array. If not inside, add it in.
                            for (var j = 0; j <= company_id_array.length; j++) {
                                var list_of_company_with_vacancies = "";
                                var list_of_vacancies = "";
                                if (company_id !== company_id_array[j]) {
                                    // If the array has checked the last index
                                    if (j === company_id_array.length - 1) {
                                        company_id_array.push(company_id);
                                        // Related to companies, put response[i] here
                                        var company_name = response[i].company_name
                                        var country = response[i].country;
                                        list_of_company_with_vacancies += "<li id='companyID_" + company_id + "' class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                                "<div class='d-flex w-100 justify-content-between'>" +
                                                "<h5 class='mb-1'>" + company_name + "</h5>" +
                                                "<small>Company ID: , " + company_id + "</small>" +
                                                "</div>" +
                                                "<ul id='list_of_companies_with_vacancies_small_placeholder" + company_id + "' class='list-group'>" +
                                                // Need another for loop to loop various vacancies here
                                                "</ul>" +
                                                "<small>" + country + "</small>" +
                                                "</li>";
                                        $("#container_vacancies_students").append(list_of_company_with_vacancies);
                                    }
                                } else {
                                    break;
                                }
                            }

                            var list_of_vacancies = "";
                            list_of_vacancies += "<li class='list-group-item justify-content-between align-items-center'>" +
                                    "<small style='font-weight: bold; color: limegreen'>Assigned Vacancy</small><br/>" +
                                    "<small>" + job_role + ", " + internship_start_date + " to " + internship_end_date + ", " + allowance_currency + " " + company_mthly_allowance + "<br/> " + accomodation_provided + ", " + air_ticket_provided + "</small>" +
                                    "<br/><small>Taken by " + student_name + ", " + student_diploma + ", " + gpa + ", " + tech_subj_score + ", " + mobile + ", " + cohort + "</small><br/>" +
                                    "<small>Funding status: " + funding_status + ", Job status: " + job_status + " Funding source: " + funding_source + "</small><br/>" +
                                    "<a href='#' data-toggle='modal' data-target='#modal_assign_student_vacancy'><span onclick='getVacancyAndCompanyRecordsAssign(" + vacancy_id + ")' class='badge badge-primary'>Reassign student to vacancy</span></a>" + "&nbsp;" +
                                    "<a href='#' data-toggle='modal' data-target='#modal_assign_student_vacancy'><span onclick='getOIIPAssignment(" + vacancy_id + "\, " + student_id + ")' class='badge badge-warning'>Update student assignment details</span></a>" + "&nbsp;" +
                                    "<a href='#'><span onclick='removeStudent(" + vacancy_id + ")' class='badge badge-secondary'>Remove student from vacancy</span></a>" +
                                    "</li>";
                            $("#list_of_companies_with_vacancies_small_placeholder" + company_id).append(list_of_vacancies);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            // this triggers when the "Update student assignment details" button is clicked
            function getOIIPAssignment(vacancy_id, student_id) {
                clearModal();
                crud_status = "update";
                $("#exampleFormControlSelect1").attr("disabled", true);
                getVacancyAndCompanyRecordsUpdate(vacancy_id);
                getAllStudentsWithAssignedVacancies();
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getOIIPAssignments.php",
                    data: {vacancy_id: vacancy_id, student_id: student_id},
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            $("#exampleFormControlSelect1").val(response[i].student_id);
                            $("#exampleFormControlSelect2").val(response[i].funding_status);
                            $("#exampleFormControlSelect3").val(response[i].job_status);
                            $("#exampleFormControlSelect4").val(response[i].funding_source);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });


            }

            // this triggers when the "Reassign/assign student to vacancy" button is clicked
            function getVacancyAndCompanyRecordsAssign(vacancy_id) {
                crud_status = "assign";
                clearModal();
                $("#exampleFormControlSelect1").attr("disabled", false);
                getAllStudentsWithoutAssignedVacancies();
                var accomodation_provided = "";
                var air_ticket_provided = "";
                $("#vacancy_id").val(vacancy_id);
                $("#modal_vacancy_desc").empty();
                $("#modal_vacancy_desc2").empty();
                $("#modal_vacancy_desc3").empty();
                $("#modal_vacancy_desc4").empty();
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getVacanciesAndCompaniesByVacancyId.php?vacancy_id=" + vacancy_id,
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        $("#exampleModalLongTitle").html("Assign student to a vacancy in " + response.company_name);
                        $("#modal_vacancy_desc").text("This vacancy is: " + response.job_role + " in " + response.country + ", allowance is " + response.allowance_currency + " " + response.company_mthly_allowance);
                        $("#modal_vacancy_desc2").text("The duration is from " + response.internship_start_date + " to " + response.internship_end_date);
                        if (response.accomodation_provided == 1) {
                            accomodation_provided = "Have accomodation";
                        } else {
                            accomodation_provided = "Dont have accomodation";
                        }
                        if (air_ticket_provided == 1) {
                            air_ticket_provided = "have air ticket";
                        } else {
                            air_ticket_provided = "dont have air ticket";
                        }
                        $("#modal_vacancy_desc3").text(accomodation_provided + ", " + air_ticket_provided);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            // this is to populate the dropdown list with students who has not been allocated any vacancies
            function getAllStudentsWithoutAssignedVacancies() {
                var list_of_students = "<option value=''></option>";
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudentsWithoutAllocation.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            if (response[i].iprep_status == "valid") {
                                list_of_students += "<option value='" + response[i].student_id + "'>" + response[i].name + "/" + response[i].diploma + "/" + response[i].student_id + "</option>";
//                                list_of_students += "<a href='#' class='dropdown-item' onclick='submitStudentToVacancy(" + response[i].student_id + ")'>" + response[i].name + "/" + response[i].diploma + "/" + response[i].student_id + "</a>";
                            } else {
//                                list_of_students += "<a href='#' class='dropdown-item disabled'>" + response[i].name + " (" + response[i].iprep_status + ")</a>";
                                list_of_students += "<option disabled>" + response[i].name + "/" + response[i].diploma + "/" + response[i].student_id + " (" + response[i].iprep_status + ")</option>";
                            }
                        }
                        $("#exampleFormControlSelect1").html(list_of_students);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            // this is to simply add description only via vacancy_id
            function getVacancyAndCompanyRecordsUpdate(vacancy_id) {
                getAllStudentsWithAssignedVacancies();
                var accomodation_provided = "";
                var air_ticket_provided = "";
                $("#vacancy_id").val(vacancy_id);
                $("#modal_vacancy_desc").empty();
                $("#modal_vacancy_desc2").empty();
                $("#modal_vacancy_desc3").empty();
                $("#modal_vacancy_desc4").empty();
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getVacanciesAndCompaniesByVacancyId.php?vacancy_id=" + vacancy_id,
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        $("#exampleModalLongTitle").html("Assign student to a vacancy in " + response.company_name);
                        $("#modal_vacancy_desc").text("This vacancy is: " + response.job_role + " in " + response.country + ", allowance is " + response.allowance_currency + " " + response.company_mthly_allowance);
                        $("#modal_vacancy_desc2").text("The duration is from " + response.internship_start_date + " to " + response.internship_end_date);
                        if (response.accomodation_provided == 1) {
                            accomodation_provided = "Have accomodation";
                        } else {
                            accomodation_provided = "Dont have accomodation";
                        }
                        if (air_ticket_provided == 1) {
                            air_ticket_provided = "have air ticket";
                        } else {
                            air_ticket_provided = "dont have air ticket";
                        }
                        $("#modal_vacancy_desc3").text(accomodation_provided + ", " + air_ticket_provided);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            // This is to populate the dropdown list with students with allocation to vacancies
            function getAllStudentsWithAssignedVacancies() {
                var list_of_students = "<option value=''></option>";
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getStudentsWithAllocation.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            if (response[i].iprep_status == "valid") {
                                list_of_students += "<option value='" + response[i].student_id + "'>" + response[i].name + "/" + response[i].diploma + "/" + response[i].student_id + "</option>";
//                                list_of_students += "<a href='#' class='dropdown-item' onclick='submitStudentToVacancy(" + response[i].student_id + ")'>" + response[i].name + "/" + response[i].diploma + "/" + response[i].student_id + "</a>";
                            } else {
//                                list_of_students += "<a href='#' class='dropdown-item disabled'>" + response[i].name + " (" + response[i].iprep_status + ")</a>";
                                list_of_students += "<option disabled>" + response[i].name + "/" + response[i].diploma + "/" + response[i].student_id + " (" + response[i].iprep_status + ")</option>";
                            }
                        }
                        $("#exampleFormControlSelect1").html(list_of_students);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }
            function removeStudent(vacancy_id) {
                if (confirm("Delete?")) {
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/iprep/webservices/deleteOIIPAssignment.php",
                        data: {vacancy_id: vacancy_id},
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            alert(response.result);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                }
                location.reload();
            }

            function clearModal() {
                $("#exampleFormControlSelect1").val("");
                $("#exampleFormControlSelect2").val("");
                $("#exampleFormControlSelect3").val("");
                $("#exampleFormControlSelect4").val("");
            }
        </script>
    </head>
    <body>
        <!--About OIIP-->
        <div class="container">
            <br/>
            <!--List of available companies in database-->
            <div class="alert alert-info" role="alert">List of  companies&nbsp;<a href="#collapse_id1" data-toggle="collapse"><span class="badge badge-info">Show/Hide</span></a>
                <br/><br/>
                <div class="collapse show" id="collapse_id1">

                    <!--filter navbar-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Filter:</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Month
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Janurary</a>
                                        <a class="dropdown-item" href="#">February</a>
                                        <a class="dropdown-item" href="#">March</a>
                                        <a class="dropdown-item" href="#">April</a>
                                        <a class="dropdown-item" href="#">May</a>
                                        <a class="dropdown-item" href="#">June</a>
                                        <a class="dropdown-item" href="#">July</a>
                                        <a class="dropdown-item" href="#">August</a>
                                        <a class="dropdown-item" href="#">September</a>
                                        <a class="dropdown-item" href="#">October</a>
                                        <a class="dropdown-item" href="#">November</a>
                                        <a class="dropdown-item" href="#">December</a>
                                    </div>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Year
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">2016</a>
                                        <a class="dropdown-item" href="#">2017</a>
                                        <a class="dropdown-item" href="#">2018</a>
                                        <a class="dropdown-item" href="#">2019</a>
                                        <a class="dropdown-item" href="#">2020</a>
                                        <a class="dropdown-item" href="#">2021</a>
                                        <a class="dropdown-item" href="#">2022</a>
                                        <a class="dropdown-item" href="#">2023</a>
                                        <a class="dropdown-item" href="#">2024</a>
                                        <a class="dropdown-item" href="#">2025</a>
                                        <a class="dropdown-item" href="#">2026</a>
                                        <a class="dropdown-item" href="#">2027</a>
                                        <a class="dropdown-item" href="#">2028</a>
                                        <a class="dropdown-item" href="#">2029</a>
                                        <a class="dropdown-item" href="#">2030</a>
                                        <a class="dropdown-item" href="#">2031</a>
                                        <a class="dropdown-item" href="#">2032</a>
                                        <a class="dropdown-item" href="#">2033</a>
                                        <a class="dropdown-item" href="#">2034</a>
                                        <a class="dropdown-item" href="#">2035</a>
                                        <a class="dropdown-item" href="#">2036</a>
                                        <a class="dropdown-item" href="#">2037</a>
                                        <a class="dropdown-item" href="#">2038</a>
                                        <a class="dropdown-item" href="#">2039</a>
                                        <a class="dropdown-item" href="#">2040</a>
                                        <a class="dropdown-item" href="#">2041</a>
                                        <a class="dropdown-item" href="#">2042</a>
                                        <a class="dropdown-item" href="#">2043</a>
                                        <a class="dropdown-item" href="#">2044</a>
                                        <a class="dropdown-item" href="#">2045</a>
                                        <a class="dropdown-item" href="#">2046</a>
                                        <a class="dropdown-item" href="#">2047</a>
                                        <a class="dropdown-item" href="#">2048</a>
                                        <a class="dropdown-item" href="#">2049</a>
                                        <a class="dropdown-item" href="#">2050</a>        
                                    </div>
                                </li>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Name or studentID" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <!--end of filter navbar-->
                    <br/>
                    <ul class="list-group" id="container_vacancies_students">

                    </ul>
                </div>
            </div>
        </div>

        <!--Modal for assigning student to Vacancies-->
        <div class="modal fade" id="modal_assign_student_vacancy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Assign Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_modal">
                            <small id='modal_vacancy_desc'></small>
                            <br/>
                            <small id="modal_vacancy_desc2"></small>
                            <br/>
                            <small id="modal_vacancy_desc3"></small>

                            <div class="form-group">
                                <label for="vacancy_id">Vacancy ID:</label>
                                <input type="text" disabled class="form-control" id="vacancy_id" aria-describedby="textHelp1" placeholder="">
                                <!--<small id="textHelp1" class="form-text text-muted">Applied, New, etc</small>-->
                            </div>

                            <div class='form-group'>
                                <label for='exampleFormControlSelect1'>Choose student:</label>
                                <select class='form-control' id='exampleFormControlSelect1'>
                                </select>
                            </div>

                            <div class='form-group'>
                                <label for='exampleFormControlSelect2'>Funding status:</label>
                                <select class='form-control' id='exampleFormControlSelect2'>
                                    <option value=""></option>
                                    <option value="Applied">Applied</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Claim requested">Claim requested</option>
                                    <option value="Claim paid">Claim paid</option>
                                    <option value="Claim reimbursed">Claim reimbursed</option>
                                </select>
                            </div>

                            <div class='form-group'>
                                <label for='exampleFormControlSelect3'>Job status:</label>
                                <select class='form-control' id='exampleFormControlSelect3'>
                                    <option value=""></option>
                                    <option value="New">New</option>
                                    <option value="Apply">Apply</option>
                                    <option value="Interview">Interview</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>

                                </select>
                            </div>

                            <div class='form-group'>
                                <label for='exampleFormControlSelect4'>Funding source:</label>
                                <select class='form-control' id='exampleFormControlSelect4'>
                                    <option></option>
                                    <option value="YTP">YTP</option>
                                    <option value="iPrep">iPrep</option>
                                    <option value="Self">Self</option>
                                </select>
                            </div>

                            <small id="modal_vacancy_desc4"></small>
                            <br/>
                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <small>There is a bug when clicking Update student assignment details doesnt work. Clicking it again will solve the issue</small>
    </body>
</html>
<!--                        <li class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">ABC Pte Ltd</h5>
                                <small>2 days</small>
                            </div>
                            <br/>
                            <ul class="list-group" id="container2">
                                <li class="list-group-item justify-content-between align-items-center">
                                    <div>Vacant</div>
                                    <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                    <br/><a href=""><span class="badge badge-success">Allocate Student</span></a>

                                </li>
                                <li class="list-group-item justify-content-between align-items-center">
                                    <div>Toh Kee Heng</div>
                                    <small>Hacker, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                    <br/><a href=""><span class="badge badge-warning">Change student</span></a>
                                    <a href=""><span class="badge badge-danger">Remove student</span></a>
                                </li>
                            </ul>
                            <br/>
                            <small>Tokuma, Nagano, Japan</small>
                        </li>-->

<!--                            // check if the company_id is in the array. If not inside, add it in.
//                            for (var j = 0; j <= company_id_array.length; j++) {
//                                var list_of_company_with_vacancies = "";
//                                var list_of_vacancies = "";
//                                if (company_id !== company_id_array[j]) {
//                                    // If the array has checked the last index
//                                    if (j === company_id_array.length - 1) {
//                                        company_id_array.push(company_id);
//                                        // Related to companies, put response[i] here
//                                        var company_name = response[i].company_name
//                                        var country = response[i].country;
//                                        list_of_company_with_vacancies += "<li class='list-group-item list-group-item-action flex-column align-items-start'>" +
//                                                "<div class='d-flex w-100 justify-content-between'>" +
//                                                "<h5 class='mb-1'>" + company_name + "</h5>" +
//                                                "<small>2 days, " + company_id + "</small>" +
//                                                "</div>" +
//                                                "<a href='' data-toggle='modal' data-target='#modal_add_new_vacancy'><span onclick='addNewVacancy(" + company_id + ")' class='badge badge-success'>Add vacancy</span></a>" +
//                                                "<br/><br/>" +
//                                                "<ul id='list_of_companies_with_vacancies_small_placeholder" + company_id + "' class='list-group'>" +
//                                                // Need another for loop to loop various vacancies here
//                                                "</ul>" +
//                                                "<br/>" +
//                                                "<small>" + country + "</small>" +
//                                                "</li>";
//                                        // $("#container_vacancies_students").append(list_of_company_with_vacancies);
//                                    }
//                                } else {
//                                    break;
//                                }
//                            }-->