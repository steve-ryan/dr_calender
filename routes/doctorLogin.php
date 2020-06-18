<?php
session_start();
$message="";
if(count($_POST)>0) {

    include("./../includes/connection.php");
   
$email=$_POST["name"];
$pass=$_POST["password"];

$sql = "SELECT * FROM admin WHERE email = '$email' and dpassword = '$pass'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row["id"];
$_SESSION["user_email"] = $row["email"];
$_SESSION["user_password"] = $row["dpassword"];
}
 else {
    $message = "<h4 class='alert alert-danger'> <strong>WARNING!</strong> <i>Incorrect Email or Password</i> </h4>";
    echo "<script>setTimeout(\"location.href = './../doctor/login.php';\",1000);</script>";
}
}
if(isset($_SESSION["email"])) {
   echo "<script>setTimeout(\"location.href = './../doctor/dashboard.php';\",10);</script>";
}
?>