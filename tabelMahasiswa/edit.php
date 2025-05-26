<?php include 'koneksi.php'; ?>
<?php
$npm = $_GET['npm'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM t_mahasiswa WHERE npm=$npm"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>Edit Mahasiswa</h2>
    <a href="index.php" class="back-button">← Kembali</a>
    <form method="post">
        <input type="text" name="npm" value="<?= $data['npm'] ?>" readonly><br>
        <input type="text" name="namaMHS" value="<?= $data['namaMHS'] ?>" required><br>
        <input type="text" name="prodi" value="<?= $data['prodi'] ?>" required><br>
        <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required><br>
        <input type="text" name="noHP" value="<?= $data['noHP'] ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['namaMHS'];
        $prodi = $_POST['prodi'];
        $alamat = $_POST['alamat'];
        $noHP = $_POST['noHP'];

        $query = mysqli_query($koneksi, "UPDATE t_mahasiswa SET
            namaMHS='$nama', prodi='$prodi', alamat='$alamat', noHP='$noHP' WHERE npm='$npm'");

        if ($query) {
            header("Location: index.php");
        } else {
            echo "<div class='error'>Gagal update data.</div>";
        }
    }
    ?>
</div>
</body>
</html>
