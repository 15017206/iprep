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
        include 'navbar_student.php';
        ?>
    </head>
    <body>
        <!--About courses-->
        <div class="container">
            <br/>
            <div class="alert alert-info" role="alert">
                <p>Course Actions</p>
                <!--Button to-->
                <form class="" method="" action="">

                    <div class="form-group">
                        <div class="container">
                            <button type="button" class="btn btn-block btn-success" >Apply new course</button>
                            <button type="button" class="btn btn-block btn-info">Make Claim for course</button>
                            <button type="button" class="btn btn-block btn-info">Submit IMDA approval email</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="alert alert-success" role="alert">
                <!--Add some-->
                <p>List of courses applied:</p>
                <div class="list-group">
                    <a href="#" data-toggle="modal" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Grace Yap (15063493)</h5>
                            <small>Still doing course</small>
                        </div>
                        <div class="">
                            <span class="badge badge-warning">DBIS</span>&nbsp;<span class="badge badge-success">Approved</span>
                        </div>
                        <p class="mb-1">Introduction to Programming - Internet of Things</p>
                        <small>Coursera</small>
                    </a>
                </div>
            </div>
        </div>


    </body>
</html>
