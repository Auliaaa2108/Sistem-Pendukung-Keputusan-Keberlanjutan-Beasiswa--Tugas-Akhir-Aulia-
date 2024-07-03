<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"><i class="fa-solid fa-house"></i>&nbsp;</i>Home</div>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Beranda
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading"><i class="fa-solid fa-server"></i>&nbsp;</i>Data</div>
                    <a class="nav-link" href="<?= $main_url ?>kriteria.php">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-folder-open"></i>&nbsp;</i></div>
                        Data Kriteria
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>alternatif.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i>&nbsp;</i></div>
                        Data Alternatif
                    </a>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <a class="nav-link" href="<?= $main_url ?>admin.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Data Pengguna
                        </a>
                    <?php } else { ?>
                        <a class="nav-link" href="<?= $main_url ?>user.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Profil Pengguna
                        </a>
                    <?php } ?>
                    <!-- <a class="nav-link" href="<?= $main_url ?>user.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Data Pengguna
                    </a> -->
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading"><i class="fa-solid fa-magnifying-glass-chart"></i>&nbsp;</i>Analisa Data</div>
                    <a class="nav-link" href="<?= $main_url ?>bobot_kriteria.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-simple"></i></div>
                        Perbandingan Kriteria
                    </a>
                    <!-- <a class="nav-link" href="<?= $main_url ?>bobot.php?c=1">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-lines"></i></div>
                        Perbandingan Alternatif
                    </a> -->
                    <!-- <li class="sb-sidenav-menu-heading">Perbandingan Alternatif</li> -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-searchengin"></i></div>
                            Perbandingan Alternatif
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <ul class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <?php
                            if (getJumlahKriteria() > 0) {
                                for ($i = 0; $i <= (getJumlahKriteria() - 1); $i++) {
                                    echo "<li><a class='nav-link' href='bobot.php?c=" . ($i + 1) . "'>" . getKriteriaNama($i) . "</a></li>";
                                }
                            }
                            ?>
                        </ul>
                    </li>

                    <!-- <li><a class="nav-link" href="bobot.php?c=1">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-searchengin"></i></div>Perbandingan Alternatif
                        </a></li>
                    <ul>
                        <?php

                        if (getJumlahKriteria() > 0) {
                            for ($i = 0; $i <= (getJumlahKriteria() - 1); $i++) {
                                echo "<li><a class='nav-link' href='bobot.php?c=" . ($i + 1) . "'>" . getKriteriaNama($i) . "</a></li>";
                            }
                        }

                        ?>
                    </ul> -->
                    <a class="nav-link" href="<?= $main_url ?>hasil.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-pdf"></i></div>
                        Hasil Akhir Perankingan
                    </a>
                    <hr class="mb-0">

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <a class="navbar-brand ps-3" href="<?= $main_url ?>logout.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;</i></i>Log Out</a>
                <!--  -->

            </div>
        </nav>
    </div>