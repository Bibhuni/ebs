<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");


session_start();
if(!isset($_SESSION['UserLoginId']))
{
    header("location: Index.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fa11acf629.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/edituser.css">
    <link rel="stylesheet" href="css/topbar.css">
    <title>Document</title>
</head>
<body>
    <?php
    $user_data="SELECT * FROM user WHERE email='$_SESSION[UserLoginId]'";
    $user_datta=mysqli_query($connection,$user_data);
    $row = mysqli_fetch_assoc($user_datta)
    ?>
    <div class="topbarContainer">
        <div class="topbarLeft">
          <span class="logoo">omazon<span>.in</span></span>
          <img src="img/kindpng_5532732.png" class="omazon_logo" alt="">
        </div>
        <div class="topbarCenter">
          <div class="searchbar">
              <input placeholder="Search for your item." class="searchInput" />
              <i class="fa-solid fa-magnifying-glass searchIcon"></i>
          </div>
        </div>
        <div class="topbarRight">
          <div class="topbarLinks">
              <div class="home_name">Hello, <?php echo $row['name'];?>
              <i class="fas fa-caret-down"></i>
              <div class="dropdown_menu">
                  <ul>
                      <li class="default">Edit profile</li>
                      <li><a href="">Order history</a></li>
                      <li><form method="post">
                              <button name="Logout">Signout</button>
                          </form>
                      </li>
                  </ul>
              </div>
              </div>
          </div>
          <i class="fa-solid fa-cart-shopping topbarImg"></i>
        </div>
      </div>
      <center><div class="total">
        <center><div class="main">
            <center><form class="login-form" id="register">
                <div class="heading">
                    <h2>Create Account</h2>
                </div>
                <div class="name-input">
                    <p>Your name</p>
                    <input name="name" type="text">
                </div>
                <div class="email-input">
                    <p>Email</p>
                    <input name="email" type="text">
                </div>
                <div class="password-input">
                    <p>Password</p>
                    <input name="password" type="password">
                </div>
                <div class="login-bttn">
                    <button class="login-btn">Continue</button>
                </div>
                <div class="description">
                    <p>By enrolling your email, you consent to receive automated security notifications via text message from Omazon. Message and data rates may apply.</p>
                </div>
            </form></center>
        </div></center>
        <p class="new-acc"><span>Have an account?</span></p>
        <a href="home.php"><button class="new-acc-btn">Back to Home</button></a>
    </div></center>

    <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: Index.html");
    }

?>
</body>
</html>