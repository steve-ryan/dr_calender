<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./../assets/css/form.css">
    </head>
    <body>
    <div>
        <form action="" method="post" id="frmLogin" onSubmit="return validate();">
            <div class="demo-table">

                <div class="form-head">Register</div>
                <?php 
                if(isset($_SESSION["errorMessage"])) {
                ?>
                <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                <?php 
                unset($_SESSION["errorMessage"]);
                } 
                ?>
                <div class="field-column">
                
                    <div>
                        <label for="username">First name</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="firstname" id="firstname" type="text"
                            class="demo-input-box">
                    </div>
                </div>
                <div class="field-column">
                
                    <div>
                        <label for="username">Last name</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="lastname" id="lastname" type="text"
                            class="demo-input-box">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password"
                            class="demo-input-box">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Confirm Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="confirmpassword" id="confirmpassword" type="password"
                            class="demo-input-box">
                    </div>
                </div>
                <div class=field-column>
                    <div>
                        <input type="submit" name="register" value="Submit"
                        class="btnLogin"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        
        var userName = document.getElementById("user_name").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
    </script>
</body>
</html>