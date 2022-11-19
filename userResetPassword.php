<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");


if(isset($_POST['update-password']))
{
$userid=$_SESSION['UserLoginId'];
$query = "UPDATE user SET password='$_POST[password]' WHERE email='$userid'";

mysqli_query($connection,$query);

echo"<script>alert('Password changed.');
window.location.href='home.php';
</script>";
    //session_start();
    //$_SESSION['AdminLoginId']=$_POST['admin_name'];
    //header("location: adminpannelphp.php");

}
else{
    echo "Failed";
}


?>