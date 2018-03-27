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
        <script src="scripts/courses_staffDashboard.js" type="text/javascript"></script>
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
                <!--Add some courses here-->
                <div class="list-group" id="courseDetails">
                    <!--                    <a href="#" data-toggle="modal" data-target="#courses_only_modal_modify" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Introduction to IoT & Embedded Systems</h5>
                                                <small>IT Security</small>
                                            </div>
                                            <div class="d-flex w-100">
                                                <span class="badge badge-warning">S$60.00</span>
                                            </div>
                                            <small>Coursera</small>
                                        </a>-->
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
                                    <input type="text" class="form-control" id="" placeholder="eg. Introduction to IoT" name="name">
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
                                        <input type="number" class="form-control" id="" placeholder="Please put in SGD, eg. SGD$0.06" name="cost" step="0.01" min="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Course Provider:</label>
                                    <input type="text" class="form-control" id="" placeholder="eg. Coursera, Codeacademy" name="provider">
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
                                    <label for="exampleFormControlInput1">Name of new course:</label>
                                    <input type="text" class="form-control" required id="" placeholder="eg. Introduction to IoT" name="course_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Course Genre:</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="course_genre" required>
                                        <option>Programming</option>
                                        <option>IT Security</option>
                                        <option>Internet of Things</option>
                                        <option>Cognitive Technology</option>
                                        <option>Computer Science</option>
                                        <option>Mechanical Engineering</option>
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
                                        <input required type="number" class="form-control" id="" placeholder="Please put in SGD, eg. SGD$0.06" name="course_cost" step="0.01" min="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Course Provider:</label>
                                    <input required type="text" class="form-control" id="" placeholder="eg. Coursera, Codeacademy" name="course_provider">
                                </div>
                            </div>

                            <input type="hidden" value="" required name="course_id"/>
                            <div class="modal-footer">
                                <!--                            <button type="button" class="btn btn-danger" data-dismiss="modal">Delete Course</button>-->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save changes"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
