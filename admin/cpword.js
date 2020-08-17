 <script>
    $(document).ready(function() {
    var frm = $('#resetform');
    frm.submit(function(e){
        e.preventDefault();

        var formData = frm.serialize();
        formData += '&' + $('#submit_btn').attr('name') + '=' + $('#submit_btn').attr('value');
        $.ajax({
            type: "POST",
            url: "passchange.php",
            data: formData,
            success: function(data){
                var data = JSON.parse(data);
                if(data.statusCode==200){
                    $("#success").show();
                    $('#success').html('Password updated !').delay(3000).fadeOut(3000);
                }
                // console.log('idiot');
                //$('#message').html(data).delay(3000).fadeOut(3000);
            } 
        });
    });
});
    </script>