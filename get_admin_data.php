<?php
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

$useremail=$_SESSION['UserLoginId'];


$users_query = "SELECT COUNT(*) AS total_user FROM user WHERE subscriber NOT IN ('admin')";
$subscribed_user = "SELECT COUNT(*) AS total_subscriber FROM user WHERE subscriber NOT IN ('nsubscribe','admin')";
$tech_user = "SELECT count(*) AS tech_subscriber FROM user WHERE subscriber='tech'";
$sports_user = "SELECT count(*) AS sports_subscriber FROM user WHERE subscriber='sports'";
$business_user = "SELECT count(*) AS business_subscriber FROM user WHERE subscriber='business'";
$gold_user = "SELECT count(*) AS gold_subscriber FROM user WHERE subscriber='all'";




$article_query = "SELECT count(*) AS total_articles FROM articles";
$tech_article = "SELECT count(*) AS tech_articles FROM articles WHERE category='tech'";
$sports_article = "SELECT count(*) AS sports_articles FROM articles WHERE category='sports'";
$business_article = "SELECT count(*) AS business_articles FROM articles WHERE category='business'";


$uq = mysqli_query($connection,$users_query);
$su = mysqli_query($connection,$subscribed_user);
$tu = mysqli_query($connection,$tech_user);
$spu = mysqli_query($connection,$sports_user);
$bu = mysqli_query($connection,$business_user);
$gu = mysqli_query($connection,$gold_user);

$aq = mysqli_query($connection,$article_query);
$ta = mysqli_query($connection,$tech_article);
$sa = mysqli_query($connection,$sports_article);
$ba = mysqli_query($connection,$business_article);
?>