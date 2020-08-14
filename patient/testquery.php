<form action="my_account.php" method="post">
    Date : <input required type="text" id="datepicker" name="BIRTHDATE">

    <select id="slots" name="slots" ></select>
    <input type="submit" id="form_sendbutton" name="BT_Envoyer" value="Envoyer" />
</form>

<script>

$("#datepicker").on("change", function() {

    if($( "#datepicker" ).val() == ''){
        return false;
    }else{
        var date_book = $( "#datepicker" ).val();
        console.log("champ rempli "+date_book);
        $.ajax({

            type : 'POST',
            url : 'my_account_options.php',
            data : "param="+date_book,
            success : function(data) {
                console.log("ajax success");
                $("#slots").html(data);
            }
        });
    }                   
});

// Datepicker - I added this too to trigger the datepicker.
// It may be different in your code.
$('#datepicker').fdatepicker('yy-mm-dd');

</script>