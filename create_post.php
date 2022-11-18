<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"ebs");

$headline = $_POST['headline'];
$subtext = $_POST['subtext'];
$category = $_POST['category'];
$detailed = $_POST['detailed'];


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
        $em = "Unknown error occured!";
        header("Location: createpost.php?error=$em");
    }

}else{
    header("location: createpost.php");
}
$query = "INSERT INTO articles(headline, subtext, category, detailed, image) VALUES ('$headline','$subtext','$category','$detailed','$new_img_name')";

if(mysqli_query($connection,$query)){
    echo"
    <script>
    alert('Published successfully.');
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
