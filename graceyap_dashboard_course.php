<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <?php
        include 'scripts.php';
        include 'navbar_staff.php';
        ?>
        <script>
            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */
            $(document).ready(function () {
                refreshCourses();

                genre = "";
                $("#course_dropdown a").on('click', function () {
                    selected = $(this).text();
                    if (selected != "All") {
                        $("#filterCourse").val("");
                        genre = selected;
                        var printCourseDetails = "";
                        $.ajax({
                            type: "GET",
                            url: "webservices/getCourseByGenre.php",
                            data: "genre=" + genre,
                            cache: false,
                            dataType: "JSON",
                            success: function (response) {
                                if (response.length > 0) {
                                    for (i = 0; i < response.length; i++) {
                                        printCourseDetails += "<a href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' data-id='" + response[i].course_id + "' class='list-group-item list-group-item-action flex-column align-items-start'>"
                                                + "<div class='d-flex w-100 justify-content-between'>"
                                                + "<h5 class='mb-1'>" + response[i].course_name + "</h5>"
                                                + "<small>" + response[i].course_genre + "</small>"
                                                + "</div>"
                                                + " <div class='d-flex w-100'>"
                                                + " <span class='badge badge-warning'>S$" + response[i].course_cost + "</span>"
                                                + "<input type='hidden' value='" + response[i].course_id + "' id='course" + response[i].course_id + "'/>"
                                                + " </div>"
                                                + "  <small>" + response[i].course_provider + "</small>"
                                                + " </a>";


                                    }

                                } else {
                                    printCourseDetails += "<a class='list-group-item'>No courses found</a>";

                                }
                                $("#courseDetails").html(printCourseDetails);
                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                        });

                    } else {
                        $("#filterCourse").val("");
                        refreshCourses();
                    }


                });

                $("#filterCourse").keyup(function () {
                    var course = $("#filterCourse").val();
                    var printCourseDetails = "";
                    $.ajax({
                        type: "GET",
                        url: "webservices/getCoursesByName&Genre.php",
                        data: "name=" + course + "&genre=" + genre,
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            if (response.length > 0) {
                                for (i = 0; i < response.length; i++) {
                                    printCourseDetails += "<a href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' data-id='" + response[i].course_id + "' class='list-group-item list-group-item-action flex-column align-items-start'>"
                                            + "<div class='d-flex w-100 justify-content-between'>"
                                            + "<h5 class='mb-1'>" + response[i].course_name + "</h5>"
                                            + "<small>" + response[i].course_genre + "</small>"
                                            + "</div>"
                                            + " <div class='d-flex w-100'>"
                                            + " <span class='badge badge-warning'>S$" + response[i].course_cost + "</span>"
                                            + "<input type='hidden' value='" + response[i].course_id + "' id='course" + response[i].course_id + "'/>"
                                            + " </div>"
                                            + "  <small>" + response[i].course_provider + "</small>"
                                            + " </a>";
                                }

                            } else {
                                printCourseDetails += "<a class='list-group-item'>No courses found</a>";

                            }
                            $("#courseDetails").html(printCourseDetails);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                });


                //this portion of the code deals with insertion of course details into the database

                //will be called on submit
                $("#formAddNewCourse").submit(function (e) {


                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: "webservices/doAddCourse.php",
                            data: {name: $('#name').val(),genre: $('#exampleFormControlSelect1').val(), cost:$('#cost').val(), provider: $('#course_provider').val() },
//                            data: $("#formAddNewCourse").serialize(),
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus)
                            {

                                $('#courses_only_modal_add').modal('hide');
                                $('#formAddNewCourse')[0].reset();
                                console.log("data: " + data);
                                console.log("textStatus: " + textStatus);
                                setTimeout(function () {
                                    refreshCourses();
                                }, 1000);

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }

                        });

                    }

                });

                //modify course
                $("#courses_only_modal_modify").on("show.bs.modal", function (e) {
                    var clicked = $(e.relatedTarget);

                    var courseId = clicked.data('id');
                    var modal = $(this);

                    $.ajax({
                        type: "GET",
                        url: "webservices/getCourseByCourseId.php",
                        data: "id=" + courseId,
                        cache: false,
                        dataType: "JSON",
                        success: function (data, textStatus)
                        {
                            console.log(data[0].name);
                            console.log(data[0].genre);
                            modal.find('#nameModify').val(data[0].course_name);
                            modal.find('#genreModify').val(data[0].course_genre);
                            modal.find('#costModify').val(data[0].course_cost);
                            modal.find('#providerModify').val(data[0].course_provider);
                            modal.find('#idModify').val(data[0].course_id);
                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }

                    });


                });


                $("#courses_only_modal_modify").submit(function (e) {
                    var modal = $("#courses_only_modal_modify");
                    var id = modal.find('#idModify').val();
                    var name = modal.find('#nameModify').val();
                    var genre = modal.find('#genreModify').val();
                    var cost = modal.find('#costModify').val();
                    var provider = modal.find('#providerModify').val();

                    var data = {course_id: id, course_name: name, course_genre: genre, course_cost: cost, course_provider: provider};
                    console.log(data);
                    if (!e.isDefaultPrevented()) {
                        e.preventDefault();

                        $.ajax({
                            type: "POST",
                            url: "/webservices/editCourse.php",
                            data: data,
                            cache: false,
                            dataType: "JSON",
                            success: function (data, textStatus)
                            {

                                $('#courses_only_modal_modify').modal('hide');
                                console.log(data["result"]);
                                console.log("textStatus: " + textStatus);
                                setTimeout(function () {
                                    refreshCourses();
                                }, 1000);

                            },
                            error: function (obj, textStatus, errorThrown) {
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }

                        });

                    }



                });

                function refreshCourses() {
                    var printCourseDetails = "";
                    $.ajax({
                        type: "GET",
                        url: "/webservices/getCourses.php",
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            if (response.length > 0) {
                                for (i = 0; i < response.length; i++) {
                                    printCourseDetails += "<a href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' data-id='" + response[i].course_id + "' class='list-group-item list-group-item-action flex-column align-items-start'>"
                                            + "<div class='d-flex w-100 justify-content-between'>"
                                            + "<h5 class='mb-1'>" + response[i].course_name + "</h5>"
                                            + "<small>" + response[i].course_genre + "</small>"
                                            + "</div>"
                                            + " <div class='d-flex w-100'>"
                                            + " <span class='badge badge-warning'>S$" + response[i].course_cost + "</span>"
                                            + "<input type='hidden' value='" + response[i].course_id + "' id='course" + response[i].course_id + "'/>"
                                            + " </div>"
                                            + "  <small>" + response[i].course_provider + "</small>"
                                            + " </a>";


                                }

                            } else {
                                printCourseDetails += "<a class='list-group-item'>No courses found</a>";

                            }

                            $("#courseDetails").html(printCourseDetails);

                        },
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }
                    });
                }
            });
        </script>


    </head>
    <body>
        <!--About courses-->
        <div class="container">
            <br/>

            <div class="form-group">
                <div class="container">
                    <button type="button" data-toggle="modal" data-target="#courses_only_modal_add" class="btn btn-block btn-danger">Add New Courses</button>
                </div>
            </div>

            <div class="alert alert-info" role="alert">List of available courses:
                <br><br>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Filter:</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown" id="genreDropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Genres
                                </a>
                                <div class="dropdown-menu" id="course_dropdown" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">All</a>
                                    <a class="dropdown-item" href="#">Programming</a>
                                    <a class="dropdown-item" href="#">IT Security</a>
                                    <a class="dropdown-item" href="#">Computer Science</a>
                                    <a class="dropdown-item" href="#">Mechanical Engineering</a>
                                    <a class="dropdown-item" href="#">Internet of Things</a>
                                    <a class="dropdown-item" href="#">Cognitive Technology</a>
                                    <a class="dropdown-item" href="#">Data Analytics</a>
                                    <a class="dropdown-item" href="#">Tech Support</a> 
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" id="filterCourse" placeholder="Course Name" aria-label="Search">

                        </form>
                    </div>
                </nav>
                <br/>
                <!--Add some courses here-->
                <div class="list-group" id="courseDetails">
                </div>
            </div>



            <!--Modal for adding courses-->
            <div class="modal fade" id="courses_only_modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add new courses</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formAddNewCourse" method="post" action="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name of new course:</label>
                                    <input type="text" id="name" class="form-control" placeholder="eg. Introduction to IoT" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Course Genre:</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="genre">
                                        <option>Programming</option>
                                        <option>IT Security</option>
                                        <option>Computer Science</option>
                                        <option>Mechanical Engineering</option>
                                        <option>Internet of Things</option>
                                        <option>Cognitive Technology</option>
                                        <option>Data Analytics</option>
                                        <option>Tech Support</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Cost:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">S$</span>
                                        </div>
                                        <input type="number" id="cost" class="form-control" placeholder="Please put in SGD, eg. SGD$0.06" name="cost" step="0.01" min="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Course Provider:</label>
                                    <input type="text" class="form-control" id="course_provider" placeholder="eg. Coursera, Codeacademy" name="provider">
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save Changes"/>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <!--Modal for editing/modifying existing course-->
            <div class="modal fade" id="courses_only_modal_modify" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modify existing courses</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formModifyCourse" method="post" action="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name of course:</label>
                                    <input type="text" class="form-control" required id="nameModify" placeholder="eg. Introduction to IoT" name="course_name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Course Genre:</label>
                                    <select class="form-control" name="course_genre" id="genreModify">
                                        <option value="Programming">Programming</option>
                                        <option value="IT Security">IT Security</option>
                                        <option value="Internet of Things">Internet of Things</option>
                                        <option value="Cognitive Technology">Cognitive Technology</option>
                                        <option value="Data Analytics">Data Analytics</option>
                                        <option value="Tech Support">Tech Support</option> 
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Mechanical Engineering">Mechanical Engineering</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Cost:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">S$</span>
                                        </div>
                                        <input type="number" class="form-control" name="course_cost" id="costModify" placeholder="Please put in SGD, eg. SGD$0.06">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Course Provider:</label>
                                    <input type="text" class="form-control" name="course_provider" id="providerModify" placeholder="eg. Coursera, Codeacademy">
                                </div>
                                <input type="hidden" name="course_id" id="idModify">
                            </div> 
                            <div class="modal-footer">
                                <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">Delete Course</button>-->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
