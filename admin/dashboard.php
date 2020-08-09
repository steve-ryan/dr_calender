<?php require("./../includes/admin_check.php");
include ("./database.php");
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
    include ('./../includes/sidebars/admin_sidebar.php');
    ?>
        <main class="main"  style="background-image: url(./../public/doctor_appointment_codecanyon_banner.jpg); background-blend-mode: multiply; background-image:linear-gradient(to top,#CCFFCC,#CCCCCC); background-repeat: repeat; background-attachment: auto width:100%">
            <div class="main_overview">
                <div class="col-md-12">
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 bg-warning border-info">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  <a href="./manage-doctor.php" class="card-link ">Total
                                                Doctors</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    $doctor = "SELECT count('doctor_id') FROM doctor";
                                                    $result=mysqli_query($conn,$doctor);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                    // mysqli_close($conn);
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2 bg-light border-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="./add-speciality.php" class="card-link ">
                                                Specialities</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    $speciality = "SELECT count('spec_id') FROM speciality";
                                                    $result=mysqli_query($conn,$speciality);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                    // mysqli_close($conn);
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2 bg-light border-dark">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> <a href="./manage-patient.php" class="card-link ">Total
                                                Patients</a></div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                    $patient = "SELECT count('patient_id') FROM patient";
                                                    $result=mysqli_query($conn,$patient);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                    mysqli_close($conn);
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2 bg-success border-warning">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Appointments</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <br />
                <br />

                <div class="col-md-12">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-header text-center bg-info text-white">Latest's Patient</div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <thead class="table-success">
                                            <tr>
                                                <th scope="col">Firstname</th>
                                                <th scope="col">Lastname</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody id="latest-patient-table">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                            <div class="card-header text-center bg-light text-warning">Today's Appointment</div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <thead class="table-success">
                                            <tr>

                                                <th scope="col">#ID</th>
                                                <th scope="col">Patient name</th>
                                                <th scope="col">Doctor name</th>
                                                <th scope="col">Time</th>
                                            </tr>
                                        </thead>
                                        <tbody id="doctor-table">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./../assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/bootstrap-4.3.1.js"></script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "view-latest-patient.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#latest-patient-table').html(dataResult);
            }
        });
    });
    </script>
</body>

</html>