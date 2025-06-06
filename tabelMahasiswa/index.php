<?php
include 'koneksi.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$query = "SELECT * FROM t_mahasiswa WHERE namaMHS LIKE '%$keyword%'";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
<div class="container">
    <h2>Data Mahasiswa</h2>
    <form method="get">
        <input type="text" name="keyword" placeholder="Cari nama mahasiswa..." value="<?= htmlspecialchars($keyword) ?>">
        <button type="submit">Cari</button>
    </form>
    <a href="tambah.php"><button>Tambah Mahasiswa</button></a>
    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php while($data = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $data['npm'] ?></td>
            <td><?= $data['namaMHS'] ?></td>
            <td><?= $data['prodi'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['noHP'] ?></td>
            <td>
                <a href="edit.php?npm=<?= $data['npm'] ?>">Edit</a> |
                <a href="hapus.php?npm=<?= $data['npm'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
