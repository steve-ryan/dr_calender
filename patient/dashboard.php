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
    include ('./../includes/patient_sidebar.php');
    ?>
        <main class="main">
            <div class="main_overview">

                <div class="row">
                    <div class="">
                        <div>
                            <div class="dashboard">
                                <div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have
                                    successfully logged in!<br>
                                    Click to <a href="./logout.php" class="logout-button">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
</body>

</html>