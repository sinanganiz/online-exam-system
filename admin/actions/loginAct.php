<?php

ob_start();
session_start();
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_POST['email']) &&  isset($_POST['password'])) {

    $_email = filtre($_POST['email']);
    $_password = filtre($_POST['password']);

    $search = $db->prepare("SELECT * FROM  users WHERE email=:email AND password=:password");
    $search->execute(array(
        'email' => $_email,
        'password' => $_password
    ));

    $ctrl = $search->rowCount();
    $admin = $search->fetch();

    if ($ctrl == 1) {

        $_SESSION['adminEmail'] = $_email;
        $_SESSION['adminID'] = $admin['id'];
        $_SESSION['adminNameSurname'] = $admin['name'] . " " . $admin['surname'];

        header("Location:/online-sinav-sistemi/admin/index.php");
        exit;
    } else {
        header("Location:/online-sinav-sistemi/admin/login.php?message=hata");
        exit;
    }
}
