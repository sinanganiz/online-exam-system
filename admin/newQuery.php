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

if (isset($_GET["examID"])) {
    $_examID = filtre($_GET["examID"]);


    $questions = $db->prepare("SELECT * FROM questions WHERE examID = :examID");
    $questions->execute(array(
        'examID' =>  $_examID
    ));
    $questions = $questions->fetchAll();
    $numberOfQuestions = count($questions) + 1;
} else {
    Header("Location:/online-sinav-sistemi/admin/exams.php?durum=false");
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
                <div class="container-fluid px-4 mt-5">
                    <h1 class="mb-4">Yeni Soru Oluştur</h1>


                    <form action="actions/createQuestion.php" method="POST">


                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="question" class="form-label">Soru Açıklaması</label>

                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Soru Açıklaması Giriniz" name="question" id="question" style="height: 150px"></textarea>
                                    <label for="question">Soru Açıklaması</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="optionA" class="form-label">A Şıkkı</label>

                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Soru Açıklaması Giriniz" name="optionA" id="optionA" style="height: 100px"></textarea>
                                    <label for="optionA">A Şıkkı</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="optionB" class="form-label">B Şıkkı</label>

                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Soru Açıklaması Giriniz" name="optionB" id="optionB" style="height: 100px"></textarea>
                                    <label for="optionB">B Şıkkı</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="optionC" class="form-label">C Şıkkı</label>

                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Soru Açıklaması Giriniz" name="optionC" id="optionC" style="height: 100px"></textarea>
                                    <label for="optionC">C Şıkkı</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="optionD" class="form-label">D Şıkkı</label>

                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Soru Açıklaması Giriniz" name="optionD" id="optionD" style="height: 100px"></textarea>
                                    <label for="optionD">D Şıkkı</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 form-group">
                                <label for="rightAnswer" class="form-label">Doğru Cevap</label>

                                <select class="form-control" id="rightAnswer" name="rightAnswer">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <label for="orderNumber" class="form-label">Soru Sırası</label>
                                <input type="text" disabled value="<?php echo $numberOfQuestions; ?>" class="form-control">

                                <input type="hidden"  value="<?php echo $numberOfQuestions; ?>" class="form-control" id="orderNumber" name="orderNumber">

                            </div>
                        </div>
                        <input type="hidden" name="examID" id="examID" value="<?php echo  $_examID; ?>">
                        <div class="d-flex justify-content-center">
                            <button name="create" class="my-5 px-5 btn btn-primary btn-user btn-block">Soru Oluştur</button>

                        </div>

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