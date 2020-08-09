<?php require("./../includes/admin_check.php");
include ("./database.php");

?>

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
        <main class="main"
            style="background-image: url(./../public/managedoc.jpeg); background-blend-mode: luminosity; background-repeat: no-repeat; background-image:linear-gradient(to top,#CCFFCC,#CCCCCC); background-attachment: fixed">
            <div class="main_overview">


                 <div class="col-md-12">

                    <div class="card border-success ">

                        <!-- <div class="card-header"> Dashboard</div> -->

                        <div class="card-body ">
                            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                            </div>

                            <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                            </div>

                            <form action="" method="post" id="fupForm" name="form1">
                                <div class="form-row">

                                    <div class="form-group col-md-4 ">
                                        <label for="name"><strong>First name:</strong></label>
                                        <input type="text" class="form-control border-info" id="firstname"
                                            name="firstname" value="" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name"><strong>Last name:</strong></label>
                                        <input type="text" class="form-control border-info" id="lastname"
                                            name="lastname" value="">
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-9">
                                        <label for="name"><strong>Speciality:</strong></label>
                                        <select name="speciality" id="speciality" class="form-control border-warning">
                                            <option disabled="">Choose..</option>
                                            <?php
                      $sql = mysqli_query($conn, "SELECT spec_id ,spec_name FROM speciality ORDER BY spec_id ASC");
                         $row = mysqli_num_rows($sql);
                       while ($row = mysqli_fetch_array($sql)){
                      echo "<option value='". $row['spec_id'] ."'>" .$row['spec_name'] ."</option>" ;

                       }
                       
                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="name"><strong>Email:</strong></label>
                                        <input type="text" class="form-control border-info" id="email" name="email"
                                            value="" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="email"><strong>Password:</strong></label>
                                        <input type="password" class="form-control border-primary" id="password"
                                            name="password" value="" minlength="6" required>
                                    </div>
                                    <div class="form-group  col-md-4">
                                        <label for="email"><strong>Password:</strong></label>
                                        <input type="password" class="form-control border-success" id="confirmpassword"
                                            name="confirmpassword" value="" minlength="6" required>
                                    
                                    </div>
                                    <div class="form-group  col-md-4">
                                    <div class="registrationFormAlert" style="color:orange;" id="checkPasswordMatch">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script src="./../assets/js/jquery.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/bootstrap-4.3.1.js"></script>
    <script>
    $(document).ready(function() {
        $('#submit').click(function() {
            $('#submit').attr("disabled", "disabled");
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var speciality = $('#speciality').val();
            var email = $('#email').val();
            var password = $('#password').val();
            // var confirmPwd = $("#confirmpassword").val();

            if (firstname != "" && lastname != "" && speciality != "" && email != "" && password !=
                "") {
                $.ajax({
                    url: "register-doc.php",
                    type: "POST",
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                        speciality: speciality,
                        email: email,
                        password: password
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            console.log("hello");
                            $('#submit').removeAttr("disabled");
                            // $('#fupForm').find('input:text').val('');
                            $('#fupForm')[0].reset();
                            $("#success").show();
                            $('#success').html('Doctor added successfully !');
                        
                        } else if (dataResult.statusCode == 201) {
                            // alert("Error occured !");
                            $("#error").show();
                            $('#error').html('Email ID already exists !');
                        }

                    }
                });
            } else {
                alert('Please fill all the field !');
            }
        });

    });
    </script>
  

</body>
</body>

</html>