<?php

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
			<div class="ui breadcrumb">

				<a class="section"><i class="fa-solid fa-server"></i>Perbandingan Kriteria</a>
				<div class="divider"> / </div>
				<div class="active section">Hasil Perbandingan Kriteria</div>
			</div>
			
			<h3 class="ui header">Tabel Perbandingan Berpasangan</h3>
			<table class="table table-striped table-hover">
				<thead>
					<tr>

						<th>Kriteria</th>

						<?php
						for ($i = 0; $i <= ($n - 1); $i++) {
							echo "<th>" . getKriteriaNama($i) . "</th>";
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
					for ($x = 0; $x <= ($n - 1); $x++) {
						echo "<tr>";
						echo "<td>" . getKriteriaNama($x) . "</td>";
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


			<br>

			<h3 class="ui header">Tabel Normalisasi Matriks Kriteria Utama</h3>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Kriteria</th>
						<?php
						for ($i = 0; $i <= ($n - 1); $i++) {
							echo "<th>" . getKriteriaNama($i) . "</th>";
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
						echo "<td>" . getKriteriaNama($x) . "</td>";
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
					<!-- kalau mau ganti jadi 0 ga kebaca pake kode"number_format". -->
				</tfoot>
			</table>

			<?php
			if ($consRatio > 0.1) {
			?>
				<div class="ui icon blue message">
				<!-- <i class="fa-regular fa-circle-xmark"></i> -->
					
					<div class="content">
					
						<div class="header">
						<i class="fa-solid fa-circle-exclamation"></i>Nilai Tidak Konsisten
						</div>
						<p>Silahkan input kembali pada tabel penentuan bobot.</p>
					</div>
				</div>

				

				<a href='javascript:history.back()'>
					<button class="btn btn-primary me-md-2">
						<i class="fa-solid fa-arrow-left"></i>
						<!-- <i class="left arrow icon"></i> -->
						Kembali
					</button>
				</a>
				<br><br>
			<?php
			} else {

			?>
				
			
			
			<?php
			
			}
			echo "</section>";
			include('template/footer.php');
			
			?>
			
		<?php } ?>