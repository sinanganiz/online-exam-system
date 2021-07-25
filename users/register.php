<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Çevrimiçi Sınav Sistemi</title>

    <!-- Custom fonts for this template-->
    <link href="css/fontawesome.all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
ob_start();
session_start();
if (isset($_SESSION['studentEmail']) && isset($_SESSION['studentID'])) {
    include_once "../config/Dbconnect.php";

    $oturum = $db->prepare("SELECT * FROM students WHERE id=:id");
    $oturum->execute(array(
        'id' => $_SESSION['studentID']
    ));
    $ctrl = $oturum->rowCount();
    // $student = $oturum->fetch(PDO::FETCH_ASSOC);

    if ($ctrl > 0) {
        header("Location:/online-sinav-sistemi/users/index.php?session=ok");
        exit;
    }
}

?>
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="img/AunjWOqK_400x400.jpg" width="100%" height="auto" alt="Zonguldak Bülent Ecevit Üniversitesi">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Bir Hesap Oluştur!</h1>
                            </div>
                            <form class="user" method="POST" action="actions/registerAct.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Ad">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="surname" id="surname" placeholder="Soyad">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="E-Posta Adresi">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Şifre">
                                </div>

                                <button class="btn btn-primary btn-user btn-block">
                                    Kayıt Ol


                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Şifremi unuttum!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Zaten bir hesabım var. Giriş yap!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>