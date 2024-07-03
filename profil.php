<?php

include "config.php";
include('fungsi.php');

session_start();
if (!isset($_SESSION['nama_lengkap'])) {
    echo "<script>location.href='login.php'</script>";
}
$title = "Dashboard SPK";
require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";


?>
<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <ol class="breadcrumb">
            <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
            <li class="active"><span class="fa fa-user"></span> Profil</li>
        </ol>
        <p style="margin-bottom:10px;">
            <strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Profil</strong>
        </p>
        <form method="post">
            <div class="form-group">
                <label for="nl">Nama Lengkap</label>
                <input type="text" class="form-control" id="nl" name="nl" value="<?php echo $nama?>" required>
            </div>
            <div class="form-group">
                <label for="un">Username</label>
                <input type="text" class="form-control" id="un" name="un" value="<?php echo $nama?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span> Ubah</button>
        </form>

    </div>
</div>
<?php
include_once 'footer.php';
?>