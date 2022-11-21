<?php

$connection = mysqli_connect('localhost','root');

session_start();

mysqli_select_db($connection,"ebs");

$id = $_SESSION['article_id'];
$headline = $_POST['headline'];
$headline = str_replace("'","\'",$headline);
$subtext = $_POST['subtext'];
$subtext = str_replace("'","\'",$subtext);
$category = $_POST['category'];
$detailed = $_POST['detailed'];
$detailed = str_replace("'","\'",$detailed);
$old_img_query = "SELECT * FROM articles WHERE id='$id'";
$old_img_con = mysqli_query($connection,$old_img_query);
$raw = mysqli_fetch_assoc($old_img_con);
$old_img = $raw['image'];
$old_detailed = $raw['detailed'];


if(isset($_POST['post_article']) && isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];

    if($error === 0){
        if($file_size > 1250000){
            $em = "Sorry, your file is too large!";
            header("Location: createpost.php?error=$em");
        }else{
            $img_ex = pathinfo($file_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg","jpeg","png");
            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = 'article_img/'.$new_img_name;
                move_uploaded_file($file_temp, $img_upload_path);
            }else{
                $em = "you can't upload this file!";
                header("Location: createpost.php?error=$em");
            }
        }
    }else{
        $new_img_name = $old_img;
        /*$em = "Select a file!";
        header("Location: createpost.php?error=$em");*/
    }

}else{
    header("location: createpost.php");
}
$query = "UPDATE articles SET headline='$headline', subtext='$subtext', category='$category', detailed='$detailed', image='$new_img_name' WHERE id='$id'";

if($detailed ==='' || is_null($detailed)){
    $qquery = "UPDATE articles SET headline='$headline', subtext='$subtext', category='$category', detailed='$old_detailed', image='$new_img_name' WHERE id='$id'";
    if(mysqli_query($connection,$qquery)){
        echo"
        <script>
        alert('Article edited successfully.');
        window.location.href='home.php';
        </script>
        ";        
    }
    else{
        echo"
        <script>
        alert('Failed!!!');
        window.location.href='create_post.php';
        </script>
        ";
    }
}else if(mysqli_query($connection,$query)){
    echo"
    <script>
    alert('Article edited successfully by global.');
    window.location.href='home.php';
    </script>
    ";        
}
else{
    echo"
    <script>
    alert('Failed!!!');
    window.location.href='create_post.php';
    </script>
    ";
}

?>
