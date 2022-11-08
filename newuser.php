<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM user WHERE email='$_POST[email]'";
    $result=mysqli_query($connection,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['email']==$_POST['email'])
            {
                echo"
                <script>
                alert('$result_fetch[email] - Already registered');
                window.location.href='newUser.html';
                </script>
                ";        
            }
        }
        else
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "INSERT INTO user(name, email, password) VALUES ('$name','$email','$password')";
            if(mysqli_query($connection,$query))
            {
                echo"
                <script>
                alert('Registration sucessfull, back to login');
                window.location.href='Index.html';
                </script>
                ";
            }
            else
            {
                echo"
                <script>
                alert('can not run query');
                window.location.href='newUser.html';
                </script>
                ";        
            }
        }
    }
    else
    {
        echo"
        <script>
        alert('can not run query');
        window.location.href='newUser.html';
        </script>
        ";
    }
}


?>