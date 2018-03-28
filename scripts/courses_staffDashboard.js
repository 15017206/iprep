/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    refreshCourses();
    

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
                    console.log("data: " + data);
                    console.log("textStatus: " +textStatus);
                    setTimeout(function(){
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
                url: "http://localhost/iprep/webservices/getCourseById.php",
                data: "id="+courseId,
                cache: false,
                dataType: "JSON",
                success: function (data, textStatus)
                {
                     console.log(data[0].name);
                     console.log(data[0].genre);
                     modal.find('#nameModify').val(data[0].name);
                     modal.find('#genreModify').val(data[0].genre                           );
                     modal.find('#costModify').val(data[0].cost);
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
        
        var data = {course_id:id,course_name:name,course_genre:genre,course_cost:cost,course_provider:provider};
        console.log(data);        
         if (!e.isDefaultPrevented()) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "http://localhost/iprep/webservices/editCourse.php",
                data: data,
                cache: false,
                dataType: "JSON",
                success: function (data, textStatus)
                {

                    $('#courses_only_modal_modify').modal('hide'); 
                    console.log(data["result"]);
                    console.log("textStatus: " +textStatus); 
                    setTimeout(function(){
                        refreshCourses();
                    }, 1000);

                },
                error: function (obj, textStatus, errorThrown) {
                    console.log("Error " + textStatus + ": " + errorThrown);
                }

            });

        }
         
        

    });
    
    function refreshCourses(){ 
        var printCourseDetails = ""; 
        $.ajax({
            type: "GET",
            url: "http://localhost/iprep/webservices/getCourses.php",
            cache: false,
            dataType: "JSON",
            success: function (response) {

                for (i = 0; i < response.length; i++) {
                    printCourseDetails += "<a href='#' data-toggle='modal' data-target='#courses_only_modal_modify' data-target='#courses_modal' data-id='"+response[i].course_id +"' class='list-group-item list-group-item-action flex-column align-items-start'>"
                            + "<div class='d-flex w-100 justify-content-between'>"
                            + "<h5 class='mb-1'>" + response[i].name+ "</h5>"
                            + "<small>" + response[i].genre + "</small>"
                            + "</div>"
                            + " <div class='d-flex w-100'>"
                            + " <span class='badge badge-warning'>S$" + response[i].cost + "</span>"
                            + "<input type='hidden' value='" + response[i].course_id + "' id='course" + response[i].course_id + "'/>"
                            + " </div>"
                            + "  <small>" + response[i].course_provider + "</small>"
                            + " </a>";

                    $("#courseDetails").html(printCourseDetails);
                }

            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        });
    }
});

