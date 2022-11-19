
<?php

$conn = mysqli_connect('localhost','root','','ebs');


if(isset($_GET['id'])){
    $article_id = $_GET['id'];
    $query = "SELECT * FROM articles WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$article_id);
    $stmt->execute();
    $fa = $stmt->get_result();;
}else{
    header('location: home.php');
}

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
    <link rel="stylesheet" href="css/single_article.css">
    <link rel="stylesheet" href="css/topbar.css">
    <title>Document</title>
</head>
<body onload="initClock()">
    <?php
        $user_data="SELECT * FROM user WHERE email='$_SESSION[UserLoginId]'";
        $user_datta=mysqli_query($conn,$user_data);
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
    <center><div class="action-buttons">
        <form action="" method="post"><button class="delete-user" name="delete">Delete</button></form>
        <?php 
        if(isset($_POST['delete'])){
            $de_query = "DELETE FROM articles WHERE id=$article_id";
            $de_ns=mysqli_query($conn,$de_query);
            
            echo"<script>alert('Article deleted');
            window.location.href='articlelist.php';
            </script>";        
        }?>
        <a href="<?php echo "article_manage.php?id=". $article_id;?>"><button class="edit-article">Edit article</button></a>
    </div></center>
    <center><section class="article">
        <?php while($row = $fa->fetch_assoc()){?>
        <div class="main-article">
            <div class="article-text">
                <div class="article-heading">
                    <h1><?php echo $row['headline'] ?></h1>
                </div>
                <div class="article-date"><?php echo $row['date'] ?></div>
                <div class="article-subtext">
                    <h4><?php echo $row['subtext'] ?></h4>
                </div>
                <div class="article-img">
                    <img src="article_img/<?php echo $row['image']?>" alt="">
                </div>
                <div class="article-detail">
                    <p><?php echo $row['detailed'] ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </section></center>
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