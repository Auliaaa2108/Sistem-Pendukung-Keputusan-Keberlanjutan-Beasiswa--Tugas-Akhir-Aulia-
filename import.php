<?php
include "config.php";
include 'excelReader/excel_reader2.php';


require 'vendor/autoload.php'; // Lokasi pustaka PhpSpreadsheet

if (isset($_POST['submit'])) {
    $file = $_FILES['fileToUpload']['tmp_name'];

    if (empty($file)) {
        die("Pilih file Excel terlebih dahulu.");
    }

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    $worksheet = $spreadsheet->getActiveSheet();
    $data = $worksheet->toArray();

    // Tampilkan pratinjau data
    echo '<table border="1">';
    foreach ($data as $row) {
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . $cell . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    // Anda dapat menyimpan data ke database MySQL di sini
    // Gunakan data dalam $data array untuk menyimpannya
}
?>

<!-- 
// if (isset($_POST["import"])) {
//     $fileName = $_FILES["excel"]["name"];
//     $fileExtension = explode('.', $fileName);
//     $fileExtension = strtolower(end($fileExtension));
//     $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

//     $targetDirectory = "uploads/" . $newFileName;
//     move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

//     error_reporting(0);
//     ini_set('display_errors', 0);

//     require 'excelReader/excel_reader2.php';
//     require 'excelReader/SpreadsheetReader.php';

//     $reader = new SpreadsheetReader($targetDirectory);
//     foreach ($reader as $key => $row) {
//         $nama = $row[0];

//         mysqli_query($conn, "INSERT INTO alternatif VALUES('', '$nama')");
//     }

//     echo
//     "
// <script>
// alert('Succesfully Imported');
// document.location.href = '';
// </script>
// ";
// }

// $data = new Spreadsheet_Excel_Reader($_FILES["excel"]["file"]);
// $baris = $data->rowcount($sheet_index=0);
// $sukses=0;
// $gagal=0;

// for($i=2;$i<=$baris;$i++){
//     $nama = $data->val($i,1);

//     $query = mysqli_query($koneksi, "INSERT INTO alternatif VALUES('', '$nama')");

//     if($query) $sukses++;
//     else $gagal++;

// }

// echo "<h3>Proses Import data selesai</h3>";
// echo "jumlah data berhasil diinput : ".$sukses."<br>";
// echo "jumlah data gagal diinput : ".$gagal."<br>"; -->
