<?php
include 'koneksi.php';
$npm = $_GET['npm'];
mysqli_query($koneksi, "DELETE FROM t_mahasiswa WHERE npm=$npm");
header("Location: index.php");
?>
