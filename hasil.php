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
			<style>
				table{
					border-collapse: collapse;
					width: max-content;
				}
				th,
				td,
				tr {
					border-collapse: collapse;
					border: 1px solid black;
					padding: 5px;
					text-align: left;
					white-space: nowrap; /* Mencegah teks patah menjadi beberapa baris */
					/* Mengatur isi sel tabel ke tengah horizontal */
					/* vertical-align: middle; */
					/* Mengatur isi sel tabel ke tengah vertikal */
				}
			</style>
			<h1 class="mt-4">Hasil Akhir Perhitungan dari Nilai Priority vector Secara Keseluruhan</h1>
			<!-- <section class="content"> -->
			
			<!-- <h2 class="ui header">Hasil Akhir Perhitungan</h2> -->
			<div style="overflow-x:auto;">
				<table class="table table-striped table-hover">
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
							echo "<td>" . number_format(getKriteriaPV(getKriteriaID($x)), 4) . "</td>";

							for ($y = 0; $y <= (getJumlahAlternatif() - 1); $y++) {
								echo "<td>" . number_format(getAlternatifPV(getAlternatifID($y), getKriteriaID($x)), 4) . "</td>";
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
								echo "<th>" . number_format($nilai[$i], 4) . "</th>";
							}
							?>
						</tr>
					</tfoot>

				</table>
			</div>

			<h2 class="ui header">Hasil Akhir Perangkingan Nama Mahasiswa Penerima Beasiswa yang Masih Berhak Lanjut Menerima Beasiswa</h2>
			<form action="cetak.php" method="post">
				<label for="limit">Masukkan Jumlah Data yang ingin di cetak:</label>
				<input type="number" name="limit" id="limit">
				<!-- <label for="univ">Masukkan Universitas:</label>
				<input type="text" name="univ" id="univ"> -->
				<!-- <button class="btn btn-primary me-md-2" type="button"><i class="fa-solid fa-print"></i>&nbsp;</i>Cetak</button> -->
				<input type="submit" class="btn btn-primary me-md-2" value="Cetak">
			</form>
			<hr><br>

			
			<!-- <hr><br> -->
			
			<table class="table table-striped table-hover">
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
								echo "<td> 1</td>";
							} else {
								echo "<td width='100px'>" . $i . "</td>";
							}

							?>

							<td><?php echo $row['nama'] ?></td>
							<td><?php echo number_format($row['nilai'], 4) ?></td>
						</tr>

					<?php
					}


					?>
				</tbody>
			</table>
			<!-- <a href="cetak.php" target="_blank">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					
				</div>
			</a> -->
			

			
		<?php include('template/footer.php');
	} ?>