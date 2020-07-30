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
        <main class="main" style="background-image:linear-gradient(to top,#CCFFCC,#CCCCCC);">
            <div class="main_overview">
                <div class="col-md-12">
                    <div class="card border-info">
                        <div class="card-header text-black h-100 no-radius text-center  border-success"> Manage Patients</div>

                        <div class="card-body ">
                            <table class="table table-sm">
                                <thead class="table-success">
                                    <tr>

                                        <th scope="col">#ID</th>
                                        <th scope="col">Firstname</th>
                                        <th scope="col">Lastname</th>
                                        <th scope="col">Y.O.B</th>
                                        <th scope="col">Email address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Change status</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="patient-table">


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
            url: "view_patient.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#patient-table').html(dataResult);
            }
        });
        $(document).on("click", ".delete", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "patient_delete_ajax.php",
                type: "POST",
                cache: false,
                data: {
                    patient_id: $(this).attr("data-id")
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
   function active_inactive_doc(val,patient_id){
    $.ajax({
        type:'POST',
        url:'patient_status_ajax.php',
        data:{val:val,patient_id:patient_id},
        success:function(result){
            // console.log(result);
            if (result==1) {
                $('#sts'+patient_id).html('Active').css('color','green');

            }else{
                $('#sts'+patient_id).html('Inactive').css('color','red');
            }
        }
    });
   }
    </script>
</body>
