<?php
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

$tech_query =("SELECT * FROM articles WHERE category=1");
$sports_query =("SELECT * FROM articles WHERE category=2");
$business_query =("SELECT * FROM articles WHERE category=3");
$query =("SELECT * FROM articles");

$fta = mysqli_query($connection,$tech_query);
$fsa = mysqli_query($connection,$sports_query);
$fba = mysqli_query($connection,$business_query);
$fa = mysqli_query($connection,$query);
?>