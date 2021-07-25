<?php
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_GET['title']) && isset($_GET['explanation'])) {

    $_title = filtre($_GET['title']);
    $_explanation = filtre($_GET['explanation']);


    $query = $db->prepare("INSERT INTO exams SET title =:title, explanation =:explanation");

    $insert = $query->execute(array(
        'title' =>  $_title,
        'explanation' =>  $_explanation
    ));

    if ($insert) {
        $last_id = $db->lastInsertId();

        Header("Location:/online-sinav-sistemi/admin/exam.php?examID=".$last_id);
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/admin/new.php?durum=false");
        exit;
    }
}
