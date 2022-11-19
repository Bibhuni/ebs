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
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/table.css">
    <title>Document</title>
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
        <div class="date">
            <span id="dayname">Day</span>,
            <span id="month">Month</span>
            <span id="daynum">00</span>,
            <span id="year">Year</span>    
        </div>
      </div>
    </div>
    <div class="topbar2">
      <div class="action-btns">
        <i class="fas fa-map-marker-alt"></i>
        <p class="topbar-city"><b><?php echo $row['city'];?>,</b></p>
        <p class="topbar-state"><?php echo $row['state'];?>, </p>
        <p class="topbar-pin"><?php echo $row['pin'];?></p>
      </div>
      <div class="time">
            <span id="hour">00</span>:
            <span id="minutes">00</span>:
            <span id="seconds">00</span>
            <span id="period">AM</span>    
        </div>
    </div>


    <?php if ($row['subscriber']=='nsubscribe') { ?> 
    <div class="no-subscriber">
      <div class="main-card">
        <div class="card">
          <img src="img/technology.jpg" alt="">
          <div class="card-text">
            <h2>Tech</h2>
            <p>Get access to exclusive articles of latest technology and its related stuffs.</p>
          </div>
          <div class="card-stats">
            <div class="stats-btn">
              <a href="tech_payment.php"><button name="tech">Subscribe</button></a>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/sports.jpg" alt="">
          <div class="card-text">
            <h2>Sports</h2>
            <p>Get access to exclusive sports articles and its related stuffs.</p>
          </div>
          <div class="card-stats">
          <div class="stats-btn">
              <a href="sports_payment.php"><button name="tech">Subscribe</button></a>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/business.jpg" alt="">
          <div class="card-text">
            <h2>Business</h2>
            <p>Get access to exclusive articles of Business related stuffs.</p>
          </div>
          <div class="card-stats">
          <div class="stats-btn">
              <a href="business_payment.php"><button name="tech">Subscribe</button></a>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="img/global.jpg" alt="">
          <div class="card-text">
            <h2>Gold Plan</h2>
            <p>Get access to all exclusive articles at once.</p>
          </div>
          <div class="card-stats">
          <div class="stats-btn">
              <a href="all_payment.php"><button name="tech">Subscribe</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }
    else if ($row['subscriber']=='all') { ?>
          <div>
            <?php include('get_featured_articles_sports.php'); ?>
            Welcome to Omazon world.
          <section class="sports">
            <div class="sports-container">
              <div class="caard-wrapper">
                <?php while($roww = mysqli_fetch_assoc($faa)){?>
                <a href="<?php echo "single_article.php?id=". $roww['id'];?>">
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
              </div>
            </div>
          </section>
      
          </div>
    <?php }
        else if ($row['subscriber']=='admin') { ?>
          <center><div>
            <?php include('get_admin_data.php'); 
              $xuq = mysqli_fetch_assoc($uq);
              $xsu = mysqli_fetch_assoc($su);
              $xtu = mysqli_fetch_assoc($tu);
              $xspu = mysqli_fetch_assoc($spu);
              $xbu = mysqli_fetch_assoc($bu);
              $xgu = mysqli_fetch_assoc($gu);


              $xaq = mysqli_fetch_assoc($aq);
              $xta = mysqli_fetch_assoc($ta);
              $xsa = mysqli_fetch_assoc($sa);
              $xba = mysqli_fetch_assoc($ba);


            ?>
            Hii Admin.
            <table>
              <tr><td>Total Users</td><td><?php echo $xuq['total_user']?></td></tr>
              <tr><td>Total subscribers</td><td><?php echo $xsu['total_subscriber']?></td></tr>
              <tr><td>Tech subscribers</td><td><?php echo $xtu['tech_subscriber']?></td></tr>
              <tr><td>Sports subscribers</td><td><?php echo $xspu['sports_subscriber']?></td></tr>
              <tr><td>Business subscribers</td><td><?php echo $xbu['business_subscriber']?></td></tr>
              <tr><td>Gold subscribers</td><td><?php echo $xgu['gold_subscriber']?></td></tr>
              <tr><td>Total articles</td><td><?php echo $xaq['total_articles']?></td></tr>
              <tr><td>Tech articles</td><td><?php echo $xta['tech_articles']?></td></tr>
              <tr><td>Sports articles</td><td><?php echo $xsa['sports_articles']?></td></tr>
              <tr><td>Business articles</td><td><?php echo $xba['business_articles']?></td></tr>
              <tr><th><a href="createpost.php"><li>Create Post</li></a></th><th><a href="createpost.php">GO</a></th></tr>
              <tr><th><a href="userlist.php"><li>View user list</li></a></th><th><a href="userlist.php">GO</a></th></tr>
              <tr><th><a href="articlelist.php"><li>view articles</li></a></th><th><a href="articlelist.php">GO</a></th></tr>
          </table>
          </div></center>
    <?php }
    else{ ?>
    <div>
      <?php include('get_featured_articles_sports.php'); ?>
      Welcome to <?php echo $row['subscriber']?> world.    
    <section class="sports">
      <div class="sports-container">
        <div class="caard-wrapper">
          <?php while($roww = mysqli_fetch_assoc($fa)){?>
          <a href="<?php echo "single_article.php?id=". $roww['id'];?>">
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
<script src="js/dtime.js"></script>
</body>
</html>