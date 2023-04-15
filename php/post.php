<?php

require '../includes/db.php';

$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$anons = $_POST['anons'];
$text = $_POST['content'];
$img = $_FILES['file']['name'];
$user = $_COOKIE['user'];
$user_id = mysqli_query($connection, "SELECT * FROM `users` WHERE `name` = '$user'");
$user_id = mysqli_fetch_assoc($user_id)['id'];
move_uploaded_file($_FILES['file']['tmp_name'], '../article_img/' . $img);
echo $title, "\n";
echo $subtitle, "\n";
echo $anons, "\n";
echo $text, "\n";
echo $img, "\n";
echo $user, "\n";
echo $user_id, "\n";



if (mysqli_query($connection, "INSERT INTO `articles` (`title`, `subtitle`, `anons`, `text`, `img`, `user_id`) VALUES ('$title', '$subtitle', '$anons', '$text', '$img', '$user_id')")){
    
    echo "YES";
}
mysqli_query($connection, "INSERT INTO `articles` (`title`, `subtitle`, `anons`, `text`, `img`, `user_id`) VALUES ('$title', '$subtitle', '$anons', '$text', '$img', '$user_id)");
// header('Location: /')

?>