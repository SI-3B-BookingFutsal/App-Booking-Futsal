<?php
// Sertakan file koneksi.php
require_once "db.php";

// Inisialisasi variabel pesan error
$pesan_error = '';

// Proses saat tombol register ditekan
if (isset($_POST['register'])) {
    // Ambil nilai input dari formulir
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi data
    if (empty($username) || empty($email) || empty($password)) {
        $pesan_error = "Semua kolom harus diisi.";
    } else {
        // Insert data pengguna ke database (tanpa hash password)
        $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = $conn->query($query);

        if ($result) {
            // Registrasi sukses, arahkan ke halaman login
            header("Location: login.php");
            exit();
        } else {
            $pesan_error = "Gagal melakukan registrasi. Silakan coba lagi.";
        }
    }
}
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
    
    <title>Register</title>
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #ffbd5c;
        font-family: "PT sans", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }

      /* CSS untuk mengatur card dengan border radius 20px */
      .custom-card {
        border-radius: 20px;
      }

      .container_logo {
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center mx-3">
        <div class="col-md-6">
          <div class="card custom-card" style="align-items: center">
            <div class="card-body">
              <div class="container_logo">
                <img src="img/Logo.png" alt="logo" style="max-width: 150px" />
              </div>
              <div>
                <h5
                  class="card-title text-center"
                  style="font-weight: bold; font-size: 25px"
                >
                  Form Registrasi
                </h5>
                <p class="text-center" style="margin-top: -10px">
                  Masukkan Nama, Email serta Password anda
                </p>
              </div>
              <form method="post" action="">
              <?php if (!empty($pesan_error)) { ?>
                <p style="color: red;"><?php echo $pesan_error; ?></p>
              <?php } ?>
                <!-- Username -->
                <div class="form-group my-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text"
                        style="border-radius: 10px 0px 0px 10px"
                      >
                        <img
                          src="img/person.svg"
                          alt="user icon"
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
                      style="border-radius: 0px 10px 10px 0px"
                    />
                  </div>
                </div>
                <!-- Email -->
                <div class="form-group my-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text"
                        style="border-radius: 10px 0px 0px 10px"
                      >
                        <img
                          src="img/envelope.svg"
                          alt="email icon"
                          style="width: 20px; height: 25px; margin-left: 2px"
                        />
                      </span>
                    </div>
                    <input
                      name="email"
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder="Masukkan Email"
                      required
                      style="border-radius: 0px 10px 10px 0px"
                    />
                  </div>
                </div>
                <!-- Password -->
                <div class="form-group my-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text"
                        style="border-radius: 10px 0px 0px 10px"
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
                      style="border-radius: 0px 10px 10px 0px"
                    />
                  </div>
                </div>
                <!-- Ulangi Password -->
                <div class="form-group my-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text"
                        style="border-radius: 10px 0px 0px 10px"
                      >
                        <img
                          src="img/lock.svg"
                          alt="Password Icon"
                          style="width: 20px; height: 25px; margin-left: 2px"
                        />
                      </span>
                    </div>
                    <input
                      type="password"
                      class="form-control"
                      id="confirm_password"
                      placeholder="Ulangi password"
                      required
                      style="border-radius: 0px 10px 10px 0px"
                    />
                  </div>
                </div>
                <!-- Btn Register -->
                <button
                  type="submit"
                  name="register"
                  class="btn btn-block my-2"
                  style="
                    width: 350px;
                    border-radius: 20px;
                    background-color: #84080b;
                    color: white;
                  "
                >
                  Daftar
                </button>
              </form>
              <p class="mt-1 text-center">
                Sudah Punya akun? <a href="Login.html">Login Disini</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
      var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

      function validatePassword() {
        if (password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity("");
        }
      }
      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
    </script>
</html>
