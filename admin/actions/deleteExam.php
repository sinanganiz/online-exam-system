<?php
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if ( isset($_GET['id'])) {

    $_id = filtre($_GET['id']);
    $_title = filtre($_GET['title']);
    $_explanation = filtre($_GET['explanation']);


    $query = $db->prepare("DELETE FROM exams WHERE id=:id");

    $delete = $query->execute(array(
        'id' =>  $_id
    ));

    if ($delete) {
        Header("Location:/online-sinav-sistemi/admin/exams.php");
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/admin/exams.php?durum=false");
        exit;
    }
}
