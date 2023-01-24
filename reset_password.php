<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");
$password=$_POST['password'];
$password=mysqli_real_escape_string($connection,$password);
$password=md5($password);

if(isset($_POST['update-password']))
{
$userEmail = $_POST['email'];
$query = "UPDATE user SET password='$password' WHERE email='$userEmail'";

mysqli_query($connection,$query);

echo"<script>alert('Password changed.');
window.location.href='index.html';
</script>";
    //session_start();
    //$_SESSION['AdminLoginId']=$_POST['admin_name'];
    //header("location: adminpannelphp.php");

}
else{
    echo "Failed";
}


?>