<?php

require '../includes/db.php';

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = md5(filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING));

$sql = "INSERT INTO `users` (`name`, `password`) VALUES ('$name', '$password')";

$connection->query($sql);

setcookie('user', $name, time() + 600, "/");
header('Location: /');
?>