<?php
session_start();

if(!isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0 ) {
        echo "
          <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>
        ";
    } else {
        echo "
         <script>
         alert('data gagal ditambahkan!');
         document.location.href = 'index.php';
         </script>
       ";
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Data Siswa</title>
    <style>
      label {
        display: block;
      }
      body {
        height: 90vh;
        background-color: skyblue;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family: arial;
      }
      
      .a {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          padding: 20px 25px;
          width: 300px;
          background-color:seagreen;
      }

      .a h1 {
          text-align:center;
          color: whitesmoke;
          margin-bottom: 20px;
          text-transform: uppercase;
          border-bottom: 4px solid #2979ff;
      }

      .a label {
          text-align: left;
          color: whitesmoke;
          font-weight: bold;
      }

      .a form input {
          width: calc(100% - 20px);
          padding: 8px 10px;
          margin-bottom: 15px;
          border: none;
          background-color: transparent;
          border-bottom: 2px solid #2979ff;
          color: #fff;
          font-size: 20px;
      }

      .a form button {
          width: 100%;
          padding: 5px ;
          border: none;
          background-color: #2979ff;
          font-size: 18px;
          color: #fafafa;
      }
    </style>
  </head>
  <body>
    <div class="a">
      <h1>Tambah Data Siswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
          <ul>
            <li>
              <label for="nama">Nama :</label>
              <input type="text" name="nama" id="nama"
              required>
            </li>
            <li>
            <label for="nis">NIS :</label>
              <input type="text" name="nis" id="nis">
            </li>
            <li>
            <label for="email">Email :</label>
              <input type="text" name="email" id="email">
            </li>
            <li>
            <label for="jurusan">Jurusan :</label>
              <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
            <label for="gambar">Gambar :</label>
              <input type="file" name="gambar" id="gambar">
            </li>
              <button type="submit" name="submit" >Tambah Data!</button>
          </ul>
        </form>
      </div>
  </body>
</html>