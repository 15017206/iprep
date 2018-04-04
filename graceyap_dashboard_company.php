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
            $(document).ready(function (e) {
                var company_id_array = [999];
                setTimeout(function () {
                    refreshCompanies();
                }, 1000);
                // When submitted to add a company
                $("#form_add_company").submit(function (e) {
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/doAddCompany.php",
                            data: $("#form_add_company").serialize(),
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus)
                            {
                                //$('#form1')[0].reset();
                                $("#oiip_add_company").modal('hide');
                                setTimeout(function () {
                                    refreshCompanies();
                                }, 1000);
                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                                alert("fail");
                            }
                        });
                    }
                });
                // When submitting the form in a modal
                $("#form_modal_add_new_vacancy").submit(function (e) {
                    var no_of_vacancies = $("#no_of_vacancies").val();
                    alert(no_of_vacancies + " vacancies will be added");
                    for (var i = 0; i < no_of_vacancies; i++) {
                        //doAjax();
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/doAddVacancy.php",
                            data: $("#form_modal_add_new_vacancy").serialize(),
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus) {
                                alert(textStatus);
                                //$('#form1')[0].reset();
                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });
                    }
                    e.preventDefault();
                });
                // When number of vacancies is changed in the input field
                $("#no_of_vacancies").change(function () {
                    if ($("#no_of_vacancies").val() > 1) {
                        $("#small_notification").html($("#no_of_vacancies").val() + " exact vacancies will be written to database.");
                    } else {
                        $("#small_notification").html($("#no_of_vacancies").val() + " exact vacancy will be written to database.");
                    }
                });
                var list_of_company_with_vacancies = "";
                // To show all companies with vacancies
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getVacanciesv2.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {

                        for (var i = 0; i < response.length; i++) {

                            var company_id = response[i].company_id;

                            // check if the company_id is in the array. If not inside, add it in.
                            for (var j = 0; j <= company_id_array.length; j++) {
                                alert(company_id + " " + j + " " + company_id_array[j] + " " + company_id_array.toString());
                                if (company_id !== company_id_array[j]) {

                                    // If the array has checked the last index
                                    if (j === company_id_array.length - 1) {
                                        company_id_array.push(company_id);
                                        alert(company_id_array.toString());
                                    }
                                } else {
                                    break;
                                }
                            }

                            var company_name = response[i].company_name;
                            var internship_start_date = response[i].internship_start_date;
                            var internship_end_date = response[i].internship_end_date;
                            var allowance_currency = response[i].allowance_currency;
                            var company_mthly_allowance = response[i].company_mthly_allowance;
                            var job_role = response[i].job_role;
                            var accomodation_provided = response[i].accomdation_provided;
                            var air_ticket_provided = response[i].air_ticket_provided;
                            var country = response[i].country;

                            // This is a list of company_ids. It should not appear more than once.

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

                            list_of_company_with_vacancies += "<li class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                    "<div class='d-flex w-100 justify-content-between'>" +
                                    "<h5 class='mb-1'>" + company_name + "</h5>" +
                                    "<small>2 days</small>" +
                                    "</div>" +
                                    "<a href='' data-toggle='modal' data-target='#modal_add_new_vacancy'><span onclick='addNewVacancy(" + company_id + ")' class='badge badge-success'>Add vacancy</span></a>" +
                                    "<br/><br/>" +
                                    "<ul id='list_of_companies_with_vacancies_small_placeholder' class='list-group'>" +
                                    // Need another for loop to loop various vacancies here
//                                    "<li class='list-group-item justify-content-between align-items-center'>" +
//                                    "<small>" + job_role + ", " + internship_start_date + " to " + internship_end_date + ", " + allowance_currency + company_mthly_allowance + "<br/> " + accomodation_provided + ", " + air_ticket_provided + "</small>" +
//                                    "<br/><a href=''><span class='badge badge-warning'>Modify vacancy</span></a>" + "&nbsp;" +
//                                    "<a href=''><span class='badge badge-danger'>Remove vacancy</span></a>" +
//                                    "</li>" +
                                    "</ul>" +
                                    "<br/>" +
                                    "<small>" + country + "</small>" +
                                    "</li>";
                        }
                        $("#list_of_companies_with_vacancies_big_placeholder").html(list_of_company_with_vacancies);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }); // end of document.ready

            // When the "add vacancy" button is pressed
            function addNewVacancy(company_id) {
                $("#company_id2").val(company_id);
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getCompanyById.php",
                    data: "company_id=" + company_id,
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        for (var i = 0; i < response.length; i++) {
                            $("#exampleModalLongTitle2").html("Add Vacancy to " + response[i].company_name);
                        }
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
            }

            // This is a function to refresh all companies
            function refreshCompanies() {
                var list_of_company_no_vacancies = "";
                $.ajax({
                    type: "GET",
                    url: "http://localhost/iprep/webservices/getCompanies.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {

                        for (var i = 0; i < response.length; i++) {
                            var company_name = response[i].company_name;
                            var company_id = response[i].company_id;
                            var concat = company_id + company_name;
                            list_of_company_no_vacancies += "<li class='list-group-item justify-content-between'>" +
                                    response[i].company_name +
                                    "<br/>" +
                                    "<small>" + response[i].country + ", company id: " + response[i].company_id + "</small>" +
                                    "<br/>" +
                                    "<a href='' data-toggle='modal' data-target='#modal_add_new_vacancy'><span onclick='addNewVacancy(" + company_id + ")' id='" + response[i].company_id + "_addvacancy' class='badge badge-success'>Add vacancy</span></a>" +
                                    "</li>";
                        }
                        $("#list_of_companies").html(list_of_company_no_vacancies);
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
        <!--Button to add new company to OIIP-->
        <form class="" method="" action="">

            <div class="form-group">
                <div class="container">
                    <button type="button" data-toggle="modal" data-target="#oiip_add_company" class="btn btn-block btn-success">Add New Company</button>
                </div>
            </div>
        </form>
        <!--About OIIP-->
        <div class="container">
            <div class="alert alert-warning" role="alert">
                <p>Companies with Vacancies</p>
                <ul class='list-group' id='list_of_companies_with_vacancies_big_placeholder'>
                    <li class='list-group-item list-group-item-action flex-column align-items-start'>
                        <div class='d-flex w-100 justify-content-between'>
                            <h5 class='mb-1'>Nagano Kosen</h5>
                            <small>2 days</small>
                        </div>
                        <a href=''><span class='badge badge-success'>Add vacancy</span></a>
                        <br/><br/>
                        <ul id='list_of_companies_with_vacancies_small_placeholder' class='list-group'>
                            <li class='list-group-item justify-content-between align-items-center'>
                                <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                <br/><a href=''><span class='badge badge-warning'>Modify</span></a>
                                <a href=''><span class='badge badge-danger'>Remove</span></a>
                            </li>
                        </ul>
                        <br/>
                        <small>Tokuma, Nagano, Japan</small>
                    </li>
                </ul>
            </div>

            <!--Green alert box-->
            <div class="alert alert-success" role="alert">
                <p>Companies currently residing in DB</p>
                <ul id="list_of_companies" class="list-group">
                </ul>
            </div>

        </div>
        <!--Modal for choosing available company-->
        <div class="modal fade" id="oiip_available_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modify Company Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body form">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="eg. NEC Ltd">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Country</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="eg. Zimbabwe, Syria etc">
                            </div>

                            <div class='alert alert-warning' role='alert'>
                                <div class='form-group'>
                                    <label for='exampleInputPassword1'>Vacancy 1</label>

                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Job Role:</span>
                                        </div>
                                        <input type='text' class='form-control' id='jobrole' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Start Date:</span>
                                        </div>
                                        <input type='date' class='form-control' id='startdate' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>End Date:</span>
                                        </div>
                                        <input type='date' class='form-control' id='enddate' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id=''>Currency & Amount</span>
                                        </div>
                                        <input type='text' id='currency' class='form-control' placeholder='eg. SGD/MYR etc'>
                                        <input type='number' id='amount' class='form-control' placeholder='eg. 45, 1200 etc'>
                                    </div>
                                </div>

                                <div class='form-check form-group'>
                                    <input class='form-check-input' type='checkbox' value='' id='accomodation_checkbox'>
                                    <label class='form-check-label' for='accomodation_checkbox'>Accomodation provided</label>
                                </div>

                                <div class='form-check form-group'>
                                    <input class='form-check-input' type='checkbox' value='' id='airticket_checkbox'>
                                    <label class='form-check-label' for='airticket_checkbox'>Air Ticket provided</label>
                                </div>
                            </div>

                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div> 
                </div>
            </div>
        </div>

        <!--Modal for adding new company-->
        <div class="modal fade" id="oiip_add_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body form">
                        <form id="form_add_company" method="" action="">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" aria-describedby="emailHelp" placeholder="eg. NEC Ltd">

                            </div>

                            <div class="form-group">
                                <?php include 'allCountriesDropdown.html' ?>
                            </div>


                            <!--For vacancies. Unused-->
                            <!--                            <div class="form-group">
                                                            <label for="no_of_vacancies">Number of Vacancies</label>
                                                            <input type="number" class="form-control" id="no_of_vacancies" placeholder="eg. 1,2,3 etc" onchange="vacanciesChange()">
                                                        </div>
                            
                                                        <div class="form-check form-group">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">All Applicants same data as Vacancy 1</label>
                                                        </div>-->




                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <button type="submit" id="submit_add_company" class="btn btn-primary">Save changes</button>

                        </form>
                    </div> 
                </div>
            </div>
        </div>

        <!--Modal for adding new vacancy to company-->
        <div class="modal fade" id="modal_add_new_vacancy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="form_modal_add_new_vacancy" action="" method="">
                        <div class="modal-header">
                            <input id="company_id2" type="hidden" value="1" name="company_id">
                            <h5 class="modal-title" id="exampleModalLongTitle2">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="no_of_vacancies">Number of Vacancies</label>
                                <input type="number" class="form-control" id="no_of_vacancies" placeholder="eg. 1,2,3 etc" onchange="">
                                <small id="small_notification">Vacancies will be the same</small>
                            </div>

                            <!--This is the alert to add vacancies-->
                            <div class='alert alert-warning' role='alert'> 
                                <div class='form-group'> 
                                    <div class='input-group'> 
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Job Role:</span> 
                                        </div> 
                                        <input type='text' class='form-control' name="job_role" id='job_role' placeholder='eg. App Dev etc.' on> 
                                    </div> 
                                </div> 
                                <div class='form-group'> 
                                    <div class='input-group'> 
                                        <div class='input-group-prepend'> 
                                            <span class='input-group-text'>Start Date:</span> 
                                        </div> 
                                        <input type='date' class='form-control' name="internship_start_date" id='startdate2' placeholder='eg. App Dev etc.' on> 
                                    </div> 
                                </div> 
                                <div class='form-group'> 
                                    <div class='input-group'> 
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>End Date:</span> 
                                        </div> 
                                        <input type='date' class='form-control' name="internship_end_date" id='enddate2' placeholder='eg. App Dev etc.' on> 
                                    </div> 
                                </div> 
                                <div class='form-group'> 
                                    <div class='input-group'> 
                                        <div class='input-group-prepend'> 
                                            <span class='input-group-text' id=''>Curr. & Amt:</span> 
                                        </div> 
                                        <input type='text' id='currency2' name="allowance_currency" class='form-control' placeholder='eg. SGD/MYR'> 
                                        <input type='number' id='amount2' name="company_mthly_allowance" class='form-control' placeholder='eg. 45, 1200'> 
                                    </div> 
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="accomodation_provided" value="1" id="accomodationCheckbox">
                                    <label class="form-check-label" for="accomodationCheckbox">
                                        Accomodation provided?
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="air_ticket_provided" value="1" id="airticketCheckbox">
                                    <label class="form-check-label" for="airticketCheckbox">
                                        Air ticket provided?
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="void"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit_add_vacancy" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Some unused code-->


    </body>
</html>

<!--Some unused code-->
<!--        <div class='alert alert-warning' role='alert'> 
            <div class='form-group'> 
                <label for='exampleInputPassword1'>Vacancy " + (i + 1) + "</label> 
                <div class='input-group'> 
                    <div class='input-group-prepend'>" 
                        <span class='input-group-text'>Job Role:</span> 
                    </div> 
                    <input type='text' class='form-control' id='jobrole" + (i + 1) + "' placeholder='eg. App Dev etc.' on> 
                </div> 
            </div> 
            <div class='form-group'> 
                <div class='input-group'> 
                    <div class='input-group-prepend'> 
                        <span class='input-group-text'>Start Date:</span> 
                    </div> 
                    <input type='date' class='form-control' id='startdate" + (i + 1) + "' placeholder='eg. App Dev etc.' on> 
                </div> 
            </div> 
            <div class='form-group'> 
                <div class='input-group'> 
                    <div class='input-group-prepend'>
                        <span class='input-group-text'>End Date:</span> 
                    </div> 
                    <input type='date' class='form-control' id='enddate" + (i + 1) + "' placeholder='eg. App Dev etc.' on> 
                </div> 
            </div> 
            <div class='form-group'> 
                <div class='input-group'> 
                    <div class='input-group-prepend'> 
                        <span class='input-group-text' id=''>Currency & Amount</span> 
                    </div> 
                    <input type='text' id='currency" + (i + 1) + "' class='form-control' placeholder='eg. SGD/MYR etc'> 
                    <input type='number' id='amount" + (i + 1) + "' class='form-control' placeholder='eg. 45, 1200 etc'> 
                </div> 
            </div> 
            <div class='form-check form-group'> 
                <input class='form-check-input' type='checkbox' value='' id='accomodation_checkbox" + (i + 1) + "'> 
                <label class='form-check-label' for='accomodation_checkbox" + (i + 1) + "'>Accomodation provided</label> 
            </div> 
            <div class='form-check form-group'> 
                <input class='form-check-input' type='checkbox' value='' id='airticket_checkbox" + (i + 1) + "'> 
                <label class='form-check-label' for='airticket_checkbox" + (i + 1) + "'>Air Ticket provided</label> 
            </div>
        </div>
========================================================
<!--Template for multiple vacancies Start-->
<!--                            <div class='alert alert-warning' role='alert'>
                                <div class='form-group'>
                                    <label for='exampleInputPassword1'>Vacancy 1</label>

                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Job Role:</span>
                                        </div>
                                        <input type='text' class='form-control' id='jobrole' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Start Date:</span>
                                        </div>
                                        <input type='date' class='form-control' id='startdate' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>End Date:</span>
                                        </div>
                                        <input type='date' class='form-control' id='enddate' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id=''>Currency & Amount</span>
                                        </div>
                                        <input type='text' id='currency' class='form-control' placeholder='eg. SGD/MYR etc'>
                                        <input type='number' id='amount' class='form-control' placeholder='eg. 45, 1200 etc'>
                                    </div>
                                </div>

                                <div class='form-check form-group'>
                                    <input class='form-check-input' type='checkbox' value='' id='accomodation_checkbox'>
                                    <label class='form-check-label' for='accomodation_checkbox'>Accomodation provided</label>
                                </div>

                                <div class='form-check form-group'>
                                    <input class='form-check-input' type='checkbox' value='' id='airticket_checkbox'>
                                    <label class='form-check-label' for='airticket_checkbox'>Air Ticket provided</label>
                                </div>
                            </div>-->
<!--Template End-->
<!--=========================================-->

<!--// This is added when the number of vacancies are changed in the input field-->
<!--//            function vacanciesChange() {
//                $("#void").empty();
//                var bla = $("#no_of_vacancies").val();
//                for (var i = 0; i < bla; i++) {
//                    $("#void").append("<div class='alert alert-warning' role='alert'>" +
//                            "<div class='form-group'>" +
//                            "<label for='exampleInputPassword1'>Vacancy " + (i + 1) + "</label>" +
//                            "<div class='input-group'>" +
//                            "<div class='input-group-prepend'>" +
//                            "<span class='input-group-text'>Job Role:</span>" +
//                            "</div>" +
//                            "<input type='text' name='job_role' class='form-control' id='jobrole" + (i + 1) + "' placeholder='eg. App Dev etc.' on>" +
//                            "</div>" +
//                            "</div>" +
//                            "<div class='form-group'>" +
//                            "<div class='input-group'>" +
//                            "<div class='input-group-prepend'>" +
//                            "<span class='input-group-text'>Start Date:</span>" +
//                            "</div>" +
//                            "<input type='date' name='internship_start_date' class='form-control' id='startdate" + (i + 1) + "' placeholder='' on>" +
//                            "</div>" +
//                            "</div>" +
//                            "<div class='form-group'>" +
//                            "<div class='input-group'>" +
//                            "<div class='input-group-prepend'>" +
//                            "<span class='input-group-text'>End Date:</span>" +
//                            "</div>" +
//                            "<input type='date' name='internship_end_date' class='form-control' id='enddate" + (i + 1) + "' placeholder='' on>" +
//                            "</div>" +
//                            "</div>" +
//                            "<div class='form-group'>" +
//                            "<div class='input-group'>" +
//                            "<div class='input-group-prepend'>" +
//                            "<span class='input-group-text' id=''>Currency & Amount</span>" +
//                            "</div>" +
//                            "<input type='text' name='allowance_currency' id='currency" + (i + 1) + "' class='form-control' placeholder='eg. SGD/MYR etc'>" +
//                            "<input type='number' name='company_mthly_allowance' id='amount" + (i + 1) + "' class='form-control' placeholder='eg. 45, 1200 etc'>" +
//                            "</div>" +
//                            "</div>" +
//                            "<div class='form-check form-group'>" +
//                            "<input class='form-check-input' name='accomodation_provided' type='checkbox' value='' id='accomodation_checkbox" + (i + 1) + "'>" +
//                            "<label class='form-check-label' for='accomodation_checkbox" + (i + 1) + "'>Accomodation provided</label>" +
//                            "</div>" +
//                            "<div class='form-check form-group'>" +
//                            "<input class='form-check-input' name='air_ticket_provided' type='checkbox' value='' id='airticket_checkbox" + (i + 1) + "'>" +
//                            "<label class='form-check-label' for='airticket_checkbox" + (i + 1) + "'>Air Ticket provided</label>" +
//                            "</div>" +
//                            "</div>");
//                }
//            }-->

<!--Sample listed companies-->
<!--                <div class="list-group">
    <a href="#" data-toggle="modal" data-target="#oiip_available_company" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Nagano Kosen</h5>
            <small>Nagano, Nagano, Japan</small>
        </div>
        <small>IT Developer, 1 Jan 2011 to 5 Dec 2017, SGD 1200, accomodation provided, air ticket provided</small><br/>
        <small>IT Developer, 1 Jan 2011 to 5 Dec 2017, SGD 1200, accomodation provided, air ticket provided</small><br/>
        <small>IT Developer, 1 Jan 2011 to 5 Dec 2017, SGD 1200, accomodation provided, air ticket provided</small><br/>
    </a>
</div>-->