<?php
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
			<br>
			<div class="ui breadcrumb">
				<a class="section"><i class="fa-solid fa-file-lines"></i>Perbandingan Alternatif</a>
				<div class="divider"> / </div>
				<div class="active section">Hasil Perbandingan Alternatif Terhadap Kriteria <?php echo getKriteriaNama($jenis - 1) ?></div>
			</div>
			<h3 class="ui header">Tabel Perbandingan Berpasangan Kriteria <?php echo getKriteriaNama($jenis - 1) ?></h3>
			<style>
				table {
					border-collapse: collapse;
					width: max-content;
				}

				th,
				td,
				tr {
					border-collapse: collapse;
					
					padding: 5px;
					text-align: left;
					white-space: pre-wrap;
					/* Mencegah teks patah menjadi beberapa baris */
					/* Mengatur isi sel tabel ke tengah horizontal */
					/* vertical-align: middle; */
					/* Mengatur isi sel tabel ke tengah vertikal */
				}
			</style>
			<div style="overflow-x:auto;">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Alternatif</th>
							<?php
							for ($i = 0; $i <= ($n - 1); $i++) {
								echo "<th>" . getAlternatifNama($i) . "</th>";
							}
							?>
						</tr>
					</thead>
					<tbody>
						<?php
						for ($x = 0; $x <= ($n - 1); $x++) {
							echo "<tr>";
							echo "<td>" . getAlternatifNama($x) . "</td>";
							for ($y = 0; $y <= ($n - 1); $y++) {
								echo "<td>" . number_format($matrik[$x][$y], 4) . "</td>";
							}

							echo "</tr>";
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>Jumlah</th>
							<?php
							for ($i = 0; $i <= ($n - 1); $i++) {
								echo "<th>" . number_format($jmlmpb[$i], 4) . "</th>";
							}
							?>
						</tr>
					</tfoot>
				</table>

			</div>
			<br>
			<div style="overflow-x:auto;">
				<h3 class="ui header">Tabel Normalisasi Alternatif Terhadap Kriteria <?php echo getKriteriaNama($jenis - 1) ?></h3>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Alternatif</th>
							<?php
							for ($i = 0; $i <= ($n - 1); $i++) {
								echo "<th>" . getAlternatifNama($i) . "</th>";
							}
							?>
							<th>Jumlah</th>
							<th>Priority vector</th>
						</tr>
					</thead>
					<tbody>
						<?php
						for ($x = 0; $x <= ($n - 1); $x++) {
							echo "<tr>";
							echo "<td>" . getAlternatifNama($x) . "</td>";
							for ($y = 0; $y <= ($n - 1); $y++) {
								echo "<td>" . number_format($matrikb[$x][$y], 4) . "</td>";
							}

							echo "<td>" . number_format($jmlmnk[$x], 4) . "</td>";
							echo "<td>" . number_format($pv[$x], 4) . "</td>";

							echo "</tr>";
						}
						?>

					</tbody>
					<tfoot>
						<tr>
							<th colspan="<?php echo ($n + 2) ?>">Principe Eigen Vector (λ maks)</th>
							<th><?php echo (number_format($eigenvektor, 4)) ?></th>
						</tr>
						<tr>
							<th colspan="<?php echo ($n + 2) ?>">Consistency Index (CI)</th>
							<th><?php echo (number_format($consIndex, 4)) ?></th>
						</tr>
						<tr>
							<th colspan="<?php echo ($n + 2) ?>">Consistency Ratio (CR)</th>
							<th><?php echo (number_format($consRatio, 4)) ?></th>
						</tr>
					</tfoot>
				</table>
			</div>


			<?php

			if ($consRatio > 0.1) {
			?>
				<div class="ui icon blue message">
					<i class="fa-solid fa-triangle-exclamation"></i>
					<div class="content">
						<div class="header">
							Nilai Consistency Ratio Tidak Konsisten
						</div>
						<p>Silahkan input kembali pada tabel penentuan bobot.</p>
					</div>
				</div>

				<br>

				<a href='javascript:history.back()'>
					<button class="ui left labeled primary icon button">
						<i class="fa-solid fa-arrow-left"></i>
						Kembali
					</button>
				</a>

				<?php

			} else {
				if ($jenis == getJumlahKriteria()) {
				?>

					<br>

					<form action="hasil.php">
						<button class="btn btn-info" style="float: right;">
							Lanjut
							<i class="fa-solid fa-right-long"></i>

						</button>
					</form>


				<?php

				} else {

				?>
					<br>
					<a href="<?php echo "bobot.php?c=" . ($jenis + 1) ?>">
						<button class="btn btn-info" style="float: right;">
							Lanjut
							<i class="fa-solid fa-right-long"></i>

						</button>
					</a>


			<?php

				}
			}

			echo "</section>";


			?>
		<?php } ?>
		<br><br>
		<?php include('template/footer.php'); ?>