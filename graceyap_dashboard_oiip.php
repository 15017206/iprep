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
        <!--About OIIP-->
        <div class="container">
            <br/>
            <p>Do: dropdown list, month & year, textbox -> coy name and student name/id</p>
            <!--List of available companies in database-->
            <div class="alert alert-info" role="alert">List of available companies with at least 1 vacancy&nbsp;<a href="#collapse_id1" data-toggle="collapse"><span class="badge badge-info">Show/Hide</span></a>
                <br/><br/>
                <div class="collapse show" id="collapse_id1">

                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Some Chinese Company</h5>
                                <small>4 months</small>
                            </div>
                            <br/>
                            <ul class="list-group">
                                <li class="list-group-item justify-content-between align-items-center">
                                    <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                    <br/><a href=""><span class="badge badge-success">Allocate Student</span></a>
                                    
                                </li>
                                <li class="list-group-item justify-content-between align-items-center">
                                    <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                    <br/><a href=""><span class="badge badge-success">Allocate Student</span></a>
                                    
                                </li>
                            </ul>
                            <br/>
                            <small>Kisarazu, Chiba, Tokyo</small>
                        </li>
                        <li class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">ABC Pte Ltd</h5>
                                <small>2 days</small>
                            </div>
                            <br/>
                            <ul class="list-group">
                                <li class="list-group-item justify-content-between align-items-center">
                                    <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                    <br/><a href=""><span class="badge badge-success">Allocate Student</span></a>
                                    
                                </li>
                            </ul>
                            <br/>
                            <small>Tokuma, Nagano, Japan</small>
                        </li>
                    </ul>





                </div>
            </div>


            <div class="alert alert-warning" role="alert">List of Kosens with at least 1 student attached
                <br/>
                <!--Button to add new students to OIIP-->
                <form class="" method="" action="">

                    <div class="form-group">
                        <div class="container">
                            <!--<button type="button" data-toggle="modal" data-target="#oiip_add_vacancies" class="btn btn-block btn-info">Assign OIIP to student</button>-->
                        </div>
                    </div>
                </form>

                <!--Sample text-->
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Kisarazu Kosen</h5>
                            <small>4 months</small>
                        </div>
                        <br/>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between align-items-center">
                                Lee Tze Jian
                                <br/><a href=""><span class="badge badge-warning">Modify</span></a>
                                <a href=""><span class="badge badge-danger">Remove</span></a>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center">
                                Grace Yap
                                <br/><a href=""><span class="badge badge-warning">Modify</span></a>
                                <a href=""><span class="badge badge-danger">Remove</span></a>
                            </li>
                        </ul>
                        <br/>
                        <small>Kisarazu, Chiba, Tokyo</small>
                    </li>
                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Nagano Kosen</h5>
                            <small>2 days</small>
                        </div>
                        <br/>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between align-items-center">
                                Toh Kee Heng
                                <br/><a href=""><span class="badge badge-warning">Modify</span></a>
                                <a href=""><span class="badge badge-danger">Remove</span></a>
                            </li>
                        </ul>
                        <br/>
                        <small>Tokuma, Nagano, Japan</small>
                    </li>
                </ul>

                <!--Inactive : Add some students here-->
                <!--<div class="list-group">
                    <a href="#" data-toggle="modal" data-target="#edit_delete_student_to_companies" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Kim Jong Un (15063493)</h5>
                            <small>Kurume, Fukuoka, Japan</small>
                        </div>
                        <div class="d-flex w-100">
                            <span class="badge badge-warning">DIT</span>
                        </div>
                        <p class="mb-1">Arduino & Internet of Things &nbsp;<span class="badge badge-success">Kurume Institute of Technology, Japan</span></p>
                        <small>4 months total, 3 months 2 days remaining</small>
                    </a>
                </div>-->
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
