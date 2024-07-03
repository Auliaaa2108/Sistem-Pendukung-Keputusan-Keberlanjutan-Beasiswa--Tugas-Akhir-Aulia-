<?php
include('config.php');
include('fungsi.php');

// menjalankan perintah edit
if (isset($_POST['edit'])) {
	$id = $_POST['id'];

	header('Location: edit.php?jenis=alternatif&id=' . $id);
	exit();
}

// menjalankan perintah delete
if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	deleteAlternatif($id);
}

// menjalankan perintah tambah
if (isset($_POST['tambah'])) {
	// $id = $_POST['id'];
	$nama = $_POST['nama'];
	tambahData('alternatif',$nama,$_SESSION['id_user'] );
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
			<h1 class="mt-4">Data Alternatif - Penentuan Prioritas Penerima Yang Berhak Lanjut Menerima Beasiswa</h1>
			<div class="ui breadcrumb">
				<a class="section"><i class="fa-solid fa-server"></i>Data</a>
				<div class="divider"> / </div>
				<div class="active section"><i class="fa-solid fa-file-lines"></i>&nbsp;</i>Data Alternatif</div>
			</div>



			<h2 class="ui header"></h2>
			<hr><br>
			<!-- <p class="text-break">Unggah Data Alternatif</p>
			<div class="d-grid gap-2 d-md-flex justify-content-md-start">
				<form class="" action="" method="post" enctype="multipart/form-data">
					<input type="file" name="excel" required value="">
					<button type="submit" name="import">Unggah Data</button>
				</form>
			</div> -->
			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<!-- <a href="tambah.php?jenis=alternatif">
					<div class="d-grid gap-2 d-md-flex justify-content-md-end">
						<button class="btn btn-primary me-md-2" type="button"><i class="fa-solid fa-plus"></i>&nbsp;</i>Tambah Data </button>

					</div>
				</a> -->
				<button type="button" onclick="location.href='form_import.php'"  class="btn btn-danger"><span class="fa-solid fa-upload"></span> Import Data</button>
				<button type="button" onclick="location.href='tambah.php?jenis=alternatif'" class="btn btn-primary"><span class="fa-solid fa-plus"></span> Tambah Data</button>
			</div>
			<br>
			<!-- <a href="uploadalt.php">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<button class="btn btn-primary me-md-2" type="button"><i class="fa-solid fa-plus"></i>&nbsp;</i>Import Data </button>

				</div>
				<br>
			</a> -->
			<!-- <br><br> -->
			<table width="100%" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Nama Alternatif</th>
						<th>Ditambahkan Oleh</th>
						<th width="100px">Aksi</th>
					</tr>
				</thead>
				<tbody>


					<?php
					// Menampilkan list alternatif
					// $query = "SELECT id,nama FROM alternatif ORDER BY id";
					$query= "SELECT A.id, A.nama, U.nama_lengkap FROM alternatif AS A INNER JOIN user As U ON A.id_user=U.id_user ORDER BY A.id";
					$result	= mysqli_query($koneksi, $query);

					$i = 0;
					while ($row = mysqli_fetch_array($result)) {
						$i++;
					?>
						<tr>

							<td><?php echo $i ?></td>
							<td><?php echo $row['nama'] ?></td>
							<td><?php echo $row['nama_lengkap'] ?></td>
							<td class="right aligned collapsing">
								<form method="post" action="alternatif.php">
									<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
									
									<button type="submit" name="edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button>
									<button onClick="return confirm('Yakin Menghapus Alternatif?')" type="submit" name="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
								</form>
							</td>
						</tr>

					<?php } ?>

				</tbody>
			</table>

			<br>




			<?php include('template/footer.php'); ?>
		<?php } ?>