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
$_SESSION['article_id']=$_GET['id'];
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
    <title>Edit article</title>
</head>
<body>
<?php
        $user_data="SELECT * FROM user WHERE email='$_SESSION[UserLoginId]'";
        $user_datta=mysqli_query($conn,$user_data);
        $row = mysqli_fetch_assoc($user_datta);
        $article_data="SELECT * FROM articles WHERE id=$article_id";
        $article_datta=mysqli_query($conn,$article_data);
        $raw = mysqli_fetch_assoc($article_datta);
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
        <i class="fa-solid fa-cart-shopping topbarImg"></i>
      </div>
    </div>
<center><div class="total">
        <center><div class="main">
            <center><form class="login-form" id="post_article" action="update_post.php" method="post" enctype="multipart/form-data">
                <div class="heading">
                    <h2>Edit post</h2>
                </div>
                <div class="name-input">
                    <p>Subject</p>
                    <input name="headline" maxlength="1000" type="text" value="<?php echo $raw['headline'];?>" required>
                </div>
                <div class="email-input">
                    <p>Subtext</p>
                    <input name="subtext" maxlength="3000" type="text" value="<?php echo $raw['subtext'];?>" required>
                </div>
                <div class="email-input">
                    <p>Category</p>
                    <select name="category" type="text" required >
                        <option value="" selected disabled>--Select Category--</option>
                        <option value="tech">Tech</option>
                        <option value="sports">Sports</option>
                        <option value="business">Business</option>
                    </select>
                </div>
                <div class="email-input">
                    <p>Content</p>
                    <textarea name="detailed" autocomplete="off" id="detailed" cols="30" maxlength="9000" rows="10" required></textarea>
                </div>
                <div class="password-input">
                    <p>Image</p>
                    <input type="file" name="image" id="image" required>
                    <?php if (isset($_GET['error'])): ?>
                        <p><?php echo $_GET['error']; ?></p>
                    <?php endif ?>
                </div>
                <div class="error"></div>
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
  <script src="js/script.js"></script>
</body>
</html>