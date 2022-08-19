<?php
session_start();
require 'functions.php';

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM  user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if($key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;
  }
}

if(isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}


if(isset($_POST["login"]) ) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if(mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"]) ) {
        // set session
        $_SESSION["login"] = true;

        // cek remember me
        if(isset($_POST['remember']) ) {
          // buat cookie
          setcookie('id', $row['id'], time()+120);
          setcookie('key', hash('sha256', $row['username']), time()+120);
        }

        header("Location: index.php");
        exit;
    }
  }

  $error = true;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <style>
      label {
        display: block;
      }
      
      body {
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
          background-color:#333;
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

      .bottom {
        position: absolute;
        right: 3px;
        top: 75%;
        width: 75%;
        
      }
    </style>
  </head>
    <body>
        <div class="bck">
          <h1>Login</h1>
            <?php if(isset($error) ) : ?>
              <p style="color:red; font-weight:bold;">username / password salah</p>
            <?php endif;?>
            <form action="" method="POST">
              <ul>
                <label for="username">Username :</label>
                  <input type="text" name="username" id="username">
                <label for="password">Password :</label>
                  <input type="password" name="password" id="password">
                <label for="remember">Remember Me</label>
                  <div class="bottom"><input type="checkbox" name="remember" id="remember"></div>
                <button type="submit" name="login">Login</button>
              </ul>
            </form>
        </div>
    </body>
  </html>   