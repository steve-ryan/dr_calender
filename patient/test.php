<?php 
if(!empty($_POST)){
    $country = $_POST['userCountry'];
    $ip = $_POST['userIp'];

    echo $country;
    echo $ip;
}
?>

<html>
<head><title></title>
    <script src = "./../assets/js/jquery.js"></script>
    <script>
        $(document).ready(function(){
        $.getJSON("http://freegeoip.net/json/", function(data) {
            var country = data.country_name;
            var ip = data.ip;
            $.ajax({
                method:"POST",
                url:"test.php",
                data:{userCountry:country, userIp:ip},
                success:function(result){
                    $('body').html(result);
                }

            });
           });
        });
    </script>
</head>
<body></body>
</html>