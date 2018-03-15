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
        include 'navbar_staff.php';
        ?>
    </head>
    <body>
        <!--About courses-->
        <div class="container">
            <br/>
            <div class="alert alert-info" role="alert">Course Info</div>

            <div class="form-group">
                <div class="container">
                    <button type="button" data-toggle="modal" data-target="#courses_only_modal2" class="btn btn-block btn-danger">Add New Courses</button>
                </div>
            </div>

            <p>List of available courses:</p>
            <!--Add some courses here-->
            <div class="list-group">
                <a href="#" data-toggle="modal" data-target="#courses_only_modal2" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Introduction to IoT & Embedded Systems</h5>
                        <small>IT Security</small>
                    </div>
                    <div class="d-flex w-100">
                        <span class="badge badge-warning">S$60.00</span>
                    </div>
                    <small>Coursera</small>
                </a>
            </div>

            <!--Modal for courses only-->
            <div class="modal fade" id="courses_only_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add new courses</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name of new course:</label>
                                <input type="text" class="form-control" id="" placeholder="eg. Introduction to IoT">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Course Genre:</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Programming</option>
                                    <option>IT Security</option>
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
                                    <input type="number" class="form-control" id="" placeholder="Please put in SGD, eg. SGD$0.06">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Course Provider:</label>
                                <input type="text" class="form-control" id="" placeholder="eg. Coursera, Codeacademy">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
