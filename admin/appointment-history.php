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
                    <div class="card">
                        <div class="card-header text-center bg-light text-success">Appointment History</div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead class="table-success">
                                    <tr>

                                        <th scope="col">#ID</th>
                                        <th scope="col">Patient name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">YOB</th>
                                        <th scope="col">Doctor name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="appointment-table">


                                </tbody>
                            </table>
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
        $.ajax({
            url: "appointment.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#appointment-table').html(dataResult);
            }
        });
    });
    </script>
</body>
</html>