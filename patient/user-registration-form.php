<?php

include ("./database.php");

//prepare statement for patient registration
$state=$conn->prepare("INSERT INTO patient(firstname,lastname,YOB,email,password)VALUES(?,?,?,?,?)");
$state->bind_param("sssss",$firstname,$lastname,$yob,$email,$encry);
if(isset($_POST['signup-btn'])){

    $firstname=mysqli_real_escape_string($conn,$_POST["firstname"]);
    $lastname=mysqli_real_escape_string($conn,$_POST["lastname"]);
    $yob=mysqli_real_escape_string($conn,$_POST["yob"]);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    $encry=md5($password);
    $state->execute();
}
$state->close();
$conn->close();


?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./../assets/css/form/main-style.css" type="text/css" rel="stylesheet" />
    <link href="./../assets/css/form/user-registration.css" type="text/css" rel="stylesheet" />
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
</head>

<body
    style="background-image: url(./../public/bg-row-2.jpg); background-blend-mode: luminosity; background-repeat: repeat; background-attachment: fixed">
    <div class="main-container">
        <div class="sign-up-container">
            <div class="login-signup">
                <a href="index.php">Login</a>
            </div>
            <div class="">
                <form name="sign-up" action="" method="post" onsubmit="return signupValidation()">
                    <div class="signup-heading">
                        <img src="./../public/logo.png" width="250px" hieght="50px">
                    
                    </div>
                    <?php 
				if(!empty($registrationResponse["status"]))
				{
				?>
                    <?php 
                    if($registrationResponse["status"] == "error")
                    {
                    ?>
                    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php 
				    } 
				    else if($registrationResponse["status"] == "success")
				    {
                    ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php 
				    }
                    ?>
                    <?php 
				}
				?>
                    <div class="error-msg" id="error-msg"></div>
                    <div class="row">
                        <div class="inline-block ">
                            <div class="form-label">
                                First name<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330" type="text" name="firstname" id="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inline-block ">
                            <div class="form-label">
                                Last name<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330" type="text" name="lastname" id="username">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                Email<span class="required error" id="email-info"></span>
                            </div>
                            <input class="input-box-330" type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inline-block ">
                            <div class="form-label">
                               Y.O.B<span class="required error" id="username-info"></span>
                            </div>
                            <input class="input-box-330" type="date" name="yob" id="username" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                Password<span class="required error" id="signup-password-info"></span>
                            </div>
                            <input class="input-box-330" type="password" name="password" id="signup-password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inline-block">
                            <div class="form-label">
                                Confirm Password<span class="required error" id="confirm-password-info"></span>
                            </div>
                            <input class="input-box-330" type="password" name="confirm-password" id="confirm-password">
                        </div>
                    </div>
                    <div class="row">
                        <input class="sign-up-btn" type="submit" name="signup-btn" id="signup-btn" value="Sign up">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function signupValidation() {
        var valid = true;

        $("#username").removeClass("error-field");
        $("#email").removeClass("error-field");
        $("#password").removeClass("error-field");
        $("#confirm-password").removeClass("error-field");

        var UserName = $("#username").val();
        var email = $("#email").val();
        var Password = $('#signup-password').val();
        var ConfirmPassword = $('#confirm-password').val();
        var emailRegex =
            /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

        $("#username-info").html("").hide();
        $("#email-info").html("").hide();

        if (UserName.trim() == "") {
            $("#username-info").html("required.").css("color", "#ee0000").show();
            $("#username").addClass("error-field");
            valid = false;
        }
        if (email == "") {
            $("#email-info").html("required").css("color", "#ee0000").show();
            $("#email").addClass("error-field");
            valid = false;
        } else if (email.trim() == "") {
            $("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
            $("#email").addClass("error-field");
            valid = false;
        } else if (!emailRegex.test(email)) {
            $("#email-info").html("Invalid email address.").css("color", "#ee0000")
                .show();
            $("#email").addClass("error-field");
            valid = false;
        }
        if (Password.trim() == "") {
            $("#signup-password-info").html("required.").css("color", "#ee0000").show();
            $("#signup-password").addClass("error-field");
            valid = false;
        }
        if (ConfirmPassword.trim() == "") {
            $("#confirm-password-info").html("required.").css("color", "#ee0000").show();
            $("#confirm-password").addClass("error-field");
            valid = false;
        }
        if (Password != ConfirmPassword) {
            $("#error-msg").html("Both passwords must be same.").show();
            valid = false;
        }
        if (valid == false) {
            $('.error-field').first().focus();
            valid = false;
        }
        return valid;
    }
    </script>
</body>

</html>