
<!DOCTYPE html>

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

            <form action="./../routes/login-action.php" method="post" id="frmLogin" onSubmit="return validate();">
                <div class="demo-table">

                    <div class="form-head">Login</div>
                <?php 
                if(isset($_SESSION["message"])) {
                ?>
                <div class="error-message"><?php  echo $_SESSION["message"]; ?></div>
                <?php 
                unset($_SESSION["message"]);
                } 
                ?>
                    <div class="field-column">

                        <div>
                            <label for="username">Username</label><span id="user_info" class="error-info"></span>
                        </div>
                        <div>
                            <input name="user_name" id="username" type="text" class="demo-input-box" required>
                        </div>
                    </div>
                    <div class="field-column">
                        <div>
                            <label for="password">Password</label><span id="password_info" class="error-info"></span>
                        </div>
                        <div>
                            <input name="password" id="password" type="password" class="demo-input-box" required>
                        </div>
                    </div>
                    <div class=field-column>
                        <div>
                            <input type="submit" name="login" value="Login" class="btnLogin"></span>
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
            if (userName == "") {
                document.getElementById("user_info").innerHTML = "required";
                $valid = false;
            }
            if (password == "") {
                document.getElementById("password_info").innerHTML = "required";
                $valid = false;
            }
            return $valid;
        }
        </script>
    </body>

    </html>