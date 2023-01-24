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
    <link rel="stylesheet" href="css/sports.css">
    <title>Articles</title>
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
<div>
    <?php
    if ($row['subscriber']=='admin') { ?>
            <?php include('get_featured_articles_sports.php'); ?>
          <section class="sports">
            <div class="sports-container">
              <center><div class="caard-wrapper">
                <?php while($roww = mysqli_fetch_assoc($faa)){?>
                <a href="<?php echo "single_article_manage.php?id=". $roww['id'];?>">
                <div class="caard">
                  <div class="img-wrapper">
                    <img src="article_img/<?php echo $roww['image']?>" alt="img">
                  </div>
                  <div class="caard-content">
                      <h1><?php echo $roww['headline']?></h1>
                    <span><?php echo $roww['date']?></span>
                  </div>
                </div>
                </a>
                <?php }?>
              </div></center>
            </div>
          </section>
          <?php }?>
          </div>
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