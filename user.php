<?php
include('config.php');
include('fungsi.php');

// menjalankan perintah edit
if (isset($_POST['edit'])) {
	$id = $_POST['id_user'];

	header('Location: editUser.php?jenis=user&id_user=' . $id);
	exit();
}

// menjalankan perintah delete
if (isset($_POST['delete'])) {
	$id = $_POST['id_user'];
	deleteUser($id);
}

// menjalankan perintah tambah
// if (isset($_POST['tambah'])) {
// 	$nama = $_POST['nama_lengkap'];
// 	$username = $_POST['username'];
// 	$role = $_POST['role'];
// 	$password = $_POST['password'];
// 	tambahUser('user', $nama, $username,$role, $md5);
// }


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
			<h1 class="mt-4">Data Pengguna Sistem Pendukung Keputusan Keberlanjutan Beasiswa BI</h1>
	
			<div class="ui breadcrumb">
				<a class="section"><i class="fa-solid fa-server"></i>&nbsp;</i>Data</a>
				<div class="divider"> / </div>
				<div class="active section"><i class="fa-solid fa-users"></i>Data Pengguna</div>
			</div>
			<h2 class="ui header"></h2>
			<hr><br>
			<!-- <a href="tambahUser.php?jenis=user">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<button class="btn btn-primary me-md-2" type="button"><i class="fa-solid fa-plus"></i>&nbsp;</i>Tambah Data</button>

				</div>
				<br>
			</a> -->

			<table width="100%" class="table table-striped table-bordered">
				<thead>
					<tr>
						<!-- <th width="10px">No</th> -->
						<th> Nama Lengkap</th>
						<th>Username</th>
						<th width="100px">Aksi</th>

					</tr>
				</thead>
				<tbody>

					<?php
					// Menampilkan list user
					$username = $_SESSION['username'];
                    $query = "SELECT id_user, nama_lengkap, username FROM user WHERE username = '$username' ORDER BY id_user";
					// $query = "SELECT id_user,nama_lengkap,username FROM user ORDER BY id_user";
					$result	= mysqli_query($koneksi, $query);

					$i = 0;
					while ($row = mysqli_fetch_array($result)) {
						$i++;
					?>
						<tr>
							<!-- <td><?php echo $i ?></td> -->
							<td><?php echo $row['nama_lengkap'] ?></td>
							<td><?php echo $row['username'] ?></td>
							<td class="right aligned collapsing">
								<form method="post" action="user.php">
									<input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>">
									<button type="submit" name="edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button>
									<!-- <button onClick="return confirm('Yakin Menghapus User?')" type="submit" name="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> -->
								</form>
							</td>
						</tr>


					<?php } ?>


				</tbody>

			</table>

			<br>



			<?php include('template/footer.php'); ?>
		<?php } ?>