<?php
// sessionManager
ob_start();
session_start();
include_once "../../config/Dbconnect.php";

$oturum = $db->prepare("SELECT * FROM students WHERE id=:id");
$oturum->execute(array(
    'id' => $_SESSION['studentID']
));
$ctrl = $oturum->rowCount();

if ($ctrl == 0) {
    header("Location:/online-sinav-sistemi/users/login.php?session=false");
    exit;
}
// 
include_once "../../helpers/filtre.php";


if (isset($_POST['examID']) &&  isset($_POST['examCompleted'])) {

    $_examID = filtre($_POST['examID']);



    $exam = $db->prepare("SELECT * FROM exams WHERE id = :examID");
    $exam->execute(array(
        'examID' =>  $_examID
    ));
    $exam = $exam->fetch();


    $questions = $db->prepare("SELECT * FROM questions WHERE examID = :examID ORDER BY orderNumber ASC");
    $questions->execute(array(
        'examID' =>  $_examID
    ));
    $questions = $questions->fetchAll();

    $questionsCount = count($questions);
    echo $questionsCount . "<br>";

    $studentAnswers = array();

    $counter = 0;
    foreach ($_POST as $key => $value) {
        $counter++;
        if ($counter <= $questionsCount) {
            array_push($studentAnswers, $value);
        }
        echo "Field " . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "<br>";
    }
    $_answers = json_encode($studentAnswers);
    print_r($_answers);

    // $testt = json_decode(json_encode($studentAnswers));
    // print_r($testt);

    $rightAnswerCount = 0;
    for ($i = 0; $i < $questionsCount; $i++) {
        if ($studentAnswers[$i] == $questions[$i]['rightAnswer']) {
            $rightAnswerCount++;
        }
    }
    echo "<br> Doğru cevap sayısı: " . $rightAnswerCount;
    $totalPoint = 100;
    $eachQuestion = $totalPoint / $questionsCount;
    $resultPoint = $eachQuestion * $rightAnswerCount;
    // echo "<br> Her soru: ".$eachQuestion;
    // echo "<br> Sonuç puanı: ".$resultPoint;

    $query = $db->prepare("INSERT INTO answers SET studentID =:studentID, examID =:examID, answers=:answers, point=:point");

    $insert = $query->execute(array(
        'studentID' =>  $_SESSION['studentID'],
        'examID' =>  $_examID,
        'answers' =>  $_answers,
        'point' =>  $resultPoint
    ));

    if ($insert) {
        Header("Location:/online-sinav-sistemi/users/results.php?message=examOK");
        exit;
    } else {
        Header("Location:/online-sinav-sistemi/users/exams.php?message=examUnsuccessfull");
        exit;
    }
}
