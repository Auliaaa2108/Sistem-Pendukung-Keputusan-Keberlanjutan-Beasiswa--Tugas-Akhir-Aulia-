<?php
include('config.php');
include('fungsi.php');

// mendapatkan data edit
if (isset($_GET['jenis'])) {
	$jenis	= $_GET['jenis'];
}

if (isset($_POST['tambah'])) {
	$jenis	= $_POST['jenis'];
	$nama 	= $_POST['nama'];
	$id_user =$_POST['id_user'];

	tambahData($jenis, $nama,$id_user);

	header('Location: ' . $jenis . '.php');
}

include('template/header.php');
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
	echo "<script>alert('Anda Harus Login Dulu !'); window.location = 'login.php'</script>";
} else {
	include('template/header.php');
	include('template/sidebar.php');
	include('template/navbar.php');
?>
	<div id="layoutSidenav_content">
		<div class="container-fluid px-4">
			<!-- <section class="content"> -->
				<br>
			<h2>Tambah <?php echo $jenis ?></h2>
			<div class="ui breadcrumb">
				<a class="section"><i class="fa-regular fa-folder-open"></i>&nbsp;</i>Data <?php echo $jenis ?></a>
				<div class="divider"> / </div>
				<div class="active section">Tambah <?php echo $jenis ?></div>
			</div>



			<form class="ui form" method="post" action="tambah.php">
				<br>
				<div class="required field">
					<label>Nama <?php echo $jenis ?></label>
					<input type="text" name="nama" placeholder="Masukan <?php echo $jenis ?> baru" required>
					<input type="hidden" name="jenis" value="<?php echo $jenis ?>">
					<input type="hidden" name ="id_user"value="<?php echo $_SESSION['id_user'] ?>">
				</div>

				
				<input onClick="return confirm('Yakin Menyimpan Data?')" class="ui primary button" type="submit" name="tambah" value="SIMPAN">
				
			</form>
			<br>
			<!-- </section> -->

			<?php include('template/footer.php'); ?>
		<?php } ?>