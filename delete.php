<?php
include 'koneksi.php';

// menyimpan data id kedalam variabel
$id = $_GET['id'];

// query SQL untuk delete data
$query = "DELETE FROM tabel_buku WHERE ID_Buku='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<h2>Data berhasil dihapus!</h2>";
} else {
    echo "<h2>Gagal menghapus data.</h2>";
}

// Kembalikan ke halaman index.php setelah menghapus data
echo "<p>Kembali ke <a href='index.php'>halaman utama</a>.</p>";

mysqli_close($koneksi);
?>
