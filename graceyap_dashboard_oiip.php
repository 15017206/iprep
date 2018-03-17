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

            <div class="alert alert-info" role="alert">List of available companies in database&nbsp;<a href="#collapse_id1" data-toggle="collapse"><span class="badge badge-info">Show/Hide</span></a>
                <br/><br/>
                <div class="collapse show" id="collapse_id1">
                    <ul class="list-group">
                        <li class="list-group-item justify-content-between">
                            ISIS
                            <br/>
                            <small>Small town in Syria</small>
                            <br/>
                            <a href=""><span class="badge badge-success">Add students to company </span></a>&nbsp;<a href=""><span class="badge badge-info badge-warning">Edit students already assigned to company</span></a>&nbsp;<a href=""><span class="badge badge-danger">Remove students in company</span></a>
                        </li>
                        <li class="list-group-item justify-content-between">
                            North Korean Training Center
                            <br/>
                            <small>Pyongyang, North Korea</small>
                            <br/>
                            <a href=""><span class="badge badge-success">Add students to company </span></a>&nbsp;<a href=""><span class="badge badge-info badge-warning">Edit students already assigned to company</span></a>&nbsp;<a href=""><span class="badge badge-danger">Remove students in company</span></a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="alert alert-warning" role="alert">OIIP Info
                <br/>
                <br/>
                <!--Button to add new students to OIIP-->
                <form class="" method="" action="">

                    <div class="form-group">
                        <div class="container">
                            <button type="button" data-toggle="modal" data-target="#oiip_add_vacancies" class="btn btn-block btn-info">Assign OIIP to student</button>
                        </div>
                    </div>
                </form>

                <!--Add some students here-->
                <div class="list-group">
                    <a href="#" data-toggle="modal" data-target="#oiip_vacancies" class="list-group-item list-group-item-action flex-column align-items-start">
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
                    <a href="#" data-toggle="modal" data-target="#oiip_vacancies" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Osama (15063493)</h5>
                            <small>Nagano, Japan</small>
                        </div>
                        <div class="d-flex w-100">
                            <span class="badge badge-warning">DMSD</span>
                        </div>
                        <p class="mb-1">Translation of Braille to English Text &nbsp;<span class="badge badge-success">Nagano College Institute of Technology, Japan</span></p>
                        <small>5 months total, 1 day remaining</small>
                    </a>
                </div>
            </div>
        </div>
        <!--Modal for assigning student to Companies-->
        <div class="modal fade" id="oiip_vacancies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <div class="modal fade" id="oiip_edit_vacancies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <label for="exampleInputEmail1">Number of Vacancies</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="eg. NEC Ltd">
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
    </body>
</html>
