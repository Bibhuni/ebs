<?php

$conn = mysqli_connect('localhost','root','','ebs');


if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$user_id);
    $stmt->execute();
    $fa = $stmt->get_result();
    $sub_query = "SELECT * FROM user WHERE id=$user_id";
    $su_query = mysqli_query($conn,$sub_query);
    $row = mysqli_fetch_assoc($su_query);
    $subscriber = $row['subscriber'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fa11acf629.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/edituser.css">
    <link rel="stylesheet" href="css/allusers.css">
    <link rel="stylesheet" href="css/single_user.css">
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
    <center><section class="user-manage">
    <?php while($row = $fa->fetch_assoc()){?>
        <h1 class="user-name"><?php echo $row['name'] ?></h1>
        <h2>Manage user:</h2>
        <div class="action-buttons">
        <form action="" method="post"><button type="submit" class="cancel-subscription" name="cancel-subscription">Cancel subscription</button></form>
        <?php 
        if(isset($_POST['cancel-subscription'])){
            $ad_query = "UPDATE user SET subscriber='nsubscriber' WHERE id=$user_id";
            $ad_ns=mysqli_query($conn,$ad_query);
            
            echo"<script>alert('subscription cancelled.');
            window.location.href='userlist.php';
            </script>";
        }?>
        <form action="" method="post"><button type="submit" class="delete-user" name="delete-user">Delete user</button></form>
        <?php 
        if(isset($_POST['delete-user'])){
            $de_query = "DELETE FROM user WHERE id=$user_id";
            $de_ns=mysqli_query($conn,$de_query);
            
            echo"<script>alert('user deleted');
            window.location.href='userlist.php';
            </script>";        
        }?>
        </div>
        <div class="action-buttons">
        <form action="" method="post"><button type="submit" class="stt" name="switch-to-tech">Switch to tech</button></form>
        <?php 
        if(isset($_POST['switch-to-tech'])){
            if($row['subscriber'] === "tech"){
                echo"<script>alert('user is already a Tech subscriber');
                window.location.href='manageusers.php';
                </script>";
            
            }else{
            $ad_query = "UPDATE user SET subscriber='tech' WHERE id=$user_id";
            $ad_ns=mysqli_query($conn,$ad_query);
            
            echo"<script>alert('switched to tech Omazon.');
            window.location.href='manageusers.php';
            </script>";
            }
        }?>
        <form action="" method="post"><button type="submit" class="sts" name="switch-to-sports">Switch to Sports</button></form>
        <?php 
        if(isset($_POST['switch-to-sports'])){
            if($row['subscriber'] === "sports"){
                echo"<script>alert('user is already a Sports subscriber');
                window.location.href='manageusers.php';
                </script>";
            
            }else{
            $ad_query = "UPDATE user SET subscriber='sports' WHERE id=$user_id";
            $ad_ns=mysqli_query($conn,$ad_query);
            
            echo"<script>alert('switched to sports Omazon.');
            window.location.href='manageusers.php';
            </script>";
            }
        }?>
        </div>
        <div class="action-buttons">
        <form action="" method="post"><button type="submit" class="stb" name="switch-to-business">Switch to Business</button></form>
        <?php 
        if(isset($_POST['switch-to-business'])){
            if($row['subscriber'] === "business"){
                echo"<script>alert('user is already a Business subscriber');
                window.location.href='manageusers.php';
                </script>";
            
            }else{
            $ad_query = "UPDATE user SET subscriber='tech' WHERE id=$user_id";
            $ad_ns=mysqli_query($conn,$ad_query);
            
            echo"<script>alert('switched to Business Omazon.');
            window.location.href='manageusers.php';
            </script>";
            }
        }?>
        <form action="" method="post"><button type="submit" class="stg" name="switch-to-gold">Switch to Gold</button></form>
        <?php 
        if(isset($_POST['switch-to-gold'])){
            if($row['subscriber'] === "all"){
                echo"<script>alert('user is already a Gold subscriber');
                window.location.href='manageusers.php';
                </script>";
            
            }else{
            $ad_query = "UPDATE user SET subscriber='all' WHERE id=$user_id";
            $ad_ns=mysqli_query($conn,$ad_query);
            
            echo"<script>alert('switched to Gold Omazon.');
            window.location.href='manageusers.php';
            </script>";
            }
        }?>
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