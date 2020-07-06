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
    include ('./../includes/sidebars/admin_sidebar.php');
    
    ?>
        <main class="main">
            <div class="main_overview">
                <div class="container">



                    <div class="row justify-content-center">


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-black h-100 no-radius text-center"><strong>Change Password</strong></div>

                                <div class="card-body">


                                    <form action="" method="post">
                                       
                                        <div class="form-group">
                                            <label for="current_password"><strong>Current Password:</strong></label>
                                            <input type="password" class="form-control" id="current_password"
                                                name="current_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password"><strong>New Password:</strong></label>
                                            <input type="password" class="form-control" id="new_password"
                                                name="new_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password_confirmation"><strong>Confirm New
                                                    Password:</strong></label>
                                            <input type="password" class="form-control" id="new_password_confirmation"
                                                name="new_password_confirmation">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Change Password</button>
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
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./../assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/bootstrap-4.3.1.js"></script>
</body>
</body>

</html>