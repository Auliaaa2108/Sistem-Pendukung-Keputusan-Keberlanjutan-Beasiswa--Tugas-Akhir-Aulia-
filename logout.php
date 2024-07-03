<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['role']);
// session_destroy();
echo "<script>alert('Anda Berhasil Logout!'); window.location = 'login.php'</script>";
?>