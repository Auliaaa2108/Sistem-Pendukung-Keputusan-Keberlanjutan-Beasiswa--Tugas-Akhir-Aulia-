<?php

include('config.php');
include('fungsi.php');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once('vendor/autoload.php');

include('template/header.php');
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu !'); window.location = 'login.php'</script>";
} else {

    include('template/header.php');
    include('template/sidebar.php');
    include('template/navbar.php');


    if (isset($_POST['import'])) {


        // Periksa apakah file telah diunggah
        if (empty($_FILES["exceldata"]["tmp_name"])) {
            echo "<script>alert('Upload file terlebih dahulu!'); window.location = 'form_import.php';</script>";
            die();
        }
        
        $allowedFileType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];

        if (in_array($_FILES["exceldata"]["type"], $allowedFileType)) {
            $filename = $_FILES['exceldata']['name'];
            $tempname = $_FILES['exceldata']['tmp_name'];

            move_uploaded_file($tempname, 'uploads/' . $filename);


            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadSheet = $Reader->load('uploads/' . $filename);
            $excelSheet = $spreadSheet->getActiveSheet();
            $spreadSheetAry = $excelSheet->toArray();
            $sheetCount = count($spreadSheetAry);




            $duplicateNames = array();

            for ($i = 1; $i < $sheetCount; $i++) {
                $nama = mysqli_real_escape_string($koneksi, $spreadSheetAry[$i][0]);
                $checkQuery = "SELECT * FROM alternatif WHERE nama = '$nama'";
                $result = mysqli_query($koneksi, $checkQuery);

                if (mysqli_num_rows($result) == 0) {
                    // Data belum ada di database, maka sisipkan
                    $sql = "INSERT INTO alternatif (nama) VALUES ('$nama')";
                    mysqli_query($koneksi, $sql);
                } else {
                    // Data sudah ada di database, tambahkan ke array
                    $duplicateNames[] = $nama;
                }
            }

            // Setelah loop selesai, periksa apakah ada data yang sama
            if (!empty($duplicateNames)) {
                $errorMessage = "Data berikut sudah ada di database: " . implode(", ", $duplicateNames);
                echo "
        <script>
        alert('$errorMessage data lainnya yang tidak sama yang akan ditambahkan');
        document.location.href = 'alternatif.php';
        </script>
    ";
            } else {
                echo "
        <script>
        alert('Successfully Imported');
        document.location.href = 'alternatif.php';
        </script>
    ";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">





<body>
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="container mt-3">
                <!-- <div class="row justify-content-center"> -->
                <!-- <div class="col-xl-6"> -->
                    <h2>Import Data Alternatif</h2>
                    <div class="ui breadcrumb">
                        <a class="section"><i class="fa-solid fa-server"></i>Data</a>
                        <div class="divider"> / </div>
                        <a href="alternatif.php" class="section"><i class="fa-solid fa-file-lines"></i>Data Alternatif</a>
                        <div class="divider"> / </div>
                        <div class="active section"><i class="fa-solid fa-upload"></i>&nbsp;</i>Import Alternatif</div>
                    </div>
                    <br>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="email">Upload File Alternatif:</label>
                            <br>
                            <input type="file" class="form-control" name="exceldata" accept=".xls, .xlsx">
                        </div>


                        <button type="submit" name="import" class="btn btn-primary">Upload</button>


                        <a href="asset/template.xlsx" class="float-right" download>Download Template File</a>

                    </form>


                </div>
            </div>
        </div>


</body>

</html>