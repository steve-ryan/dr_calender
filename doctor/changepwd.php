<?php 
include ('./../includes/doctor_check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
    <script src="./../assets/js/changepassword.js" type="text/javascript"></script>
</head>

<body>
    <div class="grid-container">

        <?php

    // session_start();
    include ('./../includes/sidebars/doctor_sidebar.php');
    include ("./../database/config.php");
    ?>

        <main class="main" style="background-image:linear-gradient(to top,#CCFFCC,#CCCCCC);">
            <div class="main_overview">
                <div class="container">



                    <div class="row justify-content-center">


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-black h-100 no-radius text-center"><strong>Change
                                        Password</strong></div>
                                <div class="alert alert-success alert-dismissible text-center" id="success"
                                    style="display:none;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                                </div>

                                <div class="alert alert-danger alert-dismissible text-center" id="error"
                                    style="display:none;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                                </div>

                                <div class="card-body">
                                    <div id="message"></div>

                                    <form name="frmChange" method="post" action="" id="resetform"
                                        onSubmit="return validatePassword();">

                                        <div class="form-group">
                                            <label for="current_password"><strong>Current Password:</strong></label>
                                            <input type="password" class="form-control" id="currentPassword"
                                                name="currentPassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password"><strong>New Password:</strong></label>
                                            <input type="password" class="form-control" id="newPassword"
                                                name="newPassword">
                                        </div>
                                        <?php
                                        $id=$_SESSION['drid'];
                                        echo '<input type="hidden" id="id" name="id" value="'.$id.'">';
                                        ?>
                                        <div class="form-group">
                                            <label for="new_password_confirmation"><strong>Confirm New
                                                    Password:</strong></label>
                                            <input type="password" class="form-control" id="confirmPassword"
                                                name="confirmPassword">
                                        </div>
                                        <div class="alert" style="color:red;" id="CheckPasswordMatch"></div>
                                        <input type="submit" class="btn btn-primary" name="password_change"
                                            id="submit_btn" value="Change Password" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script src="./../assets/js/jquery.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/bootstrap-4.3.1.js"></script>
    <script>
    $(document).ready(function() {

        $("#resetform").submit(function(e) {
            e.preventDefault();

            //disable the submit button
            $("#submit_btn").attr("disabled", true);
            return true;
        });

        var frm = $('#resetform');
        frm.submit(function(e) {
            e.preventDefault();

            var formData = frm.serialize();
            formData += '&' + $('#submit_btn').attr('name') + '=' + $('#submit_btn').attr('value');
            $.ajax({
                type: "POST",
                url: "passchange.php",
                data: formData,
                success: function(data) {
                    var data = JSON.parse(data);
                    if (data.statusCode == 200) {
                        $("#success").show();
                        $('#success').html('Password updated !').delay(3000).fadeOut(3000);
                    } else if (data.statusCode == 201) {
                        $("#error").show();
                        $('#error').html('Old password not matching !').delay(3000).fadeOut(
                            3000);
                    }
                    // console.log('idiot');
                    //$('#message').html(data).delay(3000).fadeOut(3000);
                }
            });
        });
    });
    </script>
    <script>
    function checkPasswordMatch() {
        var password = $("#newPassword").val();
        var confirmPassword = $("#confirmPassword").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").html("Passwords match.");
    }
    $(document).ready(function() {
        $("#confirmPassword").keyup(checkPasswordMatch);
    });
    </script>
</body>
</body>

</html>