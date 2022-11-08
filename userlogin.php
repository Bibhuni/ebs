<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

if(isset($_POST['login']))
{
$query ="SELECT * FROM user WHERE email = '$_POST[email]' AND password ='$_POST[password]'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1)
{
    
    session_start();
    header("location: home.php");
    $_SESSION['UserLoginId']=$_POST['email'];

}
else
{
    echo"<script>alert('Incorrect User name and Password.');
    window.location.href='index.html';
    </script>";
}
}


?>