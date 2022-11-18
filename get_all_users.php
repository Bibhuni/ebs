<?php
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

$master_query = "SELECT * FROM user WHERE subscriber NOT IN ('admin')";

$aluser = mysqli_query($connection,$master_query);
?>