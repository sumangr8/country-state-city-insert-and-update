<?php
include("db.php");
extract($_POST);
$password=md5($_POST["password"]);
$con=mysqli_query($con,"insert into student (name,email,password,mobile,country,state,city) values('$name','$email','$password','$mobile','$country','$state','$city')");

?>
