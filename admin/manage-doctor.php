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
                       <thead class="table-info">
                           <tr>
                               <th scope="col">ID</th>
                                <th scope="col">First_name</th>
                            <th scope="col">Last_name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Age</th>
                                 <th colspan="3">ACTIONS</th>
                           </tr>
                       </thead>
                       <tbody>
                                <tr>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td>dummy</td>
                                <td><a href="#" class="btn btn-warning btn-xs">Suspend</a></td>
                                <td><a href="#" class="btn btn-danger btn-xs">Delete</a></td>
                                <td><a href="#" class="btn btn-success btn-xs">Unsuspend</a></td>
                                </td>
                            </tr>
                    
                            
                       </tbody>
                   </table>
                </div>
            </div>    
            </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
</body>

</html>
               
            </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
</body>

</html>