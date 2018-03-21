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
        <div class="container">
            <br/>
            <p>List of students with courses:</p>

            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="#">Filter:</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

<!--                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Month
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">March</a>
                                <a class="dropdown-item" href="#">October</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Year
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">2018</a>
                            </div>
                        </li>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Diploma
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">DBA</a>
                                <a class="dropdown-item" href="#">DBIS</a>
                                <a class="dropdown-item" href="#">DIT</a>
                                <a class="dropdown-item" href="#">DIDM</a>
                                <a class="dropdown-item" href="#">DMSD</a>
                                <a class="dropdown-item" href="#">DISM</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Name or studentID" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <br/>

            <!--Add some students here-->
            <div class="list-group">

                <ul class="list-group">
                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Introduction of ioT & Embedded Systems</h5>
                            <small>4 months</small>
                        </div>
                        <span class="badge badge-success">$600.00</span>
                        <br/>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between align-items-center">
                                Lee Tze Jian&nbsp;<span class="badge badge-info">DMSD</span>
                                <br/><span class="badge badge-warning">Ongoing</span>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center">
                                Grace Yap&nbsp;<span class="badge badge-info">DDDD</span>
                                <br/><span class="badge badge-warning">Completed</span>
                            </li>
                        </ul>
                        <br/>
                        <small>Coursera</small>
                    </li>
                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">How to hack LEO 2.0 - Hacking course</h5>
                            <small>2 days</small>
                        </div>
                        <span class="badge badge-success">$600.00</span>
                        <br/>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between align-items-center">
                                Toh Kee Heng&nbsp;<span class="badge badge-info">DIT</span>
                                <br/><span class="badge badge-warning">Ongoing</span>
                            </li>
                        </ul>
                        <br/>
                        <small>Code Academy</small>
                    </li>
                </ul>

                <!--                <a href="#" data-toggle="modal" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Grace Yap Jr. (15063493)</h5>
                                        <small>Still doing course</small>
                                    </div>
                                    <div class="d-flex w-100">
                                        <span class="badge badge-warning">DBIS</span>
                                    </div>
                                    <p class="mb-1">Introduction to Programming - Internet of Things&nbsp;<span class="badge badge-success">Approved</span></p>
                                    <small>Coursera</small>
                                </a>-->
            </div>

            <!--Modal for students has courses-->
            <div class="modal fade" id="courses_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Student course status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name:</label>
                                    <input type="text" class="form-control" id="" placeholder="eg. Tan Ah Teck">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Course Orgin:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Coursera</option>
                                        <option>Khan Academy</option>
                                        <option>Code Academy</option>
                                        <option>OASIS</option>
                                        <option>Brazzers</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Course Status:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>New</option>
                                        <option>Approved</option>
                                        <option>Completed</option>
                                        <option>Payment Requested</option>
                                        <option>Payment Received</option>
                                        <option>Payment Disbursed</option>
                                        <option>Rejected</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">Save changes</button>
                            <button type="button" class="btn btn-danger">Delete student</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal for courses and students-->
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
