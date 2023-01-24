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
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/form.css">
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
          <span class="logoo">newswall<span>.in</span></span>
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
      <section class="details">
        <h1>Welcome to the Portal!</h1>
        <div class="oth-details">
          <form id="update-password" class="left-form" action="userResetPassword.php" method="post">
            <div class="row-input">
              <div class="col-input">
                <label>Old Password</label>
                <input id="oldpassword" name="oldpassword" type="password">
              </div>
            </div>
            <div class="row-input">
              <div class="col-input">
                <label>New Password</label>
                <input id="password" name="password" type="password">
              </div>
            </div>
            <div class="row-input">
              <div class="col-input">
                <label>re-type New Password</label>
                <input id="re-password" type="password">
              </div>
            </div>
            <div class="row-input btn">
                <button name="update-password">Change password</button>
              <a href="home.php"><button type="button">Back to Home</button></a>
            </div>
            <div class="error" id="error"></div>
          </form>
        </div>
    </section>
    <section class="ex-details">
        <div class="about-details">
            <h1>About the Project</h1>
            <p>There are two modules in this portal: (1) Adminstrator and (2) User.</p>
            <p>The Adminstrator module facilitates mainly two things: Management of Articles and Management Users. The details of
                subscription to portal can be viwed through Adminstrator Module.
            </p>
            <p>The user module allows a user to view various subscription plans, subscribe to the respective plan and get access to the exclusive
                related contents.
            </p>
            <p class="payment-details">
                Use any 16 digit number as card number in payment page and 199 or 254 for cvv to proceed payment all other credentials can be skipped.
            </p>
        </div>
        <div class="bottom-left">
        <div class="more-details">
            <h1>More Info</h1>
            <ul>
                <li><a href="https://github.com/Bibhuni">GitHub</a></li>
                <li><a href="https://bibhu-ni.netlify.app/">Portfolio</a></li>
                <li><a href="https://www.linkedin.com/in/bibhu-ni/">Linked In</a></li>
            </ul>
        </div>
        <div class="contact-details">
            <h1>Contact</h1>
            <ul>
                <li>Bharati Vidyapeeth, Paschim Vihar, New Delhi</li>
                <li>bibhuprasad. s1mca21@bvicam.in</li>
            </ul>
        </div>
    </div>
    </section>
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