<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Mahasiswa</h2>
    <a href="index.php" class="back-button">← Kembali</a>
    <form method="post">
        <input type="text" name="npm" placeholder="NPM" required><br>
        <input type="text" name="namaMHS" placeholder="Nama Mahasiswa" required><br>
        <input type="text" name="prodi" placeholder="Prodi" required><br>
        <input type="text" name="alamat" placeholder="Alamat" required><br>
        <input type="text" name="noHP" placeholder="No HP" required><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['namaMHS'];
        $prodi = $_POST['prodi'];
        $alamat = $_POST['alamat'];
        $noHP = $_POST['noHP'];

        // Cek apakah NPM sudah ada
        $cek = mysqli_query($koneksi, "SELECT * FROM t_mahasiswa WHERE npm='$npm'");
        if(mysqli_num_rows($cek) > 0) {
            echo "<div class='error'>NPM sudah terdaftar!</div>";
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO t_mahasiswa (npm, namaMHS, prodi, alamat, noHP) VALUES ('$npm', '$nama', '$prodi', '$alamat', '$noHP')");

            if ($query) {
                header("Location: index.php");
            } else {
                echo "<div class='error'>Gagal menambahkan data.</div>";
            }
        }
    }
    ?>
</div>
</body>
</html>
