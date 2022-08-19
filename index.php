<?php
session_start();

if(!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// pagination
// konfigurasi


$siswa = query("SELECT * FROM siswa ");

// tombol cari ditekan
if (isset($_POST["cari"]) ) {
  $siswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html> 
<html>
  <head>
    <title>Halaman Admin</title>
    <style>
      body {
        background-color: whitesmoke;
        font-family: arial;
      }

      th tr table{
        text-align: center;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
  <a href="logout.php">Logout</a>

  <h1>Daftar Siswa</h1>
  <a href="tambah.php">Tambah Data Siswa</a>
  <br><br>
  <form action="" method="POST">
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">CARI!</button>
  </form>


<br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>NO</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>NIS</th>
      <th>Email</th>
      <th>Jurusan</th>
    </tr>

    <?php $i =1; ?>
    <?php foreach($siswa as $row) : ?>
    <tr>
      <td><?= $i; ?></td>
      <td>
        <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
        <a href="hapus.php?id=<?= $row["id"]; ?>">hapus</a>
      </td>
      <td><img src="img/<?=  $row["gambar"]; ?>" width="50" ></td>
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["nis"]; ?></td>
      <td><?= $row["email"]; ?></td>
      <td><?= $row["jurusan"]; ?></td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>

  </table>

  </body>
</html>
