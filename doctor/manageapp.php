<?php require("./../includes/doctor_check.php");
include ("./../database/config.php");
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
    <script src="./../assets/js/popper.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="grid-container">

        <?php
    include ('./../includes/sidebars/doctor_sidebar.php');
    ?>
        <main class="main"
            style="background-image: url(./../public/doctor_appointment_codecanyon_banner.jpg); background-blend-mode: multiply; background-image:linear-gradient(to top,#CCFFCC,#CCCCCC); background-repeat: repeat; background-attachment: auto width:100%">
            <div class="main_overview">
                <div class="col-md-12">
                    <div class="card border-info">
                        <div class="card-header text-black h-100 no-radius text-center  border-success"> Manage
                            Appointments
                        </div>

                        <div class="card-body ">
                            <table class="table table-sm">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Firstname</th>
                                        <th scope="col">Lastname</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Cancel</th>
                                    </tr>
                                </thead>
                                <tbody id="mappointments">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script src="./../assets/js/jquery.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/bootstrap-4.3.1.js"></script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "mappointments.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#mappointments').html(dataResult);
            }
        });
        //cancel button
        $(document).on("click", ".cancel", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "cancelbooking.php",
                type: "POST",
                data: {
                    booking_id: $(this).attr("data-id")
                },
                success: function(dataResult) {
                    if (dataResult == 0) {
                        $('#sts' + booking_id).html('Cancelled').css('color', 'red');
                    }
                }
            });
        });
    });
    </script>

</body>

</html>