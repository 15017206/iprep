/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {

    var printCourseDetails = "";
    var name, genre, cost, provider, id, course;

    //reloads all data from db
    $.ajax({
        type: "GET",
        url: "http://localhost/iprep/webservices/getCourses.php",
        cache: false,
        dataType: "JSON",
        success: function (response) {

            for (i = 0; i < response.length; i++) {
                printCourseDetails += "<a href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' class='list-group-item list-group-item-action flex-column align-items-start'>"
                        + "<div class='d-flex w-100 justify-content-between'>"
                        + "<h5 class='mb-1'>" + response[i].name + "</h5>"
                        + "<small>" + response[i].genre + "</small>"
                        + "</div>"
                        + " <div class='d-flex w-100'>"
                        + " <span class='badge badge-warning'>S$" + response[i].cost + "</span>"
                        + " </div>"
                        + "  <small>" + response[i].course_provider + "</small>"
                        + "<input type='hidden' value='" + response[i].course_id + "' id='course" + response[i].course_id + "'/>"
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

    //retrieve course by id
    $("#courseDetails").on("click", "a", function (event) {
        event.preventDefault();
        var hiddenValue = $("[type='hidden']", this).val();

        $.ajax({
            type: "GET",
            url: "http://localhost/iprep/webservices/getCourseById.php",
            data: "id=" + hiddenValue,
            cache: false,
            dataType: "JSON",
            success: function (response) {
                $("#courses_only_modal_modify [name=course_name]").val(response.name);
                $("#courses_only_modal_modify [name=course_genre]").val(response.genre);
                $("#courses_only_modal_modify [name=course_cost]").val(response.cost);
                $("#courses_only_modal_modify [name=course_provider]").val(response.course_provider);
                $("#courses_only_modal_modify [name=course_id]").val(hiddenValue);

                name = response.name;
                genre = response.genre;
                cost = response.cost;
                provider = response.provider;
                id = hiddenValue;


                course = {"course_id": id,
                    "course_name": name,
                    "course_cost": cost,
                    "course_provider": provider,
                    "course_genre": genre
                };

                $("#formModifyCourse").submit(function (e) {


                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: "http://localhost/iprep/webservices/editCourse.php",
                            data: $("#formModifyCourse").serialize(),
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus)
                            {

                                $('#courses_only_modal_modify').modal('hide');
                                $('#formModifyCourse')[0].reset();

                                console.log(data);

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }

                        });

                    }

                });

            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        });


    });



});

