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
    <link rel="stylesheet" href="css/contactpage.css">
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
                      <li class="default">Contact Us</li>
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
        <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: Index.html");
    }

    ?>
      </div>

    <section class="contact" id="contact">
        <center><div class="container">
            <h1 class="section-heading">Contact <span>Us</span></h1>
            <p>Any problem or for feedback feel free to contact me. It's your feedback which will help me reach my destination.</p>
            <div class="card-wrapper">
                <div class="card">
                    <a href="tel:0000000000">
                    <img src="img/mobilecall.svg" alt="img">
                    <h2>Call us On</h2>
                    <h6>+91 0000000000</h6>
                    </a>
                </div>
                <div class="card">
                    <a href="mailto:omazon@gmail.com">
                    <img src="img/message.svg" alt="img">
                    <h2>Email us At</h2>
                    <h6>omazon@gmail.com</h6>
                </div></a>
                <div class="card">
                    <a href="">
                    <img src="img/map.svg" alt="img">
                    <h2>Visit</h2>
                    <h6>at Delhi</h6>
                </div></a>
            </div>
            <form method="post" id="contact" action="contactpaage.php">
                <div class="input-wrap">
                    <input type="text" name="name" autocomplete="off" placeholder="Your Name *"  value="<?php echo $row['name'];?>" readonly>
                    <input type="email" name="email" autocomplete="off" placeholder="Your Email *" value="<?php echo $row['email'];?>" readonly>
                </div>
                <div class="input-wrap-2">
                    <input type="text" name="concern" autocomplete="off" placeholder="Your Subject..." required>
                    <textarea name="message" autocomplete="off" id="" cols="30" rows="10" placeholder="Your Message." required></textarea>
                    <div class="btn-wrapper">
                        <button class="btn1" type="submit">SUBMIT</button>
                    </div>
                </div>
            </form>
            <a href="home.php"><button class="btn1 last">Back to Home</button></a>
        </div></center>
    </section>
</body>
</html>