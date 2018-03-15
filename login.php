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
    </head>
    <body>
        <br/>
        <div class="container">
            <div class="alert alert-dark" role="alert">iPrep Login</div>
        </div>
        <div class="container">
            <form method="post" action="graceyap_dashboard.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter ID</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="eg. 15017206, 14003424">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="eg. xxxxxx">
                </div>
                <div class="form-check form-group">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <div class="container-fluid">
                    <button type="submit" class="btn btn-block btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
