<?php
include_once "../../config/Dbconnect.php";
include_once "../../helpers/filtre.php";

if (isset($_POST['question']) &&  isset($_POST['rightAnswer']) && isset($_POST['examID'])) {

    $_question = filtre($_POST['question']);
    $_optionA = filtre($_POST['optionA']);
    $_optionB = filtre($_POST['optionB']);
    $_optionC = filtre($_POST['optionC']);
    $_optionD = filtre($_POST['optionD']);
    $_rightAnswer = filtre($_POST['rightAnswer']);
    $_orderNumber = filtre($_POST['orderNumber']);
    $_examID = filtre($_POST['examID']);


    $query = $db->prepare("INSERT INTO questions SET 
    question =:question, 
    optionA =:optionA,
    optionB =:optionB,
    optionC =:optionC,
    optionD =:optionD,
    rightAnswer =:rightAnswer,
    orderNumber =:orderNumber,
    examID =:examID
    ");

    $insert = $query->execute(array(
        'question' =>  $_question,
        'optionA' =>  $_optionA,
        'optionB' =>  $_optionB,
        'optionC' =>  $_optionC,
        'optionD' =>  $_optionD,
        'rightAnswer' =>  $_rightAnswer,
        'orderNumber' =>  $_orderNumber,
        'examID' =>  $_examID
    ));

    if ($insert) {
        Header("Location:/online-sinav-sistemi/admin/exam.php?examID=" . $_examID);
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/admin/exams.php?durum=false");
        exit;
    }
}
