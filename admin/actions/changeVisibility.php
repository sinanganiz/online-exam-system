<?php
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_GET['visibility']) && isset($_GET['id'])) {

    $_id = filtre($_GET['id']);
    $_visibility = filtre($_GET['visibility']);


    $query = $db->prepare("UPDATE exams SET isVisible =:visibility WHERE id=:id");

    $update = $query->execute(array(
        'id' =>  $_id,
        'visibility' =>  $_visibility
    ));

    if ($update) {

        Header("Location:/online-sinav-sistemi/admin/exams.php");
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/admin/exams.php?durum=false");
        exit;
    }
}
