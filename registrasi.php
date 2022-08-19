<?php
require 'functions.php';


if(isset($_POST["register"]) ) {

  if(registrasi($_POST) > 0 ) {
      echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
  } else {
      echo mysqli_error($conn);
  }

}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman Registrasi</title>
    <style>
      label {
        display: block;
      }
      
      body {
        height: 90vh;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family: arial;
      }
      
      .bck {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          padding: 20px 25px;
          width: 300px;
          background-color:seagreen;
      }

      .bck h1 {
          text-align: center;
          color: #fafafa;
          margin-bottom: 30px;
          text-transform: uppercase;
          border-bottom: 4px solid #2979ff;
      }

      .bck label {
          text-align: left;
          color: whitesmoke;
          font-weight: bold;
      }

      .bck form input {
          width: 80%;
          padding: 7px;
          margin-bottom: 15px;
          border: none;
          background-color: transparent;
          border-bottom: 2px solid #2979ff;
          color: #fff;
          font-size: 20px;
      }

      .bck form button {
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
        <div class="bck">
          <h1>SIGN IN</h1>
            <form action="" method="POST">
              <ul>
                <label for="username">Username :</label>
                  <input type="text" name="username" id="username">
                <label for="password">Password :</label>
                  <input type="password" name="password" id="password">
                <label for="password2">Konfirmasi Password :</label>
                  <input type="password" name="password2" id="password2">
                <button type="submit" name="register">Log in</button>
              </ul>
            </form>
        </div>
    </body>
  </html>