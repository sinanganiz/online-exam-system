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





$exams = $db->prepare("SELECT * FROM exams");
$exams->execute();
$exams = $exams->fetchAll();


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
                    <h1>Sınavlar Sayfası</h1>

                    <div class="card mb-4 mt-5">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Sınavlar
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sınav Başlığı</th>
                                        <th>Açıklama</th>
                                        <th>Durum</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Sınav Başlığı</th>
                                        <th>Açıklama</th>
                                        <th>Durum</th>
                                        <th>Tarih</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    foreach ($exams as $exam) { ?>

                                        <tr>
                                            <td><b><?php echo $counter ?></b></td>
                                            <td><?php echo $exam['title'] ?></td>
                                            <td><?php echo $exam['explanation'] ?></td>
                                            <td><?php echo $exam['isVisible'] ?></td>
                                            <td><?php echo $exam['createdDate'] ?></td>
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <a class="btn btn-primary px-5" href="exam.php?examID=<?php echo $exam['id']; ?>">Git</a>
                                                    </div>
                                                    <div>
                                                        <a class="btn btn-danger px-5" href="actions/deleteExam.php?id=<?php echo $exam['id']; ?>">Sil</a>

                                                    </div>
                                                    <div>
                                                        <?php
                                                        if ($exam['isVisible'] == '0') {
                                                        ?>
                                                            <a class="btn btn-success" href="actions/changeVisibility.php?id=<?php echo $exam['id']; ?>&visibility=1">Yayına Al</a>
                                                        <?php
                                                        } else {


                                                        ?>

                                                            <a class="btn btn-warning" href="actions/changeVisibility.php?id=<?php echo $exam['id']; ?>&visibility=0">Yayından Çıkar</a>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php
                                        $counter++;
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
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