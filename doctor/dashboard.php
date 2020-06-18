<?php require("./../includes/doctor_check.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
</head>

<body>
    <div class="grid-container">

        <?php
    include ('./../includes/sidebars/doctor_sidebar.php');
    
    ?>
        <main class="main">
            <div class="main_overview">


                <div class="alert">
                    <?php
if($_SESSION["name"]) {
?>
                    Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
                        <?php
}else echo "<h1>Please login first .</h1>";
?>
                </div>

            </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
</body>

</html>