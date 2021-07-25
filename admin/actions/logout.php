<?php

session_start();

session_destroy();

header("Location:/online-sinav-sistemi/admin/login.php");
exit;

?>