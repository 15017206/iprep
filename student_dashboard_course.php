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

        <div class="container">
            <br/>

            <!--Course Actions-->
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

            <!--List of courses Applied-->
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

        <!--Modal for Apply New Course-->
        <div class="modal fade" id="apply_new_course_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Apply new course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal for Make claim for course-->
        <div class="modal fade" id="make_claim_course_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Make Claim for course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal for submit IMDA approval email-->
        <div class="modal fade" id="submit_imda_approval_email_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
