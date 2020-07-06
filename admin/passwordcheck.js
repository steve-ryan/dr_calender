  <script>
    function checkPasswordMatch() {
        var password = $('#password').val();
            var confirmPwd = $("#confirmpassword").val();

            if(password != confirmPwd){
                $("#checkPasswordMatch").html("Passwords does not match!");
            }
            else{

            $("#checkPasswordMatch").html("Passwords match!");
            }

    }
    $(document).ready(function(){
        $("confirmpassword").keyup(checkPasswordMatch);
    });
    </script>