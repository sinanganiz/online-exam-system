<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">MENÜ</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Anasayfa
                </a>
                <div class="sb-sidenav-menu-heading">SINAVLAR</div>
                <a class="nav-link" href="exams.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    SINAVLAR
                </a>
                <a class="nav-link" href="new.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                    YENİ SINAV
                </a>
                <a class="nav-link" href="results.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-plus-square"></i></div>
                    SINAV SONUÇLARI
                </a>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">YÖNETİM PANELİ:</div>
            <?php echo     $_SESSION['adminNameSurname']; ?>
        </div>
    </nav>
</div>