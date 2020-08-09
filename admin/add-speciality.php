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
        <main class="main " style="background-image:linear-gradient(to top,#CCFFCC,#CCCCCC);">
            <div class="main_overview">

                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                    </div>
                    <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    </div>
                    <form action="" method="post" id="fupForm">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" id="submit_btn" type="submit">POST</button>
                                <button class="btn btn-info" id="update_btn" type="submit"
                                    style="display:none;">UPDATE</button>
                            </div>
                            <input type="text" class="form-control" placeholder="Add Specialization" id="speciality"
                                name="speciality" value="" required>
                        </div>
                    </form>

                </div>

            </div>
            <hr class="" />

            <div class="col-md-12">
                <div class="card border-info">
                    <!-- <div class="card-header"> Dashboard</div> -->

                    <div class="card-body">

                        <table class="table table-sm table-hover">
                            <thead class="table-success">
                                <tr>

                                    <th scope="col">Speciality Title</th>
                                    <th colspan="2">ACTIONS</>
                                </tr>
                            </thead>
                            <tbody id="speciality-table">

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
    <!-- <script scr="./add-spec.js"></script> -->
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "view_speciality.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#speciality-table').html(dataResult);
            }
        });

        $(document).on("click", ".delete", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "delete_spec.php",
                type: "POST",
                cache: false,
                data: {
                    spec_id: $(this).attr("data-id")
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

        $(document).ready(function() {
            $('#submit_btn').on('click', function() {
                $("#submit_btn").attr("disabled", "disabled");
                var speciality = $('#speciality').val();
                if (speciality != "") {
                    $.ajax({
                        url: "add-spec.php",
                        type: "POST",
                        data: {
                            speciality: speciality
                        },
                        cache: false,
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#submit_btn").removeAttr("disabled");
                                $('#fupForm').find('input:text').val('');
                                $("#success").show();
                                $('#success').html(
                                    'Speciality added successfully !');
                            } else if (dataResult.statusCode == 201) {
                                // alert("Error occured !");
                                $("#error").show();
                                $('#error').html('Speciality already exists !');
                            }

                        }
                    });
                } else {
                    alert('Please fill speciality name field !');
                }
            });
        });


        //Edit specialitie

    });
    </script>
   
</body>
</body>

</html>