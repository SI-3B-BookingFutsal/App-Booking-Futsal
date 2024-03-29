<?php
require_once "db.php";

// Inisialisasi variabel pesan error
$pesan_error = '';

// Proses saat tombol submit ditekan
if (isset($_POST['submit'])) {
    // Ambil nilai input dari formulir
    $email = $_POST['email'];

    // Validasi data
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan_error = "Masukkan alamat email yang valid.";
    } else {
        // Insert email ke database
        $query = "INSERT INTO ticket (email) VALUES ('$email')";
        $result = $conn->query($query);

        if ($result) {
            // Penyimpanan email sukses, lakukan sesuai kebutuhan (misalnya, tampilkan pesan sukses)
            $pesan_error = "Email berhasil disimpan.";
        } else {
            $pesan_error = "Gagal menyimpan email. Silakan coba lagi.";
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
    <title>Reset Password</title>
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
                src="img/gembok.png"
                alt="Image"
                style="max-width: 100%; height: auto; width: 300px"
              />
              <h1
                style="text-align: left; font-weight: bolder; margin-top: 20px"
                class="ms-4"
              >
                Lupa Password
              </h1>
              <p style="text-align: left; font-size: large" class="mx-4">
                Terkadang sesuatu yang tidak diinginkan terjadi. Tetapi tenang
                saja, kami punya solusinya
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 centered-card" style="background-color: white">
          <div class="card">
            <img src="img/Logo.png" alt="logo" width="200px" />
            <form method="post" action="">
              
              <!-- Email -->
              <div class="form-group my-4">
                <?php if (!empty($pesan_error)) { ?>
                  <p style="color: red;"><?php echo $pesan_error; ?></p>
                <?php } ?>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      style="border-radius: 20px 0px 0px 20px"
                    >
                      <img
                        src="img/envelope.svg"
                        alt="mail Icon"
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
                    style="border-radius: 0px 20px 20px 0px"
                  />
                </div>
              </div>
              <!-- Reset button -->
              <div>
                <button
                  name="submit"
                  type="submit"
                  class="btn btn-block my-2"
                  style="
                    width: 350px;
                    border-radius: 20px;
                    background-color: #84080b;
                    color: white;
                  "
                >
                  Reset Password
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
