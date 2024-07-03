<?php
	// connection
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'spk_beasiswa_bi';

	$koneksi = mysqli_connect($host,$user,$password);

	if (!$koneksi)
	{
		echo "Tidak dapat terkoneksi dengan server";
		exit();
	}

	if(!mysqli_select_db($koneksi, $database))
	{
		echo "Tidak dapat menemukan database";
		exit();
	}
//url induk
$main_url = "http://localhost/ta-Aulia/";
$title ="Sistem Pendukung Keputusan Penentuan Keberlanjutan Beasiswa Bank Indonesia";

?>
<?php $koneksi = mysqli_connect("localhost", "root", "", "spk_beasiswa_bi"); ?>