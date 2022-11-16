<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");
if(isset($_POST['tech']))
{
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='1' WHERE email='$_SESSION[UserLoginId]'";

    mysqli_query($connection,$query);

    echo"<script>alert('Thanks for subscription to Tech Omazon');
    window.location.href='home.php';
    </script>";
}
else if(isset($_POST['sports'])){
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='2' WHERE email='$_SESSION[UserLoginId]'";
    
    mysqli_query($connection,$query);
    
    echo"<script>alert('Thanks for subscription to Omazon Sports');
    window.location.href='home.php';
    </script>";    
}
else if(isset($_POST['business'])){
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='3' WHERE email='$_SESSION[UserLoginId]'";
    
    mysqli_query($connection,$query);
    
    echo"<script>alert('Thanks for subscription to Omazon Bussiness');
    window.location.href='home.php';
    </script>";    
}
else if(isset($_POST['all'])){
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='4' WHERE email='$_SESSION[UserLoginId]'";
    
    mysqli_query($connection,$query);
    
    echo"<script>alert('Thanks for subscription to Omazon');
    window.location.href='home.php';
    </script>";    
}
else{
    echo "Failed";
}
?>