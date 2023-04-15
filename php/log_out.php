<?php

setcookie('user', $name, time() - 600, '/');
header('Location: /');

?>