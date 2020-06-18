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
                        <div class="card-header">Specialization</div>
                        <div class="card-body">
                            <form action="./../routes/admins/add-spe.php" method="post">
                                <div class="form-group">
                                    <label for="name"><strong>Add Specialization:</strong></label>
                                    <input type="text" class="form-control" id="name" name="specname" value="" required>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
</body>

</html>