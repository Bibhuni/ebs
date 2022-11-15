<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

$name = $_POST['name'];
$email = $_POST['email'];
$concern = $_POST['concern'];
$message = $_POST['message'];

$query = "INSERT INTO contactus(name, email, concern, message) VALUES ('$name','$email','$concern', '$message')";

if(mysqli_query($connection,$query)){
    echo"
    <script>
    alert('Concern raised');
    window.location.href='home.php';
    </script>
    ";        
}
else{
    echo"
    <script>
    alert('Failed!!!');
    window.location.href='contactpage.php';
    </script>
    ";
}
?>