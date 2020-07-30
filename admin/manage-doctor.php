<?php require("./../includes/admin_check.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="./../assets/css/all.css">
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
</head>

<body>
    <div class="grid-container">

        <?php
    include ('./../includes/sidebars/admin_sidebar.php');
    ?>
        <main class="main" style="background-image: url(./../public/managedoc.jpeg); background-blend-mode: luminosity; background-repeat: no-repeat; background-image:linear-gradient(to top,#CCFFCC,#CCCCCC); background-attachment: fixed">
            <div class="main_overview">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-black h-100 no-radius text-center"> Manage Doctors</div>

                        <div class="card-body">
                            <table class="table table-sm">
                                <thead class="table-success">
                                    <tr>

                                        <th scope="col">#ID</th>
                                        <th scope="col">firstname</th>
                                        <th scope="col">lastname</th>
                                        <th scope="col">speciality</th>
                                        <th scope="col">email address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Change status</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="doctor-table">


                                </tbody>
                            </table>
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
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "view_doctor.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#doctor-table').html(dataResult);
            }
        });
        $(document).on("click", ".delete", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "delete_ajax.php",
                type: "POST",
                cache: false,
                data: {
                    doctor_id: $(this).attr("data-id")
                },
                success: function(dataResult) {
                    console.log("success");
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $ele.fadeOut().remove();
                    }
                }
            });
        });
    });
    </script>

   <script>
   function active_inactive_doc(val,doctor_id){
    $.ajax({
        type:'POST',
        url:'status_ajax.php',
        data:{val:val,doctor_id:doctor_id},
        success:function(result){
            // console.log(result);
            if (result==1) {
                $('#sts'+doctor_id).html('Active').css('color','green');

            }else{
                $('#sts'+doctor_id).html('Inactive').css('color','red');
            }
        }
    });
   }
    </script>
</body>
