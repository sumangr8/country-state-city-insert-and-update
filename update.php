<?php
include("db.php");
$sid=$_REQUEST["sid"];
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$mobile=$_REQUEST["mobile"];
$country=$_REQUEST["country"];
$state=$_REQUEST["state"];
$city=$_REQUEST["city"];
$qry=mysqli_query($con,"update student set name='$name',email='$email',mobile='$mobile',country='$country',state='$state',city='$city' where sid='$sid'");
?>