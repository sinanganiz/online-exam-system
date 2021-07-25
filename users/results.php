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


$myResults = $db->prepare("SELECT * FROM answers LEFT JOIN exams ON exams.id = answers.examID WHERE answers.studentID=:studentID");
$myResults->execute(array(
    "studentID" => $_SESSION['studentID']
));
$myResults = $myResults->fetchAll();



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
                    <h1>SINAV SONUÇLARIM</h1>
                </div>


                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sınav Başlığı</th>
                                <th>Soru Sayısı</th>
                                <th>Puan</th>
                                <th>Tarih</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Sınav Başlığı</th>
                                <th>Soru Sayısı</th>
                                <th>Puan</th>
                                <th>Tarih</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $counter = 1;
                            foreach ($myResults as $result) {

                                $questions = $db->prepare("SELECT * FROM questions WHERE examID = :examID");
                                $questions->execute(array(
                                    'examID' =>  $result['examID']
                                ));
                                $questions = $questions->fetchAll();
                            ?>

                                <tr>
                                    <td><b><?php echo $counter ?></b></td>
                                    <td><?php echo $result['title']; ?></td>
                                    <td><?php echo count($questions); ?></td>
                                    <td><?php echo $result['point'] ?></td>
                                    <td><?php echo $result['createdAt'] ?></td>
                           
                                </tr>
                            <?php
                                $counter++;
                            } ?>

                        </tbody>
                    </table>
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