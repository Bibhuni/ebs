<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");
$userid=$_SESSION['UserLoginId'];

$user_data="SELECT * FROM user WHERE email='$userid'";
$user_datta=mysqli_query($connection,$user_data);
$row = mysqli_fetch_assoc($user_datta);
$oldpassword = $row['password'];

$password=$_POST['password'];
$password=mysqli_real_escape_string($connection,$password);
$password=md5($password);


if(isset($_POST['update-password']))
{
    if($oldpassword != $password){
        echo"<script>alert('Incorrect Password.');
        window.location.href='user_reset_password.php';
        </script>";    
    }else{

        $query = "UPDATE user SET password='$password' WHERE email='$userid'";

        mysqli_query($connection,$query);

        echo"<script>alert('Password changed.');
        window.location.href='home.php';
        </script>";
            //session_start();
            //$_SESSION['AdminLoginId']=$_POST['admin_name'];
            //header("location: adminpannelphp.php");
        }
    }
else{
    echo "Failed";
}
?>