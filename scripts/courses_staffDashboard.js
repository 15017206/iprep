/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    var printCourseDetails = "";
    $.ajax({
        type: "GET",
        url: "http://localhost/iprep/webservices/getCourses.php",
        cache: false,
        dataType: "JSON",
        success: function (response) {

            for (i = 0; i < response.length; i++) {
                printCourseDetails += "<a href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' class='list-group-item list-group-item-action flex-column align-items-start'>"
                        + "<div class='d-flex w-100 justify-content-between'>"
                        + "<h5 class='mb-1'>" + response[i].name +"</h5>"
                        + "<small>" + response[i].genre + "</small>"
                        + "</div>"
                        + " <div class='d-flex w-100'>"
                        + " <span class='badge badge-warning'>S$" + response[i].cost +"</span>"
                        + " </div>"
                        + "  <small>"+ response[i].course_provider +"</small>"
                        + " </a>";
                
                $("#courseDetails").html(printCourseDetails);
            }

        },
        error: function (obj, textStatus, errorThrown) {
            console.log("Error " + textStatus + ": " + errorThrown);
        }
    });

    //this portion of the code deals with insertion of course details into the database

    //will be called on submit
    $("#formAddNewCourse").submit(function (e) {


        if (!e.isDefaultPrevented()) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "http://localhost/iprep/webservices/doAddCourse.php",
                data: $("#formAddNewCourse").serialize(),
                cache: false,
                dataType: "JSON",
                success: function (data, textStatus)
                {

                    $('#courses_only_modal_add').modal('hide');
                    $('#formAddNewCourse')[0].reset();

                },
                error: function (obj, textStatus, errorThrown) {
                    console.log("Error " + textStatus + ": " + errorThrown);
                }

            });

        }

    });
});

