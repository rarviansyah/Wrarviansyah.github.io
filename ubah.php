<?php
session_start();

if(!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

/// ambil data di URL
$id= $_GET["id"];

// query data siswa berdasarkan id
$s = query("SELECT * FROM SISWA WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0 ) {
        echo "
          <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
          </script>
        ";
    } else {
        echo "
         <script>
         alert('data gagal diubah!');
         document.location.href = 'index.php';
         </script>
       ";
    }
}
?><!DOCTYPE html>
<html>
  <head>
    <title>Ubah Data Siswa</title>
  </head>
  <body>
  
  <h1>Ubah Data Siswa</h1>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $s["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $s["gambar"]; ?>">
    <ul>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama"
        required value="<?= $s["nama"];?>">
      </li>
      <li>
      <label for="nis">NIS :</label>
        <input type="text" name="nis" id="nis" value="<?= $s["nis"];?>">
      </li>
      <li>
      <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="<?= $s["email"];?>">
      </li>
      <li>
      <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $s["jurusan"];?>">
      </li>
      <li>
      <label for="gambar">Gambar :</label> <br>
        <img src="img/<?= $s['gambar']; ?>" width="40"> <br>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <button type="submit" name="submit" >Ubah Data!</button>
      </li>
    </ul>
  </form>

  </body>
</html>