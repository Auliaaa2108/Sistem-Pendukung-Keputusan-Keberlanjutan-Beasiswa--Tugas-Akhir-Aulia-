<?php
include('config.php');
include('fungsi.php');

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
				* {
					box-sizing: border-box;
				}

				.row {
					margin-left: -5px;
					margin-right: -5px;
				}

				.column {
					float: left;
					width: 50%;
					padding: 2px;
				}

				/* Clearfix (clear floats) */
				.row::after {
					content: "";
					clear: both;
					display: table;
				}

				table {
					border-collapse: collapse;
					border-spacing: 0;
					width: 100%;
					border: 1px solid #ddd;
				}

				th,
				td {
					text-align: left;
					padding: 10px;
				}

				tr:nth-child(even) {
					background-color: #f2f2f2;
				}
			</style>
			<h1 class="mt-4">Perbandingan Kriteria</h1>


			<div class="ui breadcrumb">
				<a class="section"><i class="fa-solid fa-magnifying-glass-chart"></i>Analisa Data</a>
				<div class="divider"> / </div>
				<div class="active section"><i class="fa-solid fa-server"></i>Perbandingan Kriteria</div>
			</div>
			<h2>Petunjuk Penilaian</h2>
			<p>Nilai Perbandingan berikut sesuai dengan Skala Perbandingan Metode AHP Saaty.</p>

			<div class="row">
				<div class="column">
					<table>

						<tr>
							<td>1</td>
							<td>Kedua elemen sama pentingnya.</td>

						</tr>
						<tr>
							<td>3</td>
							<td>Elemen yang satu sedikit lebih penting daripada elemen lainnya.</td>

						</tr>
						<tr>
							<td>5</td>
							<td>Elemen yang satu lebih penting dari elemen lainnya.</td>

						</tr>
					</table>
				</div>
				<div class="column">
					<table>
						<tr>
							<td>7</td>
							<td>Satu elemen jenis lebih mutlak penting dari elemen yang lainnya.</td>

						</tr>
						<tr>
							<td>9</td>
							<td>Satu elemen mutlak penting daripada elemen lainnya.</td>

						</tr>
						<tr>
							<td>2,4,6,8</td>
							<td>Nilai-nilai diantara dua nilai pertimbangan yang berdekatan.</td>

						</tr>
					</table>
				</div>

			</div>
			<h2 class="ui header">Penentuan Bobot Kriteria</h2>
			<?php showTabelPerbandingan('kriteria', 'kriteria'); ?>



		<?php } ?>
		<br><br>
		<?php include('template/footer.php'); ?>