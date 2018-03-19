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
        <br/>
        <!--About OIIP-->
        <div class="container">
            <div class="alert alert-info" role="alert">
                <p>OIIP Interest</p>        

                <p>Are you interested for Overseas Internship?</p>
                <!--Interest for OIIP-->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        No
                    </label>
                </div>

            </div>

            <div class="alert alert-warning" role="alert">
                <p>OIIP assignment:</p>
                <div class="list-group">
                    <ul class="list-group">
                        <li data-toggle="modal" data-target="#courses_modal" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Translation of Braille to English Text</h5>
                                <small>Tokushima, Nagano, Japan</small>
                            </div>
                            <p class="mb-1"></p>
                            <span class="badge badge-warning">Funding Status: Applied</span>&nbsp;<span class="badge badge-warning">Job Status: Accepted</span>&nbsp;<span class="badge badge-warning">Funding source: YTP</span>
                            <br/><br/>

                            <button type="button" data-toggle="modal" data-target="#uploadfiles" class="btn btn-primary btn-sm">Upload Files</button>
<!--                            <a href=""><span class="badge badge-info">Request OIIP approval from IMDA</span></a>
                            <a href=""><span class="badge badge-info">Submit OIIP approval email</span></a>-->
                            <br/>
                            <small>$1200/month</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--Modal for uploading files-->
        <div class="modal fade" id="uploadfiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload files here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>OIIP approval email</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Air ticket</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Final report</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>MAS currency forex exchange rate</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Annex E</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                                <li class="list-group-item">
                                    <p>Annex F</p>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <small>1.jpg</small>
                                </li>
                            </ul>
                        </form>
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
