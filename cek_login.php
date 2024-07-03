<?php
session_start();
include "config.php";

$password = md5($_POST['password']);
$username = $_POST['username'];

$tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($tampil);

if (!empty($data['username'])) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    $_SESSION['role'] = $data['role']; // Menyimpan peran pengguna dalam sesi

    // Sesuaikan dengan role yang sesuai
    if ($_SESSION['role'] == 'role') {
        header('location: index.php');
    } else {
        header('location: index.php');
    }
} else {
    echo "<script>alert('Username & Password Salah !'); window.location = 'login.php'</script>";
}
?>
<!-- 

php
    session_start();
    include "config.php";
    $password = md5 ($_POST['password']);
    $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$_POST[username]' AND password='$password'");
    $data = mysqli_fetch_array($tampil);

    if (!empty($data['username'])){
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        header('location: index.php');
    }else{
        echo "<script>alert('Username & Password Salah !'); window.location = 'login.php'</script>";
    }

?> -->