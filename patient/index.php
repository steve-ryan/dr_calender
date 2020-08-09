<?php
session_start();
if(!empty($_SESSION["pid"])) {
    require_once './dashboard.php';
}
?>
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./../assets/css/form/main-style.css" type="text/css"
	rel="stylesheet" />
<link href="./../assets/css/form/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="./../assets/js/jquery.js" type="text/javascript"></script>
    </head>
    <body style="background-image: url(./../public/bg-row-2.jpg);  background-repeat: no-repeat; background-attachment: fixed" >
	<div class="main-container">
	<?php require_once "login-form.php";?>
	</div>
        
    </body>
</html>