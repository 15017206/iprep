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
            <div class="alert alert-info" role="alert">Course Info</div>

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

            <!--Add some-->
            <p>List of courses applied:</p>
            <div class="list-group">
                <a href="#" data-toggle="modal" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Grace Yap (15063493)</h5>
                        <small>Still doing course</small>
                    </div>
                    <div class="d-flex w-100">
                        <span class="badge badge-warning">DBIS</span>
                    </div>
                    <p class="mb-1">Introduction to Programming - Internet of Things&nbsp;<span class="badge badge-success">Approved</span></p>
                    <small>Coursera</small>
                </a>
            </div>
        </div>

        <!--About OIIP-->
        <div class="container">
            <br/>
            <div class="alert alert-warning" role="alert">OIIP Info</div>
                        <!--Button to-->
            <form class="" method="" action="">

                <div class="form-group">
                    <div class="container">
                        <button type="button" class="btn btn-block btn-success">Apply for OIIP</button>
                        <button type="button" class="btn btn-block btn-success">Request OIIP approval from IMDA</button>
                        <button type="button" class="btn btn-block btn-info">Submit OIIP approval email</button>
                    </div>
                </div>
            </form>
            
            <p style="text-align: center">No OIIP Assigned yet</p>
    </body>
</html>
