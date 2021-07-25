<?php
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_POST['id']) && isset($_POST['examID'])) {

    $_examID = filtre($_POST['examID']);
    $_id = filtre($_POST['id']);


    $query = $db->prepare("DELETE FROM questions WHERE id=:id");

    $update = $query->execute(array(
        'id' => $_id
    ));

    if ($update) {

        Header("Location:/online-sinav-sistemi/admin/exam.php?examID=" . $_examID);
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/admin/exams.php?durum=false");
        exit;
    }
}
