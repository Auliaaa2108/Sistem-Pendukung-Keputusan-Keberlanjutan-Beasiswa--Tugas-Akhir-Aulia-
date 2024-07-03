<?php

include('config.php');
include('fungsi.php');


// menghitung perangkingan
$jmlKriteria 	= getJumlahKriteria();
$jmlAlternatif	= getJumlahAlternatif();
$nilai			= array();

// mendapatkan nilai tiap alternatif
for ($x = 0; $x <= ($jmlAlternatif - 1); $x++) {
	// inisialisasi
	$nilai[$x] = 0;

	for ($y = 0; $y <= ($jmlKriteria - 1); $y++) {
		$id_alternatif 	= getAlternatifID($x);
		$id_kriteria	= getKriteriaID($y);

		$pv_alternatif	= getAlternatifPV($id_alternatif, $id_kriteria);
		$pv_kriteria	= getKriteriaPV($id_kriteria);

		$nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
	}
}

// update nilai ranking
for ($i = 0; $i <= ($jmlAlternatif - 1); $i++) {
	$id_alternatif = getAlternatifID($i);
	$query = "INSERT INTO ranking VALUES ($id_alternatif,$nilai[$i]) ON DUPLICATE KEY UPDATE nilai=$nilai[$i]";
	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal mengupdate ranking";
		exit();
	}
}

session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
	echo "<script>alert('Silahkan Login Terlebih Dahulu !'); window.location = 'login.php'</script>";
} else {

?>
	<!DOCTYPE HTML>
	<html>
		<style>
			table,th,td{
				border-collapse: collapse;
				border: 1px solid black;
				padding: 5px;
			}
		</style>

	<head>
		<title>Laporan Akhir</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
		<link rel="icon" href="img/logoo.png">
	</head>

	<body onload="print()">
		<center>
			<hr>
			<h2>Laporan Hasil Akhir</h2>
			<h2>Sistem Pendukung Keputusan Menentukan Keberlanjutan Beasiswa setiap Semester</h2>
			<hr>
		</center>

		<section>
			<h2 class="ui header">Hasil Akhir Perhitungan</h2>
			<table>
				<thead>
					<tr>
						<th>Overall Composite Height</th>
						<th>Rata - Rata</th>
						<?php
						for ($i = 0; $i <= (getJumlahAlternatif() - 1); $i++) {
							echo "<th>" . getAlternatifNama($i) . "</th>\n";
						}
						?>
					</tr>
				</thead>
				<tbody>

					<?php
					for ($x = 0; $x <= (getJumlahKriteria() - 1); $x++) {
						echo "<tr>";
						echo "<td>" . getKriteriaNama($x) . "</td>";
						echo "<td>" . round(getKriteriaPV(getKriteriaID($x)), 4) . "</td>";

						for ($y = 0; $y <= (getJumlahAlternatif() - 1); $y++) {
							echo "<td>" . round(getAlternatifPV(getAlternatifID($y), getKriteriaID($x)), 4) . "</td>";
						}


						echo "</tr>";
					}
					?>
				</tbody>

				<tfoot>
					<tr>
						<th colspan="2">Total</th>
						<?php
						for ($i = 0; $i <= ($jmlAlternatif - 1); $i++) {
							echo "<th>" . round($nilai[$i], 4) . "</th>";
						}
						?>
					</tr>
				</tfoot>

			</table>


			<h2 class="ui header">Perangkingan</h2>
			<table>
				<thead>
					<tr>
						<th>Peringkat</th>
						<th>Alternatif</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query  = "SELECT id,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai DESC";
					$result = mysqli_query($koneksi, $query);

					$i = 0;
					while ($row = mysqli_fetch_array($result)) {
						$i++;
					?>
						<tr>
							<?php if ($i == 1) {
								echo "<td><div class=\"ui ribbon label\">1</div></td>";
							} else {
								echo "<td width='100px'>" . $i . "</td>";
							}

							?>

							<td><?php echo $row['nama'] ?></td>
							<td><?php echo round($row['nilai'], 4) ?></td>
						</tr>

					<?php
					}


					?>
				</tbody>
			</table>



			<hr>
			<center>
				<p> Sistem Pendukung Keputusan Menentukan Keberlanjutan Beasiswa setiap Semester </p>
				<script>
					$date = new Date();
					document.write($date);
				</script>
			</center>
			<hr>

			<h2>Rekomendasi</h2>
			<hr>
			<h3>Berdasarkan Hasil diatas , maka rekomendasi Mahasiswa yang masih berhak lanjut menerima Beasiswa Bank Indonesia di semester selanjutnya jatuh kepada:</h3>
			<?php
			$query = "SELECT id,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai DESC limit 5";
			$result = mysqli_query($koneksi, $query);

			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$i++;
			?>
				<tr>
					<h3 style="color:#0394be;"><?php echo $row['nama'] ?></h3>
					<h3 style="color:#0394be;"> Dengan Nilai : <?php echo $row['nilai'] ?></h3>
				</tr>
			<?php
			}
			?>
			<!-- </section> -->
			<hr>

			<!-- <h3><a href="hasil.php"> Kembali </a></h3> -->
		</section>

	</body>
	<script>
		
			window.print();
		
		</script>

			<!-- // <
			// /html> -->
		<?php } ?>