<?php 
include ('./../includes/admin_check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
    <script src="./../assets/js/changepassword.js" type="text/javascript"></script>
</head>

<body>
    <div class="grid-container">

        <?php

    // session_start();
    include ('./../includes/sidebars/admin_sidebar.php');
    include 'database.php';

    //change password script
    if(isset($_POST['submit']))
            {
             $oldpass=md5($_POST['currentPassword']);
            $_SESSION['name'];
             $newpassword=md5($_POST['newPassword']);
             $sql=mysqli_query($conn,"SELECT password FROM admin WHERE password='$oldpass' && username ='".$_SESSION['name']."'");
             $num=mysqli_fetch_array($sql);
             if($num>0)
             {
                 $conn=mysqli_query($conn,"UPDATE admin SET password=' $newpassword' where username ='".$_SESSION['name']."'");
                 $_SESSION['success']="Password Changed Successfully !!";
                }
                else
                {
                    $_SESSION['danger']="Old Password not match !!";
                }
            }
            
echo $_SESSION['name'];
// echo $admin_id;
    ?>

        <main class="main" style="background-image:linear-gradient(to top,#CCFFCC,#CCCCCC);">
            <div class="main_overview">
                <div class="container">



                    <div class="row justify-content-center">


                        <div class="col-md-12">
                            <div class="card">

                                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                                    <a href="#" class="close" data-dismiss="alert"
                                        aria-label="close"><?php echo $_SESSION['success'];?>x</a>
                                </div>

                                <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                                <?php echo $_SESSION['danger'];?>
                                    <a href="#" class="close" data-dismiss="alert"
                                        aria-label="close"><?php echo $_SESSION['danger'];?>x</a>
                                </div>
                                <div class="card-header text-black h-100 no-radius text-center"><strong>Change
                                        Password</strong></div>

                                <div class="card-body">


                                    <form name="frmChange" method="post" action=""
                                        onSubmit="return validatePassword();">

                                        <div class="form-group">
                                            <label for="current_password"><strong>Current Password:</strong></label>
                                            <input type="password" class="form-control" id="currentPassword"
                                                name="currentPassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password"><strong>New Password:</strong></label>
                                            <input type="password" class="form-control" id="newPassword"
                                                name="newPassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password_confirmation"><strong>Confirm New
                                                    Password:</strong></label>
                                            <input type="password" class="form-control" id="confirmPassword"
                                                name="confirmPassword">
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