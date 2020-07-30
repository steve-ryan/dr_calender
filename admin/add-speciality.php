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

            <!-- Modal -->
<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="name_u" name="name" class="form-control" required>
						</div>				
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
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
    <script>
    // $(document).ready(function() {
                $('.editbtn').click(function() {
                            var $this = $(this);
                            var tds = $this.closest('tr').find('td').filter(function() {
                                return $(this).find('.editbtn').length === 0;
                            });
                            if ($this.html() === 'Edit') {
                                $this.html('Save');
                                tds.prop('contenteditable', true);
                            } else {
                                $this.html('Updating..');
                                $this.attr('disabled', true);
                                $.ajax({
                                        type: 'POST',
                                        url: 'update.php',
                                        data: {
                                            // spec_id: $(this).attr("data-id")
                                            speciality:speciality
                                        }).success(function(data) {
                                            console.log("crazy");
                                        $this.attr('disabled', false);
                                        $this.html('Edit');
                                        tds.prop('contenteditable', false);
                                        // request success, do what you want to do here
                                    }).error(function() {
                                        // request error
                                    });

                                }
                            // });
    </script>
    <script>

    $(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var email=$(this).attr("data-email");
		var phone=$(this).attr("data-phone");
		var city=$(this).attr("data-city");
		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#email_u').val(email);
		$('#phone_u').val(phone);
		$('#city_u').val(city);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editEmployeeModal').modal('hide');
						alert('Data updated successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
    </script>

</body>
</body>

</html>