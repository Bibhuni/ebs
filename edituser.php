<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");


session_start();
if(!isset($_SESSION['UserLoginId']))
{
    header("location: index.html");
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
    <title>Update profile</title>
    <link rel="icon" href="img//icon.png">
</head>
<body onload="initClock()">
    <?php
    $user_data="SELECT * FROM user WHERE email='$_SESSION[UserLoginId]'";
    $user_datta=mysqli_query($connection,$user_data);
    $row = mysqli_fetch_assoc($user_datta)
    ?>
    <div class="topbarContainer">
        <div class="topbarLeft">
        <a href="home.php" class="topbarLeft">
          <span class="logoo">omazon<span>.in</span></span>
          <img src="img/kindpng_5532732.png" class="omazon_logo" alt="">
        </a>
        </div>
        <div class="topbarRight">
          <div class="topbarLinks">
              <div class="home_name">Hello, <?php echo $row['name'];?>
              <i class="fas fa-caret-down"></i>
              <div class="dropdown_menu">
                  <ul>
                      <li class="default">Edit profile</li>
                      <li><a href="user_reset_password.php">change Password</a></li>
                      <li><a href="contactpage.php">Contact Us</a></li>
                      <li><form method="post">
                              <button name="Logout">Signout</button>
                          </form>
                          <?php
                                if(isset($_POST['Logout']))
                                {
                                session_destroy();
                                header("location: index.html");
                                }
                            ?>

                      </li>
                  </ul>
              </div>
              </div>
          </div>
          <div class="date-time">
            <div class="date">
                <span id="dayname">Day</span>
                <span id="month">Month</span>
                <span id="daynum">00</span>,
                <span id="year">Year</span>    
            </div>
            <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>    
            </div>
        </div>
        </div>
      </div>
      <center><div class="total">
        <center><div class="main">
            <center><form id="update" class="login-form" action="updateuser.php" method="post">
                <div class="heading">
                    <h2>Update your account</h2>
                </div>
                <div class="name-input">
                    <p>Your name</p>
                    <input name="name" id="uname" type="text" value="<?php echo $row['name'];?>">
                </div>
                <div class="email-input">
                    <p>Number</p>
                    <input name="number" id="unumber" type="text" value="<?php echo $row['number'];?>">
                </div>
                <div class="email-input">
                    <p>House no./Flat name</p>
                    <input name="house" id="house" type="text" value="<?php echo $row['house'];?>">
                </div>
                <div class="email-input">
                    <p>Street name</p>
                    <input name="street" id="street" type="text" value="<?php echo $row['street'];?>">
                </div>
                <div class="email-input">
                    <p>City</p>
                    <input name="city" id="city" type="text" value="<?php echo $row['city'];?>">
                </div>
                <div class="email-input">
                    <p>State</p>
                    <input name="state" id="state" type="text" value="<?php echo $row['state'];?>">
                </div>
                <div class="password-input">
                    <p>Pin</p>
                    <input name="pin" id="pin" type="number" value="<?php echo $row['pin'];?>">
                </div>
                <div id="error"></div>
                <div class="login-bttn">
                    <button class="login-btn" name="update">Continue</button>
                </div>
                <div class="description">
                    <p>By enrolling your email, you consent to receive automated security notifications via text message from Omazon. Message and data rates may apply.</p>
                </div>
            </form></center>
        </div></center>
        <a href="home.php"><button class="new-acc-btn">Back to Home</button></a>
    </div></center>
<script src="js/dtime.js"></script>
</body>
</html>