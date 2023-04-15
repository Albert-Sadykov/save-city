<?php

require '../includes/db.php';

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = md5(filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING));



$isAdmin = false;
if ($name == 'admin') {
    $isAdmin = true;
}
setcookie('user', $name, time() + 600, "/");
//setcookie('isAdmin', $isAdmin, time() + 300, 'worldskills');
header('Location: /');
?>