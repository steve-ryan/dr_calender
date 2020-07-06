<?php

//Starting session
// session_start();

     require('./../includes/connection.php');
     
     if($stmt = $conn->prepare('SELECT doctor_id,doctor_password FROM doctor WHERE username= ?')){
        $stmt->bind_param('s',$_POST['username']);
        $stmt->execute();
        //store result so we can check if account exists in db
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt ->bind_result($admin_id, $admin_password);
            $stmt->fetch();

            if((md5($_POST['signup-password'])== $admin_password)){
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name']= $_POST['username'];
                $_SESSION['id'] = $admin_id;
                // echo 'Welcome'.$_SESSION['name'].'!';
            //    header('Location:./../admin/dashboard.php');

            }else{
                $_SESSION['message'] = "Invalid username or password!!";
                
                // echo 'Incorrect password!';
            }
            if(isset($_SESSION["id"])){
                header('Location:./../admin/dashboard.php');
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