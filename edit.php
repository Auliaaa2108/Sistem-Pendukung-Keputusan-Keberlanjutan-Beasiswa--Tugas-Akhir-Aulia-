<?php
include('config.php');
include('fungsi.php');

// mendapatkan data edit
if (isset($_GET['jenis']) && isset($_GET['id'])) {
	$id 	= $_GET['id'];
	$jenis	= $_GET['jenis'];

	// hapus record
	$query 	= "SELECT nama FROM $jenis WHERE id=$id";
	$result	= mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama = $row['nama'];
	}
}

if (isset($_POST['update'])) {
	$id 	= $_POST['id'];
	$jenis	= $_POST['jenis'];
	$nama 	= $_POST['nama'];

	$query 	= "UPDATE $jenis SET nama='$nama' WHERE id=$id";
	$result	= mysqli_query($koneksi, $query);

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
	echo "<script>alert('Silahkan Login Terlebih Dahulu !'); window.location = 'login.php'</script>";
} else {

	include('template/header.php');
	include('template/sidebar.php');
	include('template/navbar.php');
?>
	<div id="layoutSidenav_content">
		<div class="container-fluid px-4">
			<!-- <section class="content"> -->
				<br>
			<h2>Edit <?php echo $jenis ?></h2>
			
			<div class="ui breadcrumb">
				<a class="section" href="kriteria.php" ><i class="fa-regular fa-folder-open"></i>&nbsp;</i>Data <?php echo $jenis ?></a>
				<div class="divider"> / </div>
				<div class="active section">Edit <?php echo $jenis ?></div>
			</div>


			<form class="ui form" method="post" action="edit.php">
				<br>
				<div class="required field">
					<label>Nama <?php echo $jenis ?></label>
					<input type="text" name="nama" value="<?php echo $nama ?>" required>
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="hidden" name="jenis" value="<?php echo $jenis ?>">
				</div>

				<input onClick="return confirm('Yakin Mengubah Data?')" class="ui primary button" type="submit" name="update" value="UBAH">
				<br><br>
			</form>
			<!-- </section> -->

			<?php include('template/footer.php'); ?>
		<?php } ?>