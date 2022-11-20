<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

$squery= "SELECT * FROM user WHERE email='$_SESSION[UserLoginId]'";
$subquery = mysqli_query($connection,$squery);
$row = mysqli_fetch_assoc($subquery);
$subscriber = $_POST['subscriber'];


if(isset($_POST['tech']))
{
    if($row['subscriber'] === $subscriber){
        echo"<script>alert('you are already a Tech subscriber');
        window.location.href='home.php';
        </script>";
    
    }else{
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='tech' WHERE email='$_SESSION[UserLoginId]'";

    mysqli_query($connection,$query);

    echo"<script>alert('Thanks for subscription to Tech Omazon');
    window.location.href='home.php';
    </script>";
    }
}
else if(isset($_POST['sports'])){
    if($row['subscriber'] === $subscriber){
        echo"<script>alert('you are already a Sports subscriber');
        window.location.href='home.php';
        </script>";
    
    }else{
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='sports' WHERE email='$_SESSION[UserLoginId]'";
    
    mysqli_query($connection,$query);
    
    echo"<script>alert('Thanks for subscription to Omazon Sports');
    window.location.href='home.php';
    </script>";
    }    
}
else if(isset($_POST['business'])){
    if($row['subscriber'] === $subscriber){
        echo"<script>alert('you are already a Business subscriber');
        window.location.href='home.php';
        </script>";
    
    }else{
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='business' WHERE email='$_SESSION[UserLoginId]'";
    
    mysqli_query($connection,$query);
    
    echo"<script>alert('Thanks for subscription to Omazon Bussiness');
    window.location.href='home.php';
    </script>";
    }    
}
else if(isset($_POST['all'])){
    if($row['subscriber'] === $subscriber){
        echo"<script>alert('you are already a Gold subscriber');
        window.location.href='home.php';
        </script>";
    
    }else{
    $userid=$_SESSION['UserLoginId'];
    $query = "UPDATE user SET subscriber='all' WHERE email='$_SESSION[UserLoginId]'";
    
    mysqli_query($connection,$query);
    
    echo"<script>alert('Thanks for subscription to Omazon');
    window.location.href='home.php';
    </script>";
    }   
}
else{
    echo "Failed";
}
?>