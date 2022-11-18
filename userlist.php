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
    <link rel="stylesheet" href="css/allusers.css">
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
    <section>
    <?php include('get_all_users.php'); ?>

    <div class="no-subscriber">
      <div class="main-card">
      <?php while($rowe = mysqli_fetch_assoc($aluser)){?>
        <a href="<?php echo "manageusers.php?id=". $rowe['id'];?>">
        <div class="card">
          <div class="card-text">
            <h2><?php echo $rowe['name']?></h2>
            <p><?php echo $rowe['subscriber']?></p>
          </div>
        </div>
        </a>
        <?php }?>
      </div>
    </div>
    </section>
    <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: Index.html");
    }
  ?>

</body>
</html>