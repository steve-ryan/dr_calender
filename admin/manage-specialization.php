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
                        <div class="card-header"> Dashboard</div>

                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th scope="col">PROJECT TITLE</th>
                                        <th colspan="2">ACTIONS</>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td>{{$project}}</td>
                                        <td><a href="#" class="btn btn-primary btn-xs">Edit</a></td>
                                        <td><a href="#" class="btn btn-danger btn-xs">Delete</a></td>
                                    </tr>


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
</body>
</body>

</html>