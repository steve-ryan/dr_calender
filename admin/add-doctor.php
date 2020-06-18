<?php require("./../includes/admin_check.php");?>
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
    

                <div class="col-md-12">
                
                <div class="card add-doctor">
                    <!-- <div class="card-header"> Dashboard</div> -->

                    <div class="card-body">


                        <form action="./../routes/admins/add-doc.php" method="post">
                            <div class="form-row">

                                <div class="form-group col-md-6 add-doctor">
                                    <label for="name"><strong>First name:</strong></label>
                                    <input type="text" class="form-control" id="name" name="firstname"
                                        value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name"><strong>Last name:</strong></label>
                                    <input type="text" class="form-control" id="name" name="lastname"
                                        value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                 <label for="name"><strong>Speciality:</strong></label>
                                <select name="" class="form-control" >
                                        <option disabled="">Choose..</option>
                                        <option value="1">Choose1..</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="name"><strong>Email:</strong></label>
                                <input type="text" class="form-control" id="name" name="email"
                                    value="" required>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="email"><strong>Password:</strong></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="" minlength="6" required>
                            </div>
                              <div class="form-group  col-md-6">
                                <label for="email"><strong>Password:</strong></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="" minlength="6" required>
                            </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
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