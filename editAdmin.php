<?php
include('config.php');
include('fungsi.php');

// mendapatkan data edit
if (isset($_GET['jenis']) && isset($_GET['id_user'])) {
    $id     = $_GET['id_user'];
    $jenis    = $_GET['jenis'];

    // hapus record
    $query     = "SELECT nama_lengkap, username, role, password FROM $jenis WHERE id_user=$id";
    $result    = mysqli_query($koneksi, $query);

    while ($row = mysqli_fetch_array($result)) {
        $nama = $row['nama_lengkap'];
        $username = $row['username'];
        $role = $row['role'];
        $password = $row['password'];
    }
}

if (isset($_POST['update'])) {
    $id     = $_POST['id_user'];
    $jenis    = $_POST['jenis'];
    $nama     = $_POST['nama_lengkap'];
    $username     = $_POST['username'];
    $role     = $_POST['role'];
    $password     = $_POST['password'];


    $md5 = md5($password);

    $query     = "UPDATE $jenis SET nama_lengkap='$nama', username='$username', role='$role', password='$md5'  WHERE id_user=$id";
    $result    = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Update gagal";
        exit();
    } else {
        header('Location: admin.php');
        exit();
    }
}

include('template/header.php');
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu!'); window.location = 'login.php'</script>";
} else {

    include('template/header.php');
    include('template/sidebar.php');
    include('template/navbar.php');
?>
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <br>
            <!-- <section class="content"> -->
            <div class="ui breadcrumb">
                <a class="section">Data <?php echo $jenis ?></a>
                <div class="divider"> / </div>
                <div class="active section">Edit <?php echo $jenis ?></div>
            </div>
            <h2>Edit <?php echo $jenis ?></h2>

            <form class="ui form" method="post" action="editAdmin.php">
                <div class="required field">
                    <label>Nama <?php echo $jenis ?></label>
                    <input type="text" name="nama_lengkap" value="<?php echo $nama ?>" required>
                    <input type="hidden" name="id_user" value="<?php echo $id ?>">
                    <input type="hidden" name="jenis" value="<?php echo $jenis ?>">
                </div>
                <div class="required field">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username ?>" required>
                </div>
                <div class="required field">
                    <label>Role</label>
                    <input type="text" name="role" value="<?php echo $role ?>" required>
                </div>
                <div class="required field">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>


                <input onClick="return confirm('Yakin Mengubah Data?')" class="ui primary button" type="submit" name="update" value="UBAH">
                <br><br>
            </form>
            <!-- </section> -->


        <?php } ?>
        <?php include('template/footer.php'); ?>