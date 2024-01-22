<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Toko Buku</title>
    <link rel="stylesheet" href="style_index.css">
</head>
<body>

    <div class="container">
        <header>
            <h1>Home - Toko Buku</h1>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="admin.php">ADMIN</a></li>
                <li><a href="pengadaan.php">PENGADAAN</a></li>
            </ul>
        </nav>

        <main>
            <h1>Selamat datang di Toko Buku Gerald</h1>
        </main>
    </div>

</body>
</html>
<head>
<title>Tampil Data</title>
</head>
<body>
    <center><h1>Pencarian Produk</h1></center>
    <form method="GET" action="index.php" style="text-align: center;">
      <label>Kata Pencarian : </label>
      <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" />
      <button type="submit">Cari</button>
</form>
<br>
    <table border="1" align="center" width="1900px" height="500px">
      <thead>
        <tr bgcolor="lightblue">
          <th>ID_Buku</th>
          <th>Nama Buku</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Penerbit</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // untuk meinclude kan koneksi
          include 'koneksi.php';
          // jika kita klik cari, maka yang tampil query cari ini
          if(isset($_GET['kata_cari'])) {
            // menampung variabel kata_cari dari form pencarian
            $kata_cari = $_GET['kata_cari'];
            $query = "SELECT * FROM tabel_buku WHERE `ID_Buku` like '%$kata_cari%' OR `Nama Buku` like '%$kata_cari%' ORDER BY `ID_Buku` ASC";
          } else {
            // jika tidak ada pencarian, default yang dijalankan query ini
            $query = "SELECT * FROM tabel_buku ORDER BY `ID_Buku` ASC";
          }
          $result = mysqli_query($koneksi, $query);
          if(!$result) {
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
          }
          // kalau ini melakukan foreach atau perulangan
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['ID_Buku']; ?></td>
          <td><?php echo $row['Nama Buku']; ?></td>
          <td><?php echo $row['Harga']; ?></td>
          <td><?php echo $row['Stok']; ?></td>
          <td><?php echo $row['Penerbit']; ?></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
</body>
</html>
