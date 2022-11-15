<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");
if(isset($_POST['update']))
{
$userid=$_SESSION['UserLoginId'];
$query = "UPDATE user SET name='$_POST[name]',number='$_POST[number]', house='$_POST[house]',street='$_POST[street]', city='$_POST[city]', state='$_POST[state]', pin='$_POST[pin]' WHERE email='$_SESSION[UserLoginId]'";

mysqli_query($connection,$query);

echo"<script>alert('Profile Updated');
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