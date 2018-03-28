/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {



    var list_of_company_no_vacancies = "";
    $.ajax({
        type: "GET",
        url: "http://localhost/iprep/webservices/getCompanies.php",
        cache: false,
        dataType: "JSON",
        success: function (response) {

            for (var i = 0; i < response.length; i++) {
                list_of_company_no_vacancies += "<li class='list-group-item justify-content-between'>" +
                        response[i].company_name +
                        "<br/>" +
                        "<small>" + response[i].country + ", company id: " + response[i].company_id + "</small>" +
                        "<br/>" +
                        "<a href=''><span id='" + response[i].company_id + "_addvacancy'  onclick='addNewVacancy(" + response[i].company_id + ")' class='badge badge-success'>Add vacancy</span></a>" +
                        "</li>";

                $("#list_of_companies_no_vacancy").html(list_of_company_no_vacancies);
            }

        },
        error: function (obj, textStatus, errorThrown) {
            console.log("Error " + textStatus + ": " + errorThrown);
        }
    });



//    list_of_company_no_vacancies += "<li class='list-group-item justify-content-between'>" +
//            "ISIS School for terrorists" +
//            "<br/>" +
//            "<small>Small town in Syria</small>" +
//            "<br/>" +
//            "<a href=''><span class='badge badge-success'>Add vacancy</span></a>" +
//            "</li>";
//    for (var i = 0; i < 5; i++) {
//        $("#list_of_companies_no_vacancy").append(list_of_company_no_vacancies);
//    }

});

function addNewVacancy(company_id) {
//    alert(company_id);
$('#modal_add_new_vacancy').modal();
}