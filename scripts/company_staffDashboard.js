//to be added into graceyap_dashboard_company.php

var vacancy_type = "";
$(document).ready(function (e) {
    refreshCompanies();
    refreshVacancies();
    
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
    // To modify & delete vacancies in a company
    $("#form_modal_add_modify_vacancy").submit(function (e) {
        // If the person clicks on add vacancy            
        if (vacancy_type == "add") {
            var no_of_vacancies = $("#no_of_vacancies").val();
            alert(no_of_vacancies + " vacancies will be added");
            for (var i = 0; i < no_of_vacancies; i++) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/iprep/webservices/doAddVacancy.php",
                    data: $("#form_modal_add_modify_vacancy").serialize(),
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
            refreshCompanies();
        } else if (vacancy_type == "modify") { // else if the person clicks on modify vacancy
            alert("modify vacancy");
            var vacancy_id = $("#vacancy_id2").val();
            var company_id = $("#company_id2").val();
            var job_role = $("#job_role").val();
            var start_date = $("#startdate2").val();
            var end_date = $("#enddate2").val();
            var currency = $("#currency2").val();
            var amount = $("#amount2").val();
            var accomodation = "0";
            var air_ticket = "0";
            if (document.getElementById("accomodationCheckbox").checked === true) {
                accomodation = "1";
            } else {
                accomodation = "0";
            }
            if (document.getElementById("airticketCheckbox").checked === true) {
                air_ticket = "1";
            } else {
                air_ticket = "0";
            }
            alert(vacancy_id + company_id + job_role + start_date + end_date + currency + amount + accomodation + air_ticket);
            $.ajax({
                type: "POST",
                url: "http://localhost/iprep/webservices/editVacancy.php",
                data: {company_id: company_id, vacancy_id: vacancy_id, iip_start_date: start_date, iip_end_date: end_date, mthly_allowance: amount, currency: currency, role: job_role, accomodation_provided: accomodation, air_ticket_provided: air_ticket},
                cache: false,
                dataType: "JSON",
                success: function (response) {
                    alert("success");
                },
                error: function (obj, textStatus, errorThrown) {
                    console.log("Error " + textStatus + ": " + errorThrown);
                }
            });
            refreshCompanies();
        }
        e.preventDefault();
    });
    // When number of vacancies is changed in the input field - cosmetic
    $("#no_of_vacancies").change(function () {
        if ($("#no_of_vacancies").val() > 1) {
            $("#small_notification").html($("#no_of_vacancies").val() + " exact vacancies will be written to database.");
        } else {
            $("#small_notification").html($("#no_of_vacancies").val() + " exact vacancy will be written to database.");
        }
    });
    // To show all companies with vacancies
    // Code is meant to prevent repeating companies with 2 or more vacancies
    var company_id_array = ["x"];
    $.ajax({
        type: "GET",
        url: "http://localhost/iprep/webservices/getVacanciesv2.php",
        cache: false,
        dataType: "JSON",
        success: function (response) {
            for (var i = 0; i < response.length; i++) {
                var company_id = response[i].company_id;
                //Related to vacancies, put response[i] here
                var vacancy_id = response[i].vacancy_id;
                var job_role = response[i].job_role;
                var internship_start_date = response[i].internship_start_date;
                var internship_end_date = response[i].internship_end_date;
                var allowance_currency = response[i].allowance_currency;
                var company_mthly_allowance = response[i].company_mthly_allowance;
                var accomodation_provided = response[i].accomdation_provided;
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
                            list_of_company_with_vacancies += "<li class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                    "<div class='d-flex w-100 justify-content-between'>" +
                                    "<h5 class='mb-1'>" + company_name + "</h5>" +
                                    "<small>2 days, " + company_id + "</small>" +
                                    "</div>" +
                                    "<a href='' data-toggle='modal' data-target='#modal_add_new_vacancy'><span onclick='addNewVacancy(" + company_id + ")' class='badge badge-success'>Add vacancy</span></a>" +
                                    "<br/><br/>" +
                                    "<ul id='list_of_companies_with_vacancies_small_placeholder" + company_id + "' class='list-group'>" +
                                    // Need another for loop to loop various vacancies here
                                    "</ul>" +
                                    "<br/>" +
                                    "<small>" + country + "</small>" +
                                    "</li>";
                            $("#list_of_companies_with_vacancies_big_placeholder").append(list_of_company_with_vacancies);
                        }
                    } else {
                        break;
                    }
                }
                list_of_vacancies += "<li class='list-group-item justify-content-between align-items-center'>" +
                        "<small>" + job_role + ", " + internship_start_date + " to " + internship_end_date + ", " + allowance_currency + company_mthly_allowance + "<br/> " + accomodation_provided + ", " + air_ticket_provided + "</small>" +
                        "<br/><a href='' data-toggle='modal' data-target='#modal_add_new_vacancy'><span onclick='modifyVacancy(" + vacancy_id + ")' class='badge badge-warning'>Modify vacancy</span></a>" + "&nbsp;" +
                        "<a href=''><span onclick='deleteVacancy(" + vacancy_id + ")' class='badge badge-danger'>Remove vacancy</span></a>" +
                        "</li>";
                $("#list_of_companies_with_vacancies_small_placeholder" + company_id).append(list_of_vacancies);
            }
        },
        error: function (obj, textStatus, errorThrown) {
            console.log("Error " + textStatus + ": " + errorThrown);
        }
    });
}); // end of document.ready
// When the "add vacancy" button is pressed
function addNewVacancy(company_id) {
    $("#submit_add_vacancy").html("Add Vacancy");
    vacancy_type = "add";
    $("#company_id2").val(company_id);
    $("#small_notification_another").text("Company id: " + company_id);
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
function modifyVacancy(vacancy_id) {
    $("#submit_add_vacancy").html("Modify Vacancy");
    vacancy_type = "modify";
    $("#company_id2").val(vacancy_id);
    $.ajax({
        type: "GET",
        url: "http://localhost/iprep/webservices/getVacanciesById.php",
        data: "vacancy_id=" + vacancy_id,
        cache: false,
        dataType: "JSON",
        success: function (response) {
            for (var i = 0; i < response.length; i++) {
                $("#exampleModalLongTitle2").html("Modify Vacancy to " + response[i].company_name);
                $("#no_of_vacancies").prop('disabled', true);
                $("#small_notification_another").text("Vacancy id: " + vacancy_id);
                $("#vacancy_id2").val(vacancy_id);
                $("#company_id2").val(response[i].company_id);
                $("#job_role").val(response[i].job_role);
                $("#startdate2").val(response[i].internship_start_date);
                $("#enddate2").val(response[i].internship_end_date);
                $("#currency2").val(response[i].allowance_currency);
                $("#amount2").val(response[i].company_mthly_allowance);
                if (response[i].accomdation_provided == "1") {
                    $("#accomodationCheckbox").prop('checked', true);
                } else {
                    $("#accomodationCheckbox").prop('checked', false);
                }
                if (response[i].air_ticket_provided == "1") {
                    $("#airticketCheckbox").prop('checked', true);
                } else {
                    $("#airticketCheckbox").prop('checked', false);
                }
            }
        },
        error: function (obj, textStatus, errorThrown) {
            console.log("Error " + textStatus + ": " + errorThrown);
        }
    });
}
function deleteVacancy(vacancy_id) {
    var confirmation = confirm("Sure to delete?");
    if (confirmation) {
        $.ajax({
            type: "POST",
            url: "http://localhost/iprep/webservices/deleteVacancy.php",
            data: {vacancy_id: vacancy_id},
            cache: false,
            dataType: "JSON",
            success: function (data, textStatus) {
                alert("Ok, deleted");
            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
                alert("fail");
            }
        });
    }
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




function refreshVacancies(){
    // To show all companies with vacancies
    // To eliminate repeating companies with 2 or more vacancies
    var company_id_array = ["x"];
    $.ajax({
        type: "GET",
        url: "http://localhost/iprep/webservices/getVacanciesv2.php",
        cache: false,
        dataType: "JSON",
        success: function (response) {

            for (var i = 0; i < response.length; i++) {
                var company_id = response[i].company_id;

                //Related to vacancies, put response[i] here
                var vacancy_id = response[i].vacancy_id;
                var job_role = response[i].job_role;
                var internship_start_date = response[i].internship_start_date;
                var internship_end_date = response[i].internship_end_date;
                var allowance_currency = response[i].allowance_currency;
                var company_mthly_allowance = response[i].company_mthly_allowance;
                var accomodation_provided = response[i].accomdation_provided;
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

                            list_of_company_with_vacancies += "<li class='list-group-item list-group-item-action flex-column align-items-start'>" +
                                    "<div class='d-flex w-100 justify-content-between'>" +
                                    "<h5 class='mb-1'>" + company_name + "</h5>" +
                                    "<small>2 days, " + company_id + "</small>" +
                                    "</div>" +
                                    "<a href='' data-toggle='modal' data-target='#modal_add_new_vacancy'><span onclick='addNewVacancy(" + company_id + ")' class='badge badge-success'>Add vacancy</span></a>" +
                                    "<br/><br/>" +
                                    "<ul id='list_of_companies_with_vacancies_small_placeholder" + company_id + "' class='list-group'>" +
                                    // Need another for loop to loop various vacancies here
                                    "</ul>" +
                                    "<br/>" +
                                    "<small>" + country + "</small>" +
                                    "</li>";

                            $("#list_of_companies_with_vacancies_big_placeholder").append(list_of_company_with_vacancies);
                        }
                    } else {
                        break;
                    }
                }
                list_of_vacancies += "<li class='list-group-item justify-content-between align-items-center'>" +
                        "<small>" + job_role + ", " + internship_start_date + " to " + internship_end_date + ", " + allowance_currency + company_mthly_allowance + "<br/> " + accomodation_provided + ", " + air_ticket_provided + "</small>" +
                        "<br/><a href='' data-toggle='modal' data-target='#modal_add_new_vacancy'><span onclick='modifyVacancy(" + vacancy_id + ")' class='badge badge-warning'>Modify vacancy</span></a>" + "&nbsp;" +
                        "<a href=''><span onclick='deleteVacancy(" + vacancy_id + ")' class='badge badge-danger'>Remove vacancy</span></a>" +
                        "</li>";
                $("#list_of_companies_with_vacancies_small_placeholder" + company_id).append(list_of_vacancies);
            }
        },
        error: function (obj, textStatus, errorThrown) {
            console.log("Error " + textStatus + ": " + errorThrown);
        }
    });
}