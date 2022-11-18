<?php
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

$useremail=$_SESSION['UserLoginId'];


$master_query = "SELECT * FROM articles WHERE category = (SELECT subscriber FROM user WHERE email='".$useremail."')";
$query =("SELECT * FROM articles");

$fa = mysqli_query($connection,$master_query);
$faa = mysqli_query($connection,$query);
?>