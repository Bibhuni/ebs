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
    <title>Reset Password</title>
    <link rel="icon" href="img//icon.png">
</head>
<body onload="initClock()">
<?php
    $user_data="SELECT * FROM user WHERE email='$_SESSION[UserLoginId]'";
    $user_datta=mysqli_query($connection,$user_data);
    $row = mysqli_fetch_assoc($user_datta);

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
                      <li><a href="edituser.php">Edit profile</a></li>
                      <li class="default">change Password</li>
                      <li><a href="contactpage.php">Contact Us</a></li>
                      <li><form method="post">
                              <button name="Logout">Signout</button>
                          </form>
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
            <center><form id="update-password" class="login-form" action="userResetPassword.php" method="post">
                <div class="heading">
                    <h2>Reset your password</h2>
                </div>
                <div class="email-input">
                    <p>Old Password</p>
                    <input id="oldpassword" name="oldpassword" type="password">
                </div>
                <div class="email-input">
                    <p>Password</p>
                    <input id="password" name="password" type="password">
                </div>
                <div class="password-input">
                    <p>Re-type Password</p>
                    <input id="re-password" type="password">
                </div>
                <div class="error" id="error"></div>
                <div class="login-bttn">
                    <button class="login-btn" name="update-password">Change password</button>
                </div>
                <div class="description">
                    <p>By enrolling your email, you consent to receive automated security notifications via text message from Omazon. Message and data rates may apply.</p>
                </div>
            </form></center>
        </div></center>
        <a href="home.php"><button class="new-acc-btn">Back to Home</button></a>
    </div></center>    

    <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: index.html");
    }
  ?>

    <script>
        const oldpassword = document.getElementById('oldpassword');
        const password = document.getElementById('password');
        const repassword = document.getElementById('re-password');
        const form = document.getElementById('update-password');
        const errorElement = document.getElementById('error');

        form.addEventListener('submit',(e)=>{
            let message = []
            if(oldpassword.value === '' || oldpassword.value == null){
                message.push('*Enter your oldpassword please.');
            }else if(password.value === '' || password.value == null){
                message.push('*Enter your password please.');
            }else if(password.value != repassword.value){
                message.push('*Password didn not match');
            }else if(password.value.length<5){
                message.push('*Password is too small');
            }
            if(message.length > 0){
                e.preventDefault()
                errorElement.innerText = message.join(',')
            }
        })
    </script>
    <script src="js/dtime.js"></script>
</body>
</html>