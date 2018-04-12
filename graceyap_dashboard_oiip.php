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
        $(document).ready(function(){
            
        });
        </script>
    </head>
    <body>
        <!--About OIIP-->
        <div class="container">
            <br/>
            <!--List of available companies in database-->
            <div class="alert alert-info" role="alert">List of  companies&nbsp;<a href="#collapse_id1" data-toggle="collapse"><span class="badge badge-info">Show/Hide</span></a>
                <br/><br/>
                <div class="collapse show" id="collapse_id1">

                    <!--filter navbar-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Filter:</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Month
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Janurary</a>
                                        <a class="dropdown-item" href="#">February</a>
                                        <a class="dropdown-item" href="#">March</a>
                                        <a class="dropdown-item" href="#">April</a>
                                        <a class="dropdown-item" href="#">May</a>
                                        <a class="dropdown-item" href="#">June</a>
                                        <a class="dropdown-item" href="#">July</a>
                                        <a class="dropdown-item" href="#">August</a>
                                        <a class="dropdown-item" href="#">September</a>
                                        <a class="dropdown-item" href="#">October</a>
                                        <a class="dropdown-item" href="#">November</a>
                                        <a class="dropdown-item" href="#">December</a>
                                    </div>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Year
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">2016</a>
                                        <a class="dropdown-item" href="#">2017</a>
                                        <a class="dropdown-item" href="#">2018</a>
                                        <a class="dropdown-item" href="#">2019</a>
                                        <a class="dropdown-item" href="#">2020</a>
                                        <a class="dropdown-item" href="#">2021</a>
                                        <a class="dropdown-item" href="#">2022</a>
                                        <a class="dropdown-item" href="#">2023</a>
                                        <a class="dropdown-item" href="#">2024</a>
                                        <a class="dropdown-item" href="#">2025</a>
                                        <a class="dropdown-item" href="#">2026</a>
                                        <a class="dropdown-item" href="#">2027</a>
                                        <a class="dropdown-item" href="#">2028</a>
                                        <a class="dropdown-item" href="#">2029</a>
                                        <a class="dropdown-item" href="#">2030</a>
                                        <a class="dropdown-item" href="#">2031</a>
                                        <a class="dropdown-item" href="#">2032</a>
                                        <a class="dropdown-item" href="#">2033</a>
                                        <a class="dropdown-item" href="#">2034</a>
                                        <a class="dropdown-item" href="#">2035</a>
                                        <a class="dropdown-item" href="#">2036</a>
                                        <a class="dropdown-item" href="#">2037</a>
                                        <a class="dropdown-item" href="#">2038</a>
                                        <a class="dropdown-item" href="#">2039</a>
                                        <a class="dropdown-item" href="#">2040</a>
                                        <a class="dropdown-item" href="#">2041</a>
                                        <a class="dropdown-item" href="#">2042</a>
                                        <a class="dropdown-item" href="#">2043</a>
                                        <a class="dropdown-item" href="#">2044</a>
                                        <a class="dropdown-item" href="#">2045</a>
                                        <a class="dropdown-item" href="#">2046</a>
                                        <a class="dropdown-item" href="#">2047</a>
                                        <a class="dropdown-item" href="#">2048</a>
                                        <a class="dropdown-item" href="#">2049</a>
                                        <a class="dropdown-item" href="#">2050</a>        
                                    </div>
                                </li>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Name or studentID" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <!--end of filter navbar-->
                    <br/>
                    <ul class="list-group" id="container_vacancies_students">
                        <li class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">ABC Pte Ltd</h5>
                                <small>2 days</small>
                            </div>
                            <br/>
                            <ul class="list-group">
                                <li class="list-group-item justify-content-between align-items-center">
                                    <div>Vacant</div>
                                    <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                    <br/><a href=""><span class="badge badge-success">Allocate Student</span></a>

                                </li>
                                <li class="list-group-item justify-content-between align-items-center">
                                    <div>Toh Kee Heng</div>
                                    <small>Hacker, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                    <br/><a href=""><span class="badge badge-warning">Modify</span></a>
                                    <a href=""><span class="badge badge-danger">Remove</span></a>
                                </li>
                            </ul>
                            <br/>
                            <small>Tokuma, Nagano, Japan</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Modal for assigning student to Companies-->
        <div class="modal fade" id="assigning_student_to_companies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Student with Courses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="eg. NEC Ltd">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Country</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="eg. Zimbabwe, Syria etc">
                            </div>
                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal for editing or deleting students already assigned to Companies-->
        <div class="modal fade" id="edit_delete_student_to_companies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Student with Courses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Company</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Number of Vacancies</label>
                                <input type="number" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="eg. NEC Ltd">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Country</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="eg. Zimbabwe, Syria etc">
                            </div>
                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
