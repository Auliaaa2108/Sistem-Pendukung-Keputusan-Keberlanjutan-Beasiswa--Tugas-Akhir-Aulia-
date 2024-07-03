<?php
require_once('vendor/autoload.php'); 
require('vendor/tecnickcom/tcpdf/tcpdf.php');// Sesuaikan dengan lokasi pustaka PDF

// Koneksi ke database
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
$limitdata = $_POST['limit'];
// $univ =$_POST['univ'];
// Query MySQL untuk mendapatkan data

$query = "SELECT id,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai DESC limit $limitdata";
$result = mysqli_query($koneksi, $query);
// Initialize a counter
$i = 0;
                    // $result = $koneksi->query($query);
                    // $result = mysqli_query($koneksi, $query);

					// $i = 0;
					// while ($row = mysqli_fetch_array($result)) 
					// 	$i++;
					





// Membuat objek PDF
$pdf = new TCPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetMargins(10, 10, 10); // Set margin halaman

$pdf->Image('asset/image/genbisumbar.png',10,11,40);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Image('asset/image/univ.png',160,11,40);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(5);
$pdf->Cell(0, 5, 'GENERASI BARU INDONESIA SUMATERA BARAT', 0, 1, 'C');
$pdf->Cell(5);
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(0,5,'Jati Baru, Kec. Padang Timur., Kota Padang, Sumatera Barat 25129', 0, 1, 'C');
$pdf->Cell(5);
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(0,5,'HP : +62 838-5092-1293', 0, 1, 'C');
$pdf->Cell(5);
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell(0,5,'Email: genbisumbarofficial@gmail.com', 0, 1, 'C');

$pdf->SetLineWidth(1);
$pdf->Line(10,31,200,31);
$pdf->SetLineWidth(0);
$pdf->Line(10,31,200,31);
$pdf->Ln(6);


// Membuat header


// Output kalimat dalam laporan
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Hasil Akhir Monitoring GenBI Sumatera Barat', 0, 1, 'C');
$pdf->Ln(2);

$pdf->Ln(3);
$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(0, 10, 'Berdasarkan hasil perhitungan dengan menggunakan aplikasi sistem pendukung keputusan Menentukan Keberlanjutan Beasiswa setiap Semester dengan Metode Analytical Hierarchy Process, rekomendasi nama mahasiswa yang masih berhak menerima Beasiswa Bank Indonesia di semester selanjutnya tertera pada tabel berikut:', 0, 'L', false, 1, '', '', true, 0, false, true, 0, 'T');


// Membuat tabel dengan data dari database
$pdf->Ln(3);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetFillColor(200, 220, 255);
// $pdf->Cell(40, 10, 'Peringkat', 1, 0, 'C', 1);
$pdf->SetX(70);
$pdf->Cell(10, 10, 'No', 1, 0, 'C', 1);
$pdf->Cell(60, 10, 'Nama Mahasiswa', 1, 1, 'C', 1);
// $pdf->Cell(60, 10, 'Universitas', 1, 1, 'C', 1);

while ($row = mysqli_fetch_array($result)) {
    
    // $pdf->Cell(40, 10, $row['id_alternatif'], 1);
    $pdf->SetX(70);
    $pdf->SetFont('helvetica', '', 10);
    $i++;
    $pdf->Cell(10, 10, ($i == 1 ? "1" : $i), 1, 0, 'C');
    $pdf->Cell(60, 10, $row['nama'], 1, 0, 'L');
    // $pdf->Cell(60, 10, $univ, 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Ln(3);
$pdf->SetFont('helvetica', '', 10);
$text = "Demikian Hasil rekomendasikan nama-nama mahasiswa tersebut di atas diputuskan berdasarkan Aplikasi Sistem Pendukung Keputusan Menentukan Keberlanjutan Beasiswa setiap Semester menggunakan Metode Analytical ";
$text1 = "Hierarchy Proses (AHP).";
$pdf->MultiCell(0, 10, $text, 0, 'J');
$pdf->MultiCell(0, 10, $text1, 0, 'L');
// $pdf->MultiCell(0, 5, '', 0, 'J');

$pdf->Ln(8);
$pdf->SetFont('helvetica', '', 10);
$pdf->SetX(130);
$tanggal_sekarang = date('d F Y');
$pdf->Cell(190, 5, 'Padang, ' . $tanggal_sekarang, 0, 1, 'L');
// $pdf->Cell(190);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetX(130);
$pdf->Cell(190, 5, 'Mengetahui', 0, 1, 'L');
// $pdf->Cell(190);
$pdf->SetX(130);
$pdf->Cell(190, 5, 'Ketua Umum GenBI Sumatera Barat', 0, 1, 'L');
$pdf->Ln(16);
$pdf->SetX(130);
$pdf->SetFont('helvetica', 'U', 10);
$pdf->Cell(190, 5, 'Zulpan Efendi', 0, 1, 'L');
      
// Menambahkan tanda tangan teks ke laporan





// Simpan atau tampilkan PDF
$pdf->Output('Laporan Hasil Akhir Monitoring GenBI Sumatera Barat.pdf', 'D'); // 'D' akan men-download PDF ke perangkat

// Tutup koneksi database
$koneksi->close();
?>
