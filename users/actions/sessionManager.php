<?php
ob_start();
session_start();
include_once "../config/Dbconnect.php";

$oturum = $db->prepare("SELECT * FROM students WHERE id=:id");
$oturum->execute(array(
    'id' => $_SESSION['studentID']
));
$ctrl = $oturum->rowCount();

if ($ctrl == 0) {
    header("Location:/online-sinav-sistemi/users/login.php?session=false");
    exit;
}
