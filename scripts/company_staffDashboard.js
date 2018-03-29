/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function (e) {
    setTimeout(function () {
        refreshCompanies();
    }, 1000);

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
    })

//    list_of_company_no_vacancies += "<li class='list-group-item justify-content-between'>" +
//            "ISIS School for terrorists" +
//            "<br/>" +
//            "<small>Small town in Syria</small>" +
//            "<br/>" +
//            "<a href=''><span class='badge badge-success'>Add vacancy</span></a>" +
//            "</li>";
//    for (var i = 0; i < 5; i++) {
//        $("#list_of_companies").append(list_of_company_no_vacancies);
//    }

    // When the checkbox state is changed
    if ($("#accomodationCheckbox").prop('checked') == true) {
        alert("true!");
    }

    // When submitting the form in a modal
    $("#form_modal_add_new_vacancy").submit(function (e) {
        var no_of_vacancies = $("#no_of_vacancies").val();

        for (var i = 0; i < no_of_vacancies; i++) {
            $.ajax({
                type: "POST",
                url: "http://localhost/iprep/webservices/doAddVacancy.php",
                data: $("#form_modal_add_new_vacancy").serialize(),
                cache: false,
                dataType: "JSONP",
                success: function (data, textStatus) {
                    alert(textStatus);
                    location.reload();
                    //$('#form1')[0].reset();

                },
                error: function (obj, textStatus, errorThrown) {
                    console.log("Error " + textStatus + ": " + errorThrown);
                    alert("fail" + textStatus + errorThrown);
                }
            });
        }

        alert(no_of_vacancies);
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

    // When submitting form - add vacancies
    $("#form_modal_add_new_vacancy").submit(function () {
        var noOfVacancies = $("#no_of_vacancies").val();

        $.ajax({
            type: "POST",
            url: "http://localhost/iprep/webservices/doAddVacancy.php",
            data: $("#form_modal_add_new_vacancy").serialize(),
            cache: false,
            dataType: "JSON",
            success: function (data, textStatus)
            {
                alert(data + textStatus);
//                $('#add_student')[0].reset();
//                setTimeout(function () {
//                    refreshStudents();
//                }, 1000);
                //$('#form1')[0].reset();

            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
                alert("fail");
            }

        });

    });

}); // end of document.ready

// This is added when the number of vacancies are changed in the input field
function vacanciesChange() {
    $("#void").empty();
    var bla = $("#no_of_vacancies").val();
    for (var i = 0; i < bla; i++) {
        $("#void").append("<div class='alert alert-warning' role='alert'>" +
                "<div class='form-group'>" +
                "<label for='exampleInputPassword1'>Vacancy " + (i + 1) + "</label>" +
                "<div class='input-group'>" +
                "<div class='input-group-prepend'>" +
                "<span class='input-group-text'>Job Role:</span>" +
                "</div>" +
                "<input type='text' name='job_role' class='form-control' id='jobrole" + (i + 1) + "' placeholder='eg. App Dev etc.' on>" +
                "</div>" +
                "</div>" +
                "<div class='form-group'>" +
                "<div class='input-group'>" +
                "<div class='input-group-prepend'>" +
                "<span class='input-group-text'>Start Date:</span>" +
                "</div>" +
                "<input type='date' name='internship_start_date' class='form-control' id='startdate" + (i + 1) + "' placeholder='' on>" +
                "</div>" +
                "</div>" +
                "<div class='form-group'>" +
                "<div class='input-group'>" +
                "<div class='input-group-prepend'>" +
                "<span class='input-group-text'>End Date:</span>" +
                "</div>" +
                "<input type='date' name='internship_end_date' class='form-control' id='enddate" + (i + 1) + "' placeholder='' on>" +
                "</div>" +
                "</div>" +
                "<div class='form-group'>" +
                "<div class='input-group'>" +
                "<div class='input-group-prepend'>" +
                "<span class='input-group-text' id=''>Currency & Amount</span>" +
                "</div>" +
                "<input type='text' name='allowance_currency' id='currency" + (i + 1) + "' class='form-control' placeholder='eg. SGD/MYR etc'>" +
                "<input type='number' name='company_mthly_allowance' id='amount" + (i + 1) + "' class='form-control' placeholder='eg. 45, 1200 etc'>" +
                "</div>" +
                "</div>" +
                "<div class='form-check form-group'>" +
                "<input class='form-check-input' name='accomodation_provided' type='checkbox' value='' id='accomodation_checkbox" + (i + 1) + "'>" +
                "<label class='form-check-label' for='accomodation_checkbox" + (i + 1) + "'>Accomodation provided</label>" +
                "</div>" +
                "<div class='form-check form-group'>" +
                "<input class='form-check-input' name='air_ticket_provided' type='checkbox' value='' id='airticket_checkbox" + (i + 1) + "'>" +
                "<label class='form-check-label' for='airticket_checkbox" + (i + 1) + "'>Air Ticket provided</label>" +
                "</div>" +
                "</div>");
    }
}

// When the "add vacancy" button is pressed
function addNewVacancy(company_id) {
    alert(company_id);
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