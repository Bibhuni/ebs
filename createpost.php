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
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/edituser.css">
    <title>Create new article</title>
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
                    <li><a href="user_reset_password.php">change Password</a></li>
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
            <center><form class="login-form" id="post_article" action="create_post.php" method="post" enctype="multipart/form-data">
                <div class="heading">
                    <h2>Create a post</h2>
                </div>
                <div class="name-input">
                    <p>Subject</p>
                    <input name="headline" type="text" required>
                </div>
                <div class="email-input">
                    <p>Subtext</p>
                    <input name="subtext" type="text" required>
                </div>
                <div class="email-input">
                    <p>Category</p>
                    <select name="category" type="text" required>
                        <option value="" selected disabled>--Select Category--</option>
                        <option value="tech">Tech</option>
                        <option value="sports">Sports</option>
                        <option value="business">Business</option>
                    </select>
                </div>
                <div class="email-input">
                    <p>Content</p>
                    <textarea name="detailed" autocomplete="off" id="" cols="30" rows="10" placeholder="Your Message." required></textarea>
                </div>
                <div class="password-input">
                    <p>Image</p>
                    <input type="file" name="image" >
                    <?php if (isset($_GET['error'])): ?>
                        <p><?php echo $_GET['error']; ?></p>
                    <?php endif ?>
                </div>
                <div class="login-bttn">
                    <button type="submit" name="post_article" class="login-btn">Continue</button>
                </div>
            </form></center>
        </div></center>
        <a href="home.php"><button class="new-acc-btn">Back to Home</button></a>
    </div></center>
    <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: Index.html");
    }
  ?>
<script src="js/dtime.js"></script>
</body>
</html>