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
    <script src="https://kit.fontawesome.com/fa11acf629.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/homeContain.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/nosubscriber.css">
    <link rel="stylesheet" href="css/sports.css">
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
        <a href="home.php" class="topbarLeft">
            <span class="logoo">omazon<span>.in</span></span>
            <img src="img/kindpng_5532732.png" class="omazon_logo" alt="">
        </a>
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
                    <li><a href="edituser.php">Edit profile</a></li>
                    <li><a href="">Order history</a></li>
                    <li><a href="contactpage.php">Contact Us</a></li>
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
    <div class="topbar2">
      <i class="fas fa-map-marker-alt"></i>
      <p class="topbar-city"><b><?php echo $row['city'];?>,</b></p>
      <p class="topbar-state"><?php echo $row['state'];?>, </p>
      <p class="topbar-pin"><?php echo $row['pin'];?></p>
    </div>


    <?php if ($row['subscriber']==0) { ?> 
    <div class="no-subscriber">
      <div class="main-card">
        <div class="card">
          <img src="img/technology.jpg" alt="">
          <div class="card-text">
            <h2>Tech</h2>
            <p>Get access to exclusive articles of latest technology and its related stuffs.</p>
          </div>
          <div class="card-stats">
            <form class="stats-btn" action="subscribe.php" id="tech" method="post">
              <button name="tech">Subscribe</button>
            </form>
          </div>
        </div>
        <div class="card">
          <img src="img/sports.jpg" alt="">
          <div class="card-text">
            <h2>Sports</h2>
            <p>Get access to exclusive sports articles and its related stuffs.</p>
          </div>
          <div class="card-stats">
            <form class="stats-btn" action="subscribe.php" id="sports" method="post">
              <button name="sports">Subscribe</button>
            </form>
          </div>
        </div>
        <div class="card">
          <img src="img/business.jpg" alt="">
          <div class="card-text">
            <h2>Business</h2>
            <p>Get access to exclusive articles of Business related stuffs.</p>
          </div>
          <div class="card-stats">
            <form class="stats-btn" action="subscribe.php" id="bussiness" method="post">
              <button name="business">Subscribe</button>
            </form>
          </div>
        </div>
        <div class="card">
          <img src="img/global.jpg" alt="">
          <div class="card-text">
            <h2>Gold Plan</h2>
            <p>Get access to all exclusive articles at once.</p>
          </div>
          <div class="card-stats">
            <form class="stats-btn" action="subscribe.php" id="all" method="post">
              <button name="all">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php }
    else if ($row['subscriber']==1) { ?>
    <div>
      Welcome to Tech world.
      <?php include('get_featured_articles_sports.php'); ?>
    
    <section class="sports">
      <div class="sports-container">
        <div class="caard-wrapper">
          <?php while($roww = mysqli_fetch_assoc($fta)){?>
          <div class="caard">
            <div class="img-wrapper">
              <img src="img/technology.jpg" alt="img">
            </div>
            <div class="caard-content">
              <a href="https://bibhuni.netlify.app/" target="_blank">
                <h1><?php echo $roww['headline']?></h1>
              </a>
              <span><?php echo $roww['date']?></span>
              <p><?php echo $roww['subtext']?></p>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section>

    </div>
    <?php }
    else if ($row['subscriber']==2) { ?>
    <div>
    Welcome to Sports world.
    <?php include('get_featured_articles_sports.php'); ?>
    
    <section class="sports">
      <div class="sports-container">
        <div class="caard-wrapper">
          <?php while($roww = mysqli_fetch_assoc($fsa)){?>
          <div class="caard">
            <div class="img-wrapper">
              <img src="img/sports.jpg" alt="img">
            </div>
            <div class="caard-content">
              <a href="https://bibhuni.netlify.app/" target="_blank">
                <h1><?php echo $roww['headline']?></h1>
              </a>
              <span><?php echo $roww['date']?></span>
              <p><?php echo $roww['subtext']?></p>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section>
    </div>
    <?php }
    else if ($row['subscriber']==3) { ?>
    <div>
      Welcome to Business world.
      <?php include('get_featured_articles_sports.php'); ?>
    
    <section class="sports">
      <div class="sports-container">
        <div class="caard-wrapper">
          <?php while($roww = mysqli_fetch_assoc($fba)){?>
          <div class="caard">
            <div class="img-wrapper">
              <img src="img/business.jpg" alt="img">
            </div>
            <div class="caard-content">
              <a href="https://bibhuni.netlify.app/" target="_blank">
                <h1><?php echo $roww['headline']?></h1>
              </a>
              <span><?php echo $roww['date']?></span>
              <p><?php echo $roww['subtext']?></p>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section>

    </div>
    <?php }
    else if ($row['subscriber']==4) { ?>
    <div>
      Welcome to Omazon world.
      <?php include('get_featured_articles_sports.php'); ?>
    
    <section class="sports">
      <div class="sports-container">
        <div class="caard-wrapper">
          <?php while($roww = mysqli_fetch_assoc($fa)){?>
          <div class="caard">
            <div class="img-wrapper">
              <img src="img/global.jpg" alt="img">
            </div>
            <div class="caard-content">
              <a href="https://bibhuni.netlify.app/" target="_blank">
                <h1><?php echo $roww['headline']?></h1>
              </a>
              <span><?php echo $roww['date']?></span>
              <p><?php echo $roww['subtext']?></p>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section>

    </div>
    <?php } ?>
    

    <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: Index.html");
    }
  ?>
</body>
</html>