<?php require("./../includes/patient_check.php");
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

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header text-center bg-info text-white">Today's Appointment</div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <thead class="table-success">
                                            <tr>
                                                <th scope="col">firstname</th>
                                                <th scope="col">lastname</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">timeslot</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="todayapp-table">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Total appointment by specific patient -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2 bg-info border-warning">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Appointments</div>
                                        </div>
                                        <div class="col-auto h5 mb-0 font-weight-bold text-white">
                                            <?php
                                                    $drid=$_SESSION['drid'];
                                                    $bookings = "SELECT count('booking_id') FROM appointment WHERE doctor_id='$drid'";
                                                    $result=mysqli_query($conn,$bookings);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                    mysqli_close($conn);
                                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            url: "todayapp.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#todayapp-table').html(dataResult);
            }
        });
    });
    </script>
</body>

</html>