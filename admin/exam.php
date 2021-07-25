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
    Header("Location:/online-sinav-sistemi/admin/exams.php");
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
                    <h1>SINAV SAYFASI</h1>
                    <hr>

                    <form action="actions/updateExam.php" method="GET">

                        <div class="row">
                            <div class="col-6">
                                <label for="title" class="form-label">Sınav Başlığı</label>

                                <input type="text" value="<?php echo $exam[0]['title'] ?>" id="title" name="title" class="form-control" placeholder="Sınav Başlığı" aria-label="Sınav Başlığı">
                            </div>
                            <div class="col-6">
                                <label for="explanation" class="form-label">Sınav Açıklaması</label>

                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Sınav Açıklaması Giriniz" name="explanation" id="explanation" style="height: 150px"><?php echo $exam[0]['explanation'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 d-flex justify-content-center">
                                <input type="hidden" name="id" value="<?php echo $exam[0]['id'] ?>">
                                <button name="update" class="mt-3 px-5 btn btn-warning btn-user btn-block">Güncelle</button>
                            </div>
                        </div>
                    </form>



                    <!-- <hr> -->
                    <h3 class="mt-3">SORULAR</h3>

                    <a class="btn btn-primary px-5 mb-4" href="newQuery.php?examID=<?php echo $exam[0]['id'] ?>">Yeni Soru Oluştur</a>

                    <?php
                    $counter = 1;
                    foreach ($questions as $question) { ?>


                        <div class="card my-3">
                            <h5 class="card-header">Soru <?php echo $counter; ?></h5>
                            <div class="card-body bg-light bg-gradient">
                                <h5 class="card-title"><?php echo $question['question'] ?></h5>
                                <ul style="list-style-type:upper-latin;">
                                    <li <?php if( $question['rightAnswer']=='A') echo "class='bg-success text-dark'"; ?>> <?php echo $question['optionA'] ?></li>
                                    <li <?php if( $question['rightAnswer']=='B') echo "class='bg-success text-dark'"; ?>> <?php echo $question['optionB'] ?></li>
                                    <li <?php if( $question['rightAnswer']=='C') echo "class='bg-success text-dark'"; ?>> <?php echo $question['optionC'] ?></li>
                                    <li <?php if( $question['rightAnswer']=='D') echo "class='bg-success text-dark'"; ?>> <?php echo $question['optionD'] ?></li>
                                </ul>
                                <a href="updateQuery.php?examID=<?php echo $_examID; ?>&id=<?php echo $question['id']; ?>" class="btn btn-primary">Güncelle</a>
                                <a href="deleteQuery.php?examID=<?php echo $_examID; ?>&id=<?php echo $question['id']; ?>" class="btn btn-danger mx-3 px-4">Sil</a>
                                <a href="#" class="btn btn-success mx-3 px-2 float-end">Yukarı Taşı</a>
                                <a href="#" class="btn btn-secondary mx-3 px-2 float-end">Aşağı Taşı</a>
                            </div>
                        </div>

  


                    <?php
                        $counter++;
                    } ?>





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