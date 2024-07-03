<?php
include('config.php');
include('fungsi.php');

// mendapatkan data edit
if (isset($_GET['jenis'])) {
	$jenis	= $_GET['jenis'];
}

if (isset($_POST['tambah'])) {
	$jenis	= $_POST['jenis'];
	$nama 	= $_POST['nama_lengkap'];
	$username = $_POST['username'];
	$role = $_POST['role'];
	$passwordnew = $_POST['password'];

	tambahUser($jenis, $nama, $username, $role ,$passwordnew);

	// header('Location: ' . $jenis . '.php');
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
			<br>
			<!-- <section class="content"> -->
			<h2>Tambah <?php echo $jenis ?></h2>
			<div class="ui breadcrumb">
				<a class="section">Data <?php echo $jenis ?></a>
				<div class="divider"> / </div>
				<div class="active section">Tambah <?php echo $jenis ?></div>
			</div>



			<form class="ui form" method="post" action="tambahUser.php">
				<br>
				<div class="required field">
					<label>Nama <?php echo $jenis ?></label>
					<input type="text" name="nama_lengkap" placeholder="Masukan <?php echo $jenis ?> baru" required>
					<input type="hidden" name="jenis" value="<?php echo $jenis ?>">
				</div>
				<div class="required field">
					<label>Username</label>
					<input type="text" name="username" placeholder="Masukan Username" required>
				</div>
				<div class="required field">
					<label>Password</label>
					<input type="password" name="password" placeholder="Masukan Password" required>
				</div>
				<div class="required field">
					<label>Role</label>
					<input type="text" name="role" placeholder="Masukan Role" required>
				</div>
				
				<input onClick="return confirm('Yakin Menyimpan Data?')" class="ui primary button" type="submit" name="tambah" value="SIMPAN">
			</form>
			<!-- </section> -->
			<br>
			<?php include('template/footer.php'); ?>
		<?php } ?>