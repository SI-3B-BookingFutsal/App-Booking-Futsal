<?php
session_start();
require_once "db.php";

if (isset($_SESSION['user_id'])) {
  echo '<script>alert("Anda sudah login!");</script>';
  echo '<script>window.location.href = "browse.php";</script>';
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa keberadaan pengguna dengan username dan password yang sesuai
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Jika informasi login benar, simpan informasi pengguna di sesi
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        
        // Redirect ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika informasi login salah, tampilkan pesan error
        $error_message = "Username atau password salah.";
    }
}


// Periksa apakah sudah login

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css?family=PT Sans"
      rel="stylesheet"
    />
    <title>Login</title>
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #e3f2f1;
        font-family: "PT sans", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }

      .card {
        border: none;
        justify-content: center;
        align-items: center;

        width: 400px;
      }

      .centered-card {
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div
          class="col-md-6 d-none d-md-block"
          style="background-color: #ffbd5c; height: 600px"
        >
          <div class="text-center mt-4">
            <div class="container">
              <img
                src="img/Lapangan.png"
                alt="Image"
                style="max-width: 100%; height: auto; width: 400px"
              />
              <h1
                style="text-align: left; margin-top: -30px; font-weight: bolder"
                class="ms-4"
              >
                Login
              </h1>
              <p style="text-align: left" class="ms-4">
                Silahkan Masukkan Username dan Password
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 centered-card" style="background-color: white">
          <div class="card">
            <img src="img/Logo.png" alt="logo" width="200px" />
            <form method="post" action="">
              <?php if (isset($error_message)) { ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
              <?php } ?>
              <!-- Username -->
              <div class="form-group mt-2">
                <label for="username">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      style="border-radius: 20px 0px 0px 20px"
                    >
                      <img
                        src="img/person.svg"
                        alt="User Icon"
                        style="width: 20px; height: 25px; margin-left: 2px"
                      />
                    </span>
                  </div>
                  <input
                    name="username" 
                    type="text"
                    class="form-control"
                    id="username"
                    placeholder="Masukkan Username"
                    required
                    style="border-radius: 0px 20px 20px 0px"
                  />
                </div>
              </div>
              <!-- Password -->
              <div class="form-group mt-2">
                <label for="Password">Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      style="border-radius: 20px 0px 0px 20px"
                    >
                      <img
                        src="img/lock.svg"
                        alt="Password Icon"
                        style="width: 20px; height: 25px; margin-left: 2px"
                      />
                    </span>
                  </div>
                  <input
                    name="password"
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Masukkan password"
                    required
                    style="border-radius: 0px 20px 20px 0px"
                  />
                </div>
              </div>
              <!-- lupa password -->
              <div style="text-align: end; font-size: 14px" class="my-1">
                <a href="Forgot-password.php">Lupa Password?</a>
              </div>
              <!-- login button -->
              <div>
                <button
                  name="login"
                  type="submit"
                  class="btn btn-block my-2"
                  style="
                    width: 350px;
                    border-radius: 20px;
                    background-color: #84080b;
                    color: white;
                  "
                >
                  Login
                </button>
              </div>
            </form>
            <!-- Login Google -->
            <div>
              <button
                type="submit"
                class="btn btn-block my-2"
                style="
                  width: 350px;
                  border-radius: 20px;
                  background-color: #1a1b22;
                  color: white;
                "
              >
                <img
                  src="img/google-logo.png"
                  alt="Google"
                  style="color: white"
                />
                Login dengan Google
              </button>
            </div>
            <!-- Register -->
            <div style="text-align: center; font-size: 13px" class="my-2">
              <p>
                Belum memiliki akun?
                <a href="Register.php">Daftar sekarang!</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
