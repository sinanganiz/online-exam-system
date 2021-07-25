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
                    <h1 class="mb-4">Yeni Sınav Oluştur</h1>


                    <form action="actions/createExam.php" method="GET">

                        <div class="row">
                            <div class="col-8">
                                <label for="title" class="form-label">Sınav Başlığı</label>

                                <input type="text" id="title" name="title" class="form-control" placeholder="Sınav Başlığı" aria-label="Sınav Başlığı">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8">
                            <label for="explanation" class="form-label">Sınav Açıklaması</label>

                                <div class="form-floating">

                                    <textarea class="form-control" placeholder="Sınav Açıklaması Giriniz" name="explanation" id="explanation" style="height: 150px"></textarea>
                                    <label for="explanation">Sınav Açıklaması</label>
                                </div>
                            </div>
                        </div>

                        <button name="create" class="mt-3 btn btn-primary btn-user btn-block">Oluştur</button>

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