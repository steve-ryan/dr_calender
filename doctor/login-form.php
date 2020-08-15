<?php
     include ("./../database/config.php");
     
     if($stmt = $conn->prepare("SELECT doctor_id,password FROM doctor WHERE active ='1' AND firstname= ?")){
        $stmt->bind_param('s',$_POST['username']);
        $stmt->execute();
        //store result so we can check if account exists in db
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt ->bind_result($doctor_id, $doctor_password);
            $stmt->fetch();

            if((md5($_POST['signup-password'])== $doctor_password)){
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['drname']= $_POST['username'];
                $_SESSION['drid'] = $doctor_id;

            }else{
                $_SESSION['message'] = "Invalid credentials or suspended!!";
                
                // echo 'Incorrect password!';
            }
            if(isset($_SESSION["drid"])){
                header('Location:./../doctor/dashboard.php');
            }
        }

        $stmt->close();
     }
?>

<div class="sign-up-container">
    <div class="login-signup">
        <a href="#">Home</a>
    </div>
    <div class="signup-align">
        <form name="login" action="" method="post" onsubmit="return loginValidation()">
            <div class="signup-heading">
                <img src="./../public/logo.png" width="250px">
                <br />
                Login</div>
            <?php 
                if(isset($_SESSION["message"])) {
                ?>
            <div class="error-msg"><?php echo $_SESSION["message"]; ?></>
            <?php 
                unset($_SESSION["message"]);
                } 
                ?>
            <div class="row">
                <div class="inline-block">
                    <div class="form-label">
                        Username<span class="required error" id="username-info"></span>
                    </div>
                    <input class="input-box-330" type="text" name="username" id="username">
                </div>
            </div>
            <div class="row">
                <div class="inline-block">
                    <div class="form-label">
                        Password<span class="required error" id="signup-password-info"></span>
                    </div>
                    <input class="input-box-330" type="password" name="signup-password" id="signup-password">
                </div>
            </div>
            <div class="row">
                <input class="sign-up-btn" type="submit" name="login" id="login-btn" value="Login">
            </div>
            <div class="row">
                <a href="./../#">Back Home</a>
            </div>
        </form>
    </div>
</div>

<script>
function loginValidation() {
    var valid = true;
    $("#username").removeClass("error-field");
    $("#password").removeClass("error-field");

    var UserName = $("#username").val();
    var Password = $('#signup-password').val();

    $("#username-info").html("").hide();
    $("#email-info").html("").hide();

    if (UserName.trim() == "") {
        $("#username-info").html("required.").css("color", "#ee0000").show();
        $("#username").addClass("error-field");
        valid = false;
    }
    if (Password.trim() == "") {
        $("#signup-password-info").html("required.").css("color", "#ee0000").show();
        $("#signup-password").addClass("error-field");
        valid = false;
    }
    if (valid == false) {
        $('.error-field').first().focus();
        valid = false;
    }
    return valid;
}
</script>