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

        <script>
            function vacanciesChange() {
                $("#void").empty();
                var bla = $("#no_of_vacancies").val();
                for (var i = 0; i < bla; i++) {
                    $("#void").append("<div class='alert alert-warning' role='alert'>" +
                            "<div class='form-group'>" +
                            "<label for='exampleInputPassword1'>Vacancy " + (i + 1) + "</label>" +
                            "<div class='input-group'>" +
                            "<div class='input-group-prepend'>" +
                            "<span class='input-group-text'>Job Role:</span>" +
                            "</div>" +
                            "<input type='text' class='form-control' id='jobrole" + (i + 1) + "' placeholder='eg. App Dev etc.' on>" +
                            "</div>" +
                            "</div>" +
                            "<div class='form-group'>" +
                            "<div class='input-group'>" +
                            "<div class='input-group-prepend'>" +
                            "<span class='input-group-text'>Start Date:</span>" +
                            "</div>" +
                            "<input type='date' class='form-control' id='startdate" + (i + 1) + "' placeholder='eg. App Dev etc.' on>" +
                            "</div>" +
                            "</div>" +
                            "<div class='form-group'>" +
                            "<div class='input-group'>" +
                            "<div class='input-group-prepend'>" +
                            "<span class='input-group-text'>End Date:</span>" +
                            "</div>" +
                            "<input type='date' class='form-control' id='enddate" + (i + 1) + "' placeholder='eg. App Dev etc.' on>" +
                            "</div>" +
                            "</div>" +
                            "<div class='form-group'>" +
                            "<div class='input-group'>" +
                            "<div class='input-group-prepend'>" +
                            "<span class='input-group-text' id=''>Currency & Amount</span>" +
                            "</div>" +
                            "<input type='text' id='currency" + (i + 1) + "' class='form-control' placeholder='eg. SGD/MYR etc'>" +
                            "<input type='number' id='amount" + (i + 1) + "' class='form-control' placeholder='eg. 45, 1200 etc'>" +
                            "</div>" +
                            "</div>" +
                            "<div class='form-check form-group'>" +
                            "<input class='form-check-input' type='checkbox' value='' id='accomodation_checkbox" + (i + 1) + "'>" +
                            "<label class='form-check-label' for='accomodation_checkbox" + (i + 1) + "'>Accomodation provided</label>" +
                            "</div>" +
                            "<div class='form-check form-group'>" +
                            "<input class='form-check-input' type='checkbox' value='' id='airticket_checkbox" + (i + 1) + "'>" +
                            "<label class='form-check-label' for='airticket_checkbox" + (i + 1) + "'>Air Ticket provided</label>" +
                            "</div>" +
                            "</div>");
                }
            }
        </script>

    </head>
    <body>
        <!--About OIIP-->
        <div class="container">



            <br/>
            <div class="alert alert-danger" role="alert">
                <p>Add New Company to Database</p>
                <!--Button to add new company to OIIP-->
                <form class="" method="" action="">

                    <div class="form-group">
                        <div class="container">
                            <button type="button" data-toggle="modal" data-target="#oiip_add_company" class="btn btn-block btn-success">Add New Company</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="alert alert-warning" role="alert">
                <p>Companies with Vacancies</p>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Kisarazu Kosen</h5>
                            <small>4 months</small>
                        </div>
                        <a href=""><span class="badge badge-success">Add vacancy</span></a>
                        <br/><br/>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between align-items-center">
                                <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                <br/><a href=""><span class="badge badge-warning">Modify</span></a>
                                <a href=""><span class="badge badge-danger">Remove</span></a>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center">
                                <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
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
                        <a href=""><span class="badge badge-success">Add vacancy</span></a>
                        <br/><br/>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between align-items-center">
                                <small>IT Developer, 1 Jan 2017 to 31 Dec 2016, SGD 1200, accomodation provided, air ticket provided</small>
                                <br/><a href=""><span class="badge badge-warning">Modify</span></a>
                                <a href=""><span class="badge badge-danger">Remove</span></a>
                            </li>
                        </ul>
                        <br/>
                        <small>Tokuma, Nagano, Japan</small>
                    </li>
                </ul>
            </div>
            
            <!--Green alert box-->
            <div class="alert alert-success" role="alert">
                <p>Companies currently residing in DB</p>

                <ul class="list-group">
                    <li class="list-group-item justify-content-between">
                        ISIS School for terrorists
                        <br/>
                        <small>Small town in Syria</small>
                        <br/>
                        <a href=""><span class="badge badge-success">Add vacancy</span></a>
                    </li>
                    <li class="list-group-item justify-content-between">
                        North Korean Training Center
                        <br/>
                        <small>Pyongyang, North Korea</small>
                        <br/>
                        <a href=""><span class="badge badge-success">Add vacancy</span></a>
                    </li>
                </ul>
            </div>

            <!--Sample listed companies-->
            <!--                <div class="list-group">
                <a href="#" data-toggle="modal" data-target="#oiip_available_company" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Nagano Kosen</h5>
                        <small>Nagano, Nagano, Japan</small>
                    </div>
                    <small>IT Developer, 1 Jan 2011 to 5 Dec 2017, SGD 1200, accomodation provided, air ticket provided</small><br/>
                    <small>IT Developer, 1 Jan 2011 to 5 Dec 2017, SGD 1200, accomodation provided, air ticket provided</small><br/>
                    <small>IT Developer, 1 Jan 2011 to 5 Dec 2017, SGD 1200, accomodation provided, air ticket provided</small><br/>
                </a>
            </div>-->



        </div>
        <!--Modal for choosing available company-->
        <div class="modal fade" id="oiip_available_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modify Company Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body form">
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

                            <div class='alert alert-warning' role='alert'>
                                <div class='form-group'>
                                    <label for='exampleInputPassword1'>Vacancy 1</label>

                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Job Role:</span>
                                        </div>
                                        <input type='text' class='form-control' id='jobrole' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>Start Date:</span>
                                        </div>
                                        <input type='date' class='form-control' id='startdate' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text'>End Date:</span>
                                        </div>
                                        <input type='date' class='form-control' id='enddate' placeholder='eg. App Dev etc.' on>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <div class='input-group'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id=''>Currency & Amount</span>
                                        </div>
                                        <input type='text' id='currency' class='form-control' placeholder='eg. SGD/MYR etc'>
                                        <input type='number' id='amount' class='form-control' placeholder='eg. 45, 1200 etc'>
                                    </div>
                                </div>

                                <div class='form-check form-group'>
                                    <input class='form-check-input' type='checkbox' value='' id='accomodation_checkbox'>
                                    <label class='form-check-label' for='accomodation_checkbox'>Accomodation provided</label>
                                </div>

                                <div class='form-check form-group'>
                                    <input class='form-check-input' type='checkbox' value='' id='airticket_checkbox'>
                                    <label class='form-check-label' for='airticket_checkbox'>Air Ticket provided</label>
                                </div>
                            </div>

                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div> 
                </div>
            </div>
        </div>

        <!--Modal for adding new company-->
        <div class="modal fade" id="oiip_add_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add New Company</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body form">
                        <form method="" action="">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Company Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="eg. NEC Ltd">
                                <small id="emailHelp" class="form-text text-muted">This is the company name</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword2">Country</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="eg. Zimbabwe, Syria etc">
                            </div>

                            <div class="form-group">
                                <label for="no_of_vacancies">Number of Vacancies</label>
                                <input type="number" class="form-control" id="no_of_vacancies" placeholder="eg. 1,2,3 etc" onchange="vacanciesChange()">
                            </div>

                            <div class="form-check form-group">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">All Applicants same data as Vacancy 1</label>
                            </div>

                            <div id="void">
                            </div>
                            <!--Template Start-->
                            <!--                            <div class='alert alert-warning' role='alert'>
                                                            <div class='form-group'>
                                                                <label for='exampleInputPassword1'>Vacancy 1</label>
                            
                                                                <div class='input-group'>
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text'>Job Role:</span>
                                                                    </div>
                                                                    <input type='text' class='form-control' id='jobrole' placeholder='eg. App Dev etc.' on>
                                                                </div>
                                                            </div>
                            
                                                            <div class='form-group'>
                                                                <div class='input-group'>
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text'>Start Date:</span>
                                                                    </div>
                                                                    <input type='date' class='form-control' id='startdate' placeholder='eg. App Dev etc.' on>
                                                                </div>
                                                            </div>
                            
                                                            <div class='form-group'>
                                                                <div class='input-group'>
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text'>End Date:</span>
                                                                    </div>
                                                                    <input type='date' class='form-control' id='enddate' placeholder='eg. App Dev etc.' on>
                                                                </div>
                                                            </div>
                            
                                                            <div class='form-group'>
                                                                <div class='input-group'>
                                                                    <div class='input-group-prepend'>
                                                                        <span class='input-group-text' id=''>Currency & Amount</span>
                                                                    </div>
                                                                    <input type='text' id='currency' class='form-control' placeholder='eg. SGD/MYR etc'>
                                                                    <input type='number' id='amount' class='form-control' placeholder='eg. 45, 1200 etc'>
                                                                </div>
                                                            </div>
                            
                                                            <div class='form-check form-group'>
                                                                <input class='form-check-input' type='checkbox' value='' id='accomodation_checkbox'>
                                                                <label class='form-check-label' for='accomodation_checkbox'>Accomodation provided</label>
                                                            </div>
                            
                                                            <div class='form-check form-group'>
                                                                <input class='form-check-input' type='checkbox' value='' id='airticket_checkbox'>
                                                                <label class='form-check-label' for='airticket_checkbox'>Air Ticket provided</label>
                                                            </div>
                                                        </div>-->
                            <!--Template End-->

                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <button type="submit" id="" class="btn btn-primary">Save changes</button>

                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html>
