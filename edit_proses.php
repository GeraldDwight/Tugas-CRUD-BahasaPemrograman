<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form
$id = $_POST['ID_Buku'];
$kategori = $_POST['kategori'];
$nama_buku = $_POST['nama_buku'];
$harga = $_POST['Harga'];
$stok = $_POST['Stok'];
$penerbit = $_POST['Penerbit'];

// update data ke database
$query = "UPDATE tabel_buku SET Kategori='$kategori', `Nama Buku`='$nama_buku', Harga='$harga', Stok='$stok', Penerbit='$penerbit' WHERE ID_Buku='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<h2>Data berhasil diupdate!</h2>";
    echo "<p>Kembali ke <a href='index.php'>halaman utama</a>.</p>";
} else {
    echo "<h2>Gagal mengupdate data.</h2>";
    echo "<p>Kembali ke <a href='admin.php'>halaman admin</a>.</p>";
}

mysqli_close($koneksi);
?>
