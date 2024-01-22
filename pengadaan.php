<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengadaan Buku</title>
<link rel="stylesheet" href="style_pengadaan.css">
</head>
<body>

    <header>
    <h1>Pengadaan Buku</h1>
    </header>
    <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="admin.php">ADMIN</a></li>
                <li><a href="pengadaan.php">PENGADAAN</a></li>
            </ul>
    </nav>

    <?php
        include 'koneksi.php';

        
        $query = "SELECT * FROM tabel_penerbit";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        }
        ?>
  <main>
    <form action="index.php" method="post">
      <label for="judul">Judul Buku:</label>
      <input type="text" id="judul" name="judul" required>

      <label for="penerbit">Penerbit:</label>
      <input type="text" id="penerbit" name="penerbit" required>

      <label for="jumlah">Jumlah Buku:</label>
      <input type="number" id="jumlah" name="jumlah" required>

      <label for="kategori">Kategori:</label>
      <select id="kategori" name="kategori" required>
        <option value="novel">Novel</option>
        <option value="keilmuan">Keilmuaan</option>
        <option value="bisnis">Bisnis</option>
      </select>`

      <button type="submit">Submit</button>
    </form>
  </main>
  
  <?php
        
        mysqli_free_result($result);

        
        mysqli_close($koneksi);
        ?>

</body>
</html>
