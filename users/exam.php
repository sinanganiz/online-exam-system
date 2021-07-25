<!DOCTYPE html>
<html lang="tr">

<head>
    <?php
    // head
    include_once "include/head.php";
    ?>
</head>
<?php
// sessionManager
include_once "actions/sessionManager.php";
include_once "../helpers/filtre.php";
if (isset($_GET['examID'])) {
    $_examID = filtre($_GET['examID']);
    $exam = $db->prepare("SELECT * FROM exams WHERE id = :examID");
    $exam->execute(array(
        'examID' =>  $_examID
    ));
    $exam = $exam->fetchAll();
    $questions = $db->prepare("SELECT * FROM questions WHERE examID = :examID ORDER BY orderNumber ASC");
    $questions->execute(array(
        'examID' =>  $_examID
    ));
    $questions = $questions->fetchAll();
} else {
    Header("Location:/online-sinav-sistemi/users/exams.php");
    exit;
}
?>

<body class="sb-nav-fixed">
    <?php
    // nav
    include_once "include/nav.php";
    ?>
    <div id="layoutSidenav">
        <?php
        // side nav
        include_once "include/sideNav.php";
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1><?php echo $exam[0]['title'] ?></h1>
                    <hr>
                    <h5>Açıklama</h5>
                    <p class="mb-5">
                        <?php echo $exam[0]['explanation'] ?>
                    </p>
                    <h3 class="mt-5">SORULAR</h3>
                    <form action="actions/examCompleted.php" method="POST">
                        <?php
                        $counter = 1;
                        foreach ($questions as $question) { ?>
                            <div class="card my-3">
                                <h5 class="card-header">Soru <?php echo $counter; ?></h5>
                                <div class="card-body bg-light bg-gradient">
                                    <h5 class="card-title"><?php echo $question['question'] ?></h5>
                                    <ul style="list-style-type:upper-latin;">
                                        <input type="radio" id="answer-<?php echo $counter; ?>-a" name="answer-<?php echo $counter; ?>" value="A">
                                        <label style="padding-left: 20px;" for="answer-<?php echo $counter; ?>-a">
                                            <li> <?php echo $question['optionA'] ?></li>
                                        </label>
                                        <br>
                                        <input type="radio" id="answer-<?php echo $counter; ?>-b" name="answer-<?php echo $counter; ?>" value="B">
                                        <label style="padding-left: 20px;" for="answer-<?php echo $counter; ?>-b">
                                            <li> <?php echo $question['optionB'] ?></li>
                                        </label>
                                        <br>
                                        <input type="radio" id="answer-<?php echo $counter; ?>-c" name="answer-<?php echo $counter; ?>" value="C">
                                        <label style="padding-left: 20px;" for="answer-<?php echo $counter; ?>-c">
                                            <li> <?php echo $question['optionC'] ?></li>
                                        </label>
                                        <br>
                                        <input type="radio" id="answer-<?php echo $counter; ?>-d" name="answer-<?php echo $counter; ?>" value="D">
                                        <label style="padding-left: 20px;" for="answer-<?php echo $counter; ?>-d">
                                            <li> <?php echo $question['optionD'] ?></li>
                                        </label>
                                        <br>
                                        <input checked type="radio" id="answer-<?php echo $counter; ?>-e" name="answer-<?php echo $counter; ?>" value="E">
                                        <label style="padding-left: 20px;" for="answer-<?php echo $counter; ?>-e">
                                            <li> Boş bırak</li>
                                        </label>
                                        <br>
                                    </ul>
                                </div>
                            </div>
                        <?php
                            $counter++;
                        } ?>
                        <input type="hidden" name="examID" value="<?php echo  $_examID; ?>">
                        <button name="examCompleted" class="btn btn-primary px-5">SINAVI TAMAMLA</button>
                    </form>
                </div>
            </main>
            <?php
            // footer 
            include_once "include/footer.php";
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>