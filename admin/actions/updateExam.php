<?php
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_GET['title']) && isset($_GET['explanation'])  && isset($_GET['id'])) {

    $_id = filtre($_GET['id']);
    $_title = filtre($_GET['title']);
    $_explanation = filtre($_GET['explanation']);


    $query = $db->prepare("UPDATE exams SET title =:title, explanation =:explanation WHERE id=:id");

    $update = $query->execute(array(
        'id' =>  $_id,
        'title' =>  $_title,
        'explanation' =>  $_explanation
    ));

    if ($update) {

        Header("Location:/online-sinav-sistemi/admin/exam.php?examID=".$_id);
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/admin/exams.php?durum=false");
        exit;
    }
}
