<?php

include "config.php";
include('fungsi.php');

session_start();
if (!isset($_SESSION['nama_lengkap'])) {
    echo "<script>location.href='login.php'</script>";
}

require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";


?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <main>
            <!DOCTYPE html>
            <html>

            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                    body {
                        font-family: Arial;
                    }

                    /* Style the tab */
                    .tab {
                        overflow: hidden;
                        border: 1px solid #ccc;
                        background-color: #f1f1f1;
                    }

                    /* Style the buttons inside the tab */
                    .tab button {
                        background-color: inherit;
                        float: left;
                        border: none;
                        outline: none;
                        cursor: pointer;
                        padding: 14px 16px;
                        transition: 0.3s;
                        font-size: 17px;
                    }

                    /* Change background color of buttons on hover */
                    .tab button:hover {

                        background-color: #ddd;
                    }

                    /* Create an active/current tablink class */
                    .tab button.active {
                        background-color: #0137A0;
                        color: #FFFFFF;
                    }

                    /* Style the tab content */
                    .tabcontent {
                        display: none;
                        padding: 6px 12px;
                        border: 1px solid #ccc;
                        border-top: none;
                    }

                    h3 {
                        text-align: center;
                        text-transform: uppercase;
                        color: #0137A0;
                    }



                    p1 {
                        text-indent: 50px;
                        text-align: justify;

                    }

                    .center {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        width: 50%;
                    }

                    table,
                    th,
                    td,
                    tr {
                        border-collapse: collapse;
                        border: 1px solid black;
                        padding: 5px;
                    }

                    .centeri {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        /* Sesuaikan tinggi gambar sesuai kebutuhan */
                    }

                    .center img {
                        max-width: 100%;
                        max-height: 100%;
                    }
                </style>
            </head>

            <body>

                <h2>Beranda 
                    
                </h2>
                <p>Klik tombol di dalam menu tab yang ingin anda lihat</p>

                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'Tentang Aplikasi')">Tentang Aplikasi</button>
                    <button class="tablinks" onclick="openCity(event, 'Tabel Kepentingan Saaty 1990')">Tabel Kepentingan Saaty 1990</button>
                    <button class="tablinks" onclick="openCity(event, 'Pembobotan Nilai')">Pembobotan Nilai Kriteria</button>
                </div>

                <div id="Tentang Aplikasi" class="tabcontent">
                    <h3>Sistem Pendukung Keputusan Menentukan Keberlanjutan Beasiswa setiap Semester</h3>
                    <p1>Sistem Pendukung Keputusan Menentukan Keberlanjutan Beasiswa setiap Semester merupakan aplikasi yang dapat membantu Koordinator Wilayah GenBI Sumbar dalam memberikan rekomendasi penentuan prioritas penerima beasiswa agar keputusan yang akan diambil jauh lebih terstruktur dan menyeluruh.
                        Aplikasi ini dibangun dengan menggunakan bahasa pemrograman PHP dan JavaScript. Serta Basis Data yang digunakan adalah MySQL. Dalam proses perhitungannya, aplikasi ini menggunakan Metode Analytical Hierarchy Proses (AHP).</p1>


                    <h3>Flowchart Cara Penggunaan Aplikasi Sistem Pendukung Keputusan Keberlanjutan Beasiswa setiap Semester</h3>

                    <div class="centeri">
                        <img src="asset/image/FC_APLIKASI.png" alt="Gambar Aplikasi">
                    </div>




                </div>

                <div id="Tabel Kepentingan Saaty 1990" class="tabcontent">
                    <h3>Tabel Tingkat Kepentingan menurut Saaty (1990)</h3>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            <!-- Tabel Tingkat Kepentingan menurut Saaty (1990) -->
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Nilai Numerik</th>
                                        <th>Tingkat Kepentingan (Preference)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nilai Numerik</th>
                                        <th>Tingkat Kepentingan (Preference)</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Sama pentingnya (Equal Importance)</td>

                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sama hingga sedikit lebih penting</td>

                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sedikit lebih penting (Slightly more importance)</td>

                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Sedikit lebih hingga jelas lebih penting</td>

                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jelas lebih penting (Materially more importance)</td>

                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Jelas hingga sangat jelas lebih penting</td>

                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Sangat jelas lebih penting (Significantly more importance)</td>

                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Sangat jelas hingga mutlak lebih penting</td>

                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Mutlak lebih penting (Absolutely more importance)</td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="Pembobotan Nilai" class="tabcontent">
                    <center>
                        <h3>Pembobotan Nilai Status Keaktifan di Komunitas</h3>
                        <table class="table table-striped" style="width:50%">
                            <thead>
                                <tr>

                                    <th>Status Keaktifan di Komunitas</th>
                                    <th>Kategori</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aktif</td>
                                    <td>Direkomendasikan</td>

                                </tr>
                                <tr>

                                    <td>Tidak Aktif</td>
                                    <td>Tidak Direkomendasikan</td>

                                </tr>


                            </tbody>
                        </table>
                    </center>

                    <center>
                        <h3>Pembobotan Nilai IPK Terakhir</h3>
                        <table class="table table-striped" style="width:50%">
                            <thead>
                                <tr>

                                    <th>Nilai IPK Terakhir</th>
                                    <th>Kategori</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>>3,5 s/d <=4,0 </td>
                                    <td>Direkomendasikan</td>
                                </tr>

                                <tr>
                                    <td>>3,0 s/d <= 3,5</td>
                                    <td>Cukup Direkomendasikan</td>
                                </tr>
                                <tr>
                                    <td>>2,0 s/d < 3,0 </td>
                                    <td>Tidak Direkomendasikan</td>
                                </tr>

                                </tr>

                            </tbody>
                        </table>
                    </center>
                    <center>
                        <h3>Pembobotan Nilai Jumlah Penerimaan</h3>
                        <table class="table table-striped" style="width:50%">
                            <thead>
                                <tr>

                                    <th>Jumlah Penerimaan</th>
                                    <th>Kategori</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 s/d 2</td>
                                    <td>Direkomendasikan</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Cukup Direkomendasikan</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Tidak Direkomendasikan</td>
                                </tr>

                            </tbody>
                        </table>
                    </center>
                    <center>
                        <h3>Pembobotan Nilai Peran dalam Kegiatan Komunitas dan Kegiatan Bank Indonesia</h3>
                        <table class="table table-striped" style="width:80%">
                            <thead>
                                <tr>

                                    <th>Peran dalam Kegiatan Komunitas dan Kegiatan Bank Indonesia</th>
                                    <th>Kategori</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Pengurus di GenBI Wilayah</td>
                                    <td>Lebih Direkomendasikan</td>
                                </tr>
                                <tr>
                                    <td>Pengurus di GenBI Komisariat</td>
                                    <td>Direkomendasikan</td>
                                </tr>
                                <tr>
                                    <td>Mengikuti kegiatan kepemimpinan yang diadakan Bank Indonesia</td>
                                    <td>Cukup Direkomendasikan</td>
                                </tr>
                                <tr>
                                    <td>Tidak mengikuti kegiatan kepemimpinan dan bukan merupakan pengurus.</td>
                                    <td>Tidak Direkomendasikan</td>
                                </tr>

                            </tbody>
                        </table>
                    </center>
                </div>

                <script>
                    function openCity(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }
                </script>


            </body>

            </html>

        </main>
        <?php
        require_once "template/footer.php";
        ?>