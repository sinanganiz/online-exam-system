<?php

session_start();

session_destroy();

header("Location:/online-sinav-sistemi/users/login.php");
exit;

?>