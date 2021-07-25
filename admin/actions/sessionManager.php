<?php
ob_start();
session_start();
include_once "../config/Dbconnect.php";

$oturum = $db->prepare("SELECT * FROM users WHERE id=:id");
$oturum->execute(array(
    'id' => $_SESSION['adminID']
));
$ctrl = $oturum->rowCount();

if ($ctrl == 0) {
    header("Location:/online-sinav-sistemi/admin/login.php?session=false");
    exit;
}
