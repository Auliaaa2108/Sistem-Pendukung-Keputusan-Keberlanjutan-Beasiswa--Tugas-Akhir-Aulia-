<?php

include "config.php";
?>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-ligth bg-ligth">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= $main_url ?>index.php">GenBI Sumatera Barat</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <span class="text-white text-capitalize" href="<?= $nama ?>user.php"></span>
        </form>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

            <div class="small"></div>
            <li><a>Hi! Selamat Datang, <?php echo $_SESSION['nama_lengkap'] ?></a></li>
            </i>&nbsp;</i>
            </i>&nbsp;</i>
            
            
        </ul>
    </nav>