<?php  

if (isset($_SESSION['username']) && isset($_SESSION['id_user'])) {
    
    $sql = "SELECT * FROM user ORDER BY id_user ASC";
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 