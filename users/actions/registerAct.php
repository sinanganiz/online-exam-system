<?php
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_POST['name']) &&  isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])) {

    $_name = filtre($_POST['name']);
    $_surname = filtre($_POST['surname']);
    $_email = filtre($_POST['email']);
    $_password = filtre($_POST['password']);



    $query = $db->prepare("INSERT INTO students SET 
    name =:name, 
    surname =:surname,
    email =:email,
    password =:password
    ");

    $insert = $query->execute(array(
        'name' =>  $_name,
        'surname' =>  $_surname,
        'email' =>  $_email,
        'password' =>  $_password
    ));

    if ($insert) {
        Header("Location:/online-sinav-sistemi/users/login.php");
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/users/register.php");
        exit;
    }
}
