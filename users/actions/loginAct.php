<?php

ob_start();
session_start();
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_POST['email']) &&  isset($_POST['password'])) {

    $_email = filtre($_POST['email']);
    $_password = filtre($_POST['password']);

    $search = $db->prepare("SELECT * FROM  students WHERE email=:email AND password=:password");
    $search->execute(array(
        'email' => $_email,
        'password' => $_password
    ));

    $ctrl = $search->rowCount();
    $student = $search->fetch(PDO::FETCH_ASSOC);

    if ($ctrl == 1) {

        $_SESSION['studentEmail'] = $_email;
        $_SESSION['studentID'] = $student['id'];
        $_SESSION['studentNameSurname'] = $student['name']." ".$student['surname'];

        header("Location:/online-sinav-sistemi/users/index.php");
        exit;
    } else {
        header("Location:/online-sinav-sistemi/users/login.php?message=hata");
        exit;
    }
}
