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
                    <p><?php echo $roww['subtext']?></p>
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
          <div>
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
            <center><div class="admin-class">
              <div class="admin-summary">
                <h4>Summary</h4>
                <ul>
                  <li>Total Users = <?php echo $xuq['total_user']?></li>
                  <li>Total subscribers=<?php echo $xsu['total_subscriber']?></li>
                  <li>Tech subscribers=<?php echo $xtu['tech_subscriber']?></li>
                  <li>Sports subscribers=<?php echo $xspu['sports_subscriber']?></li>
                  <li>Business subscribers=<?php echo $xbu['business_subscriber']?></li>
                  <li>Gold subscribers=<?php echo $xgu['gold_subscriber']?></li>
                  <li>Total articles=<?php echo $xaq['total_articles']?></li>
                  <li>Tech articles=<?php echo $xta['tech_articles']?></li>
                  <li>Sports articles=<?php echo $xsa['sports_articles']?></li>
                  <li>Business articles=<?php echo $xba['business_articles']?></li>
                </ul>
              </div>
              <div class="admin-operations">
                <h4>operations</h4>
                <ul>
                  <a href="createpost.php"><li>Create Post</li></a>
                  <a href="userlist.php"><li>View user list</li></a>
                  <a href="articlelist.php"><li>view articles</li></a>
                </ul>
              </div>
            </div></center>
          </div>
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
                <p><?php echo $roww['subtext']?></p>
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
</body>
</html>