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
                <p>OIIP Actions</p>        

                <!--Button to-->
                <form class="" method="" action="">
                    <div class="form-group">
                        <div class="container">
                            <button type="button" class="btn btn-block btn-success">Apply for OIIP</button>
                        </div>
                    </div>
                </form>


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
                            <br/>
                            <a href=""><span class="badge badge-info">Request OIIP approval from IMDA</span></a>
                            <a href=""><span class="badge badge-info">Submit OIIP approval email</span></a>
                            <br/>
                            <small>$1200/month</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
