<?php

require '../includes/db.php';

$text = $_POST['text'];
$article_id = $_GET['id'];
$user = $_COOKIE['user'];
$user_id = mysqli_query($connection, "SELECT * FROM `users` WHERE `name` = '$user'");
$user_id = mysqli_fetch_assoc($user_id)['id'];


$sql = "INSERT INTO `comments` (`text`, `article_id`, `user_id`) VALUES ('$text', $article_id, $user_id)";
mysqli_query($connection, $sql);

header("Location: ../single.php?id=$article_id");
?>