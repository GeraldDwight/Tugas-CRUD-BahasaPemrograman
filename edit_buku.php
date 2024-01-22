<!DOCTYPE html>
<html>
<head>
<title>Data Admin</title>
<style>
body {
    background-image: url('Gambar/Walppaper.jpg');
    background-size: cover;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
  }

main {
    margin-top: 20px;
}

  main {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
  }

  button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #555;
  }
</style>
</head>
<body>
<header>
        <h1>Edit Data Buku</h1>
        </header>
        <?php
include "koneksi.php";

$id = isset($_GET['ID_Buku']) ? $_GET['ID_Buku'] : null;

// Check if $id is not null before preparing and executing the query
if ($id !== null) {
    $query = "SELECT * FROM tabel_buku WHERE ID_Buku=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Data tidak ditemukan. Kembali ke <a href='admin.php'>halaman admin</a>.";
        exit;
    }
} else {
    echo "ID_Buku tidak valid. Kembali ke <a href='admin.php'>halaman admin</a>.";
    exit;
}
?>

        <main>
        <form action="edit_form.php" method="post">
            <input type="hidden" name="ID_Buku" value="<?php echo $row['ID_Buku']; ?>">

            <label for="Kategori">Kategori:</label>
            <input type="text" name="Kategori" value="<?php echo $row['Kategori']; ?>" required>

            <!-- Add other fields as needed -->

            <button type="submit" name="submit">Simpan Perubahan</button>
        </form>
        </main>
</body>
</html>