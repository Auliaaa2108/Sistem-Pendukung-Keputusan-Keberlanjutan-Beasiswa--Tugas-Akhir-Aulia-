<?php

// mencari ID kriteria
// berdasarkan urutan ke berapa (C1, C2, C3)
function getKriteriaID($no_urut)
{
	include('config.php');
	$query  = "SELECT id FROM kriteria ORDER BY id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

// mencari ID alternatif
// berdasarkan urutan ke berapa (A1, A2, A3)
function getAlternatifID($no_urut)
{
	include('config.php');
	$query  = "SELECT id FROM alternatif ORDER BY id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut)
{
	include('config.php');
	$query  = "SELECT nama FROM kriteria ORDER BY id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari nama alternatif
function getAlternatifNama($no_urut)
{
	include('config.php');
	$query  = "SELECT nama FROM alternatif ORDER BY id";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari priority vector alternatif
function getAlternatifPV($id_alternatif, $id_kriteria)
{
	include('config.php');
	$query = "SELECT nilai FROM pv_alternatif WHERE id_alternatif=$id_alternatif AND id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}

	return $pv;
}

// mencari priority vector kriteria
function getKriteriaPV($id_kriteria)
{
	include('config.php');
	$query = "SELECT nilai FROM pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}

	return $pv;
}

// mencari jumlah alternatif
function getJumlahAlternatif()
{
	include('config.php');
	$query  = "SELECT count(*) FROM alternatif";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// mencari jumlah kriteria
function getJumlahKriteria()
{
	include('config.php');
	$query  = "SELECT count(*) FROM kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// menambah data kriteria / alternatif
function tambahData($tabel, $nama, $id_user)
{
	include('config.php');
	$sql = "SELECT * FROM $tabel WHERE nama = '$nama'";
	$result = mysqli_query($koneksi, $sql);
	// $id_user = $_SESSION['id_user'];

	if (mysqli_num_rows($result) > 0) {
		// Data sudah ada dalam database
		echo "<script>alert('Data Tersebut Sudah Ada!'); window.location=('index.php'); </script>";
		exit();
	} else {
		// Data belum ada dalam database,bisa lanjut
		$sql_insert = "INSERT INTO $tabel (nama, id_user) VALUES ('$nama', '$id_user')";
		if (mysqli_query($koneksi, $sql_insert)) {
			echo "<script>alert('Berhasil menambahkan data!'); window.location=('kriteria.php'); </script>";
		} else {
			echo "Error: " . $sql_insert . "<br>" . mysqli_error($koneksi);
		}
	}

	mysqli_close($koneksi);

	// $query 	= "INSERT INTO $tabel (nama) VALUES ('$nama')";
	// $tambah	= mysqli_query($koneksi, $query);


	// if (!$tambah) {
	// 	echo "<script>alert('Data Tersebut Sudah Ada!'); window.location=('index.php'); </script>";
	// 	exit();
	// } else {
	// 	echo "<script>alert('Berhasil menambahkan data!'); window.location=('kriteria.php'); </script>";
	// }
}
// menambah data user
function tambahUser($tabel, $nama, $username, $role, $passwordnew)
{
	include('config.php');
	$md5 = md5($passwordnew);
	// $query 	= "INSERT INTO $tabel (nama_lengkap, username, password) VALUES ('$nama', '$username', '$md5')";
	// mysqli_query($koneksi, $query);
	$sql = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($koneksi, $sql);

	if (mysqli_num_rows($result) > 0) {
		// Data sudah ada dalam database
		echo "<script>alert('Data Tersebut Sudah Ada!'); window.location=('admin.php'); </script>";
		exit();
	} else {
		// Data belum ada dalam database, Anda bisa lanjutkan untuk menambahkannya
		// Misalnya:
		$sql_insert = "INSERT INTO $tabel (nama_lengkap, username, role, password) VALUES ('$nama','$username', '$role','$md5')";
		if (mysqli_query($koneksi, $sql_insert)) {
			echo "<script>alert('Berhasil menambahkan data!'); window.location=('admin.php'); </script>";
		} else {
			echo "Error: " . $sql_insert . "<br>" . mysqli_error($koneksi);
		}
	}

	mysqli_close($koneksi);

	// if (!$result) {
	// 	echo "<script>alert('Data Tersebut Sudah Ada!'); window.location=('user.php'); </script>";
	// 	exit();
	// } else {
	// 	echo "<script>alert('Berhasil menambahkan data!'); window.location=('user.php'); </script>";

	// }
}

// hapus kriteria
function deleteKriteria($id)
{
	include('config.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM kriteria WHERE id=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_kriteria
	$query 	= "DELETE FROM pv_kriteria WHERE id_kriteria=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM pv_alternatif WHERE id_kriteria=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_kriteria WHERE kriteria1=$id OR kriteria2=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE pembanding=$id";
	mysqli_query($koneksi, $query);
}

// hapus alternatif
function deleteAlternatif($id)
{
	include('config.php');

	// hapus record dari tabel alternatif
	$query 	= "DELETE FROM alternatif WHERE id=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM pv_alternatif WHERE id_alternatif=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel ranking
	$query 	= "DELETE FROM ranking WHERE id_alternatif=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE alternatif1=$id OR alternatif2=$id";
	mysqli_query($koneksi, $query);
}
// hapus pengguna
function deleteUser($id)
{
	include('config.php');

	// hapus record dari tabel user
	$query 	= "DELETE FROM user WHERE id_user=$id";
	mysqli_query($koneksi, $query);
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV($id_kriteria, $pv)
{
	include('config.php');

	$query = "SELECT * FROM pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO pv_kriteria (id_kriteria, nilai) VALUES ($id_kriteria, $pv)";
	} else {
		$query = "UPDATE pv_kriteria SET nilai=$pv WHERE id_kriteria=$id_kriteria";
	}


	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	}
}

// memasukkan nilai priority vektor alternatif
function inputAlternatifPV($id_alternatif, $id_kriteria, $pv)
{
	include('config.php');

	$query  = "SELECT * FROM pv_alternatif WHERE id_alternatif = $id_alternatif AND id_kriteria = $id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO pv_alternatif (id_alternatif,id_kriteria,nilai) VALUES ($id_alternatif,$id_kriteria,$pv)";
	} else {
		$query = "UPDATE pv_alternatif SET nilai=$pv WHERE id_alternatif=$id_alternatif AND id_kriteria=$id_kriteria";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector alternatif";
		exit();
	}
}


// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1, $kriteria2, $nilai)
{
	include('config.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT * FROM perbandingan_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO perbandingan_kriteria (kriteria1,kriteria2,nilai) VALUES ($id_kriteria1,$id_kriteria2,$nilai)";
	} else {
		$query = "UPDATE perbandingan_kriteria SET nilai=$nilai WHERE kriteria1=$id_kriteria1 AND kriteria2=$id_kriteria2";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}
}

// memasukkan bobot nilai perbandingan alternatif
function inputDataPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding, $nilai)
{
	include('config.php');


	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT * FROM perbandingan_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $id_pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result) == 0) {
		$query = "INSERT INTO perbandingan_alternatif (alternatif1,alternatif2,pembanding,nilai) VALUES ($id_alternatif1,$id_alternatif2,$id_pembanding,$nilai)";
	} else {
		$query = "UPDATE perbandingan_alternatif SET nilai=$nilai WHERE alternatif1=$id_alternatif1 AND alternatif2=$id_alternatif2 AND pembanding=$id_pembanding";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal Memasukkan Data Perbandingan!";
		exit();
	}
}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1, $kriteria2)
{
	include('config.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT nilai FROM perbandingan_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if (mysqli_num_rows($result) == 0) {
		$nilai = 1;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}

	return $nilai;
}

// mencari nilai bobot perbandingan alternatif
function getNilaiPerbandinganAlternatif($alternatif1, $alternatif2, $pembanding)
{
	include('config.php');

	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT nilai FROM perbandingan_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $id_pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}
	if (mysqli_num_rows($result) == 0) {
		$nilai = 1;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}

	return $nilai;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria)
{
	include('config.php');
	$query  = "SELECT nilai FROM ir WHERE jumlah=$jmlKriteria"; //ambil nilai langsung, jdi dia cma sebagai storage.
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$nilaiIR = $row['nilai'];
	}

	return $nilaiIR;
}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a, $matrik_b, $n)
{
	$eigenvektor = 0;
	for ($i = 0; $i <= ($n - 1); $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	}

	return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a, $matrik_b, $n)
{
	$eigenvektor = getEigenVector($matrik_a, $matrik_b, $n);
	$consindex = ($eigenvektor - $n) / ($n - 1);

	return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a, $matrik_b, $n)
{
	$consindex = getConsIndex($matrik_a, $matrik_b, $n);
	$consratio = $consindex / getNilaiIR($n);

	return $consratio;
}

// menampilkan tabel perbandingan bobot
function showTabelPerbandingan($jenis, $kriteria)
{
	include('config.php');

	if ($kriteria == 'kriteria') {
		$n = getJumlahKriteria();
	} else {
		$n = getJumlahAlternatif();
	}

	$query = "SELECT nama FROM $kriteria ORDER BY id";
	$result	= mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Error Koneksi Database!!!";
		exit();
	}

	// buat list nama pilihan
	while ($row = mysqli_fetch_array($result)) {
		$pilihan[] = $row['nama'];
	}

	// tampilkan tabel
?>

	<form class="ui form" action="proses.php" method="post">
		<table class="ui celled padded table">

			<thead>
				<tr>
					<th colspan="2">Tentukan Yang Lebih Penting</th>
					<th>Nilai Perbandingan</th>
				</tr>
			</thead>
			<tbody>

				<?php

				//inisialisasi
				$urut = 0;

				for ($x = 0; $x <= ($n - 2); $x++) {
					for ($y = ($x + 1); $y <= ($n - 1); $y++) {

						$urut++;

				?>
						<tr>
							<td>
								<div class="field" >
									<div class="form-check form-check-inline">
										<input name="pilih<?php echo $urut ?>" value="1" checked="" class="hidden" type="radio">
										<label><?php echo $pilihan[$x]; ?></label>
									</div>
								</div>
							</td>
							<td>
								<div class="field">
									<div class="form-check form-check-inline">
										<input name="pilih<?php echo $urut ?>" value="2" class="hidden" type="radio">
										<label><?php echo $pilihan[$y]; ?></label>
									</div>
								</div>
							</td>
							<td>
								<div class="field">

									<?php
									if ($kriteria == 'kriteria') {
										$nilai = getNilaiPerbandinganKriteria($x, $y);
									} else {
										$nilai = getNilaiPerbandinganAlternatif($x, $y, ($jenis - 1));
									}

									?>
		
									
									<input type="number" step="any" name="bobot<?php echo $urut ?>" value="<?php echo $nilai ?>" required>
								</div>
							</td>
						</tr>
				<?php
					}
				}
				

				?>
			</tbody>
		</table>
		<div class="d-grid gap-2 d-md-flex justify-content-md-end">
			<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
			<input class="ui submit primary button" type="submit" name="submit" value="PROSES">
		</div>
	</form>

<?php
}

?>