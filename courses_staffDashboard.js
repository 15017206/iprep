/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {



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
                   
                     $('#courses_only_modal2').modal('hide');
                     $('#formAddNewCourse')[0].reset();

                },
                error: function (obj, textStatus, errorThrown) {
                    console.log("Error " + textStatus + ": " + errorThrown);
                }

            });

        }

    });
});

