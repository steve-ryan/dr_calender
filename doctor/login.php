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
    
      <form method="post" action="./../routes/doctorLogin.php" >
      <h2>Doctor Login</h2>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="name" value="" placeholder="Username or Email address" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" value="" placeholder="password" required>
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="login" >Login</button>
		</div>
	</form>
        <script src="" async defer></script>
    </body>
</html>