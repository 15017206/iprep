<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'scripts.php'; ?> 
        <script>

            $(document).ready(function () {
                $("#loginForm").on('submit', function (e) {
                    e.preventDefault();
//                  console.log($("#stdId").val());
//                  console.log($("#stdPass").val());
                    $.ajax({
                        type: "POST",
                        url: 'webservices/doLogin.php',
                        //data: $("#loginForm").serialize(),
                        //unable to serialize(no idea why)
                        data: {"stdId": $("#stdId").val(), "stdPass": $("#stdPass").val()},
                        success: function (data) {
                            console.log(data);
                            alert(data);
                            if (data.toString().indexOf('Login/Staff') >0) {
                                alert("staff page");
//                                window.location.href = "Location: graceyap_dashboard_course.php";
                                document.location.replace('graceyap_dashboard_course.php');
                            } else if (data.toString().indexOf("Login/Student") > 0) {
                                alert("student page");
//                                window.location.href = "Location: student_dashboard.php";
                                document.location.replace('student_dashboard_listofcourses.php');
                            } else {
                                alert('Invalid Credentials');
                            }
                        }
                    });
                });
            });
        </script>

    </head>
    <body>
        <br/>
        <div class="container">
            <div class="alert alert-dark" role="alert">iPrep Login</div>
        </div>
        <div class="container">
            <form name="loginForm" method="POST" id="loginForm" action="">
                <div class="form-group">
                    <label for="stdId">Student ID</label>
                    <input class="form-control" id="stdId" aria-describedby="emailHelp" placeholder="eg. 15017206, 14003424">

                </div>
                <div class="form-group">
                    <label for="stdPass">Password</label>
                    <input type="password" class="form-control" id="stdPass" placeholder="eg. xxxxxx">
                </div> 

                <div class="container-fluid">
                    <button type="submit" class="btn btn-block btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
