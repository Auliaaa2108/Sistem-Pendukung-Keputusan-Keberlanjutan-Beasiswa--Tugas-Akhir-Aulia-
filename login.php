<?php

require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="<?= $main_url ?>asset/sb-admin/css/styles.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="shortcut icon" href="asset/image/logo.png" type="image/x-icon">
    <style>
        /* Tambahkan style tambahan di sini */
        body {
            background-image: url('asset/image/genbi.jpeg'); /* Ganti 'path/to/background-image.jpg' dengan path ke gambar latar belakang Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(1px); /* Atur tingkat blur sesuai kebutuhan */
            background-position-y: 70px;
        }
        
        .header{
            background-color: #0137A0; /* Atur warna latar belakang biru */
            color: white; /* Atur warna teks putih */
            text-align: center;
            padding: 20px;
            position: relative; /* Menetapkan posisi relative */
        }
        
        .card {
            margin-top: 60px;
            box-shadow: 0px 0px 10px rgba(#0137A0); /* Menambahkan bayangan */
        }
        
        /* .form-floating label {
            background-color: #fff;
        } */
        
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Selamat Datang di</h1>
        <h3>Sistem Pendukung Keputusan Menentukan Keberlanjutan Beasiswa Setiap Semester</h3>
        
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="cek_login.php">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="username" id="InputUsername1" type="text">
                                <label for="InputUsername1">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" id="InputPassword1" type="password">
                                <label for="InputPassword1">Password</label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= $main_url ?>asset/sb-admin/js/scripts.js"></script>
</body>
</html>
