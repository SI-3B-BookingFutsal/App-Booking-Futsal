<?php
session_start();
require_once "db.php";

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, arahkan ke halaman login
    echo '<script>alert("Anda harus login terlebih dahulu.");</script>';
    echo '<script>window.location.href = "login.php";</script>';
    exit();
}

// Jika sudah login, tampilkan halaman booking
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>Payment</title>
    <style>
      /* CSS untuk mengatur sidebar */
      .sidebar {
        width: 250px; /* Lebar sidebar */
        height: 100%; /* Tinggi sesuai kebutuhan Anda */
        background-color: #9a2929; /* Warna latar belakang sidebar */
        position: fixed; /* Membuat sidebar tetap saat di-scroll */
        top: 0; /* Menempatkan sidebar di bagian atas */
        left: 0; /* Menempatkan sidebar di bagian kiri */
        z-index: 2;
      }

      /* CSS untuk mengatur konten */
      .content {
        margin-left: 250px; /* Lebar sidebar */
        padding: 20px; /* Jarak antara konten dengan sisi */
        margin-top: 150px;
        align-items: center;
        justify-content: center;
      }

      .header {
        height: 150px; /* Tinggi header */
        background-color: #ffbd5c; /* Warna latar belakang header */
        position: fixed; /* Membuat header tetap saat di-scroll */
        top: 0; /* Menempatkan header di bagian atas */
        left: 0; /* Menempatkan header di bagian kiri */
        width: 100%; /* Lebar 100% sesuai lebar layar */
      }

      .card-lapang {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
      }

      .head-content {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 1fr;
        grid-column-gap: 0px;
        grid-row-gap: 0px;
      }

      .profile {
        display: flex; /* Menggunakan flexbox untuk pengaturan layout */
        align-items: center; /* Membuat konten berada di tengah vertikal */
        padding: 20px; /* Jarak dari tepi halaman */
      }

      .profile-picture {
        width: 70px; /* Lebar gambar profil */
        height: 70px; /* Tinggi gambar profil */
        border-radius: 50%; /* Membuat gambar profil menjadi lingkaran */
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        background-color: #e3f2f1;
      }

      .menu {
        margin-top: 40px;
      }

      ul {
        list-style: none;
      }

      li {
        margin-top: 20px;
        margin-left: -10px;
        font-weight: bold;
        font-size: 24px;
        color: white;
      }

      .icon-list {
        list-style: none; /* Menghilangkan bullet default dari list */
      }

      .icon-list-item {
        display: flex; /* Menggunakan flexbox untuk mengatur layout */
        align-items: center; /* Posisi vertikal tengah */
        margin-bottom: 10px; /* Jarak antara setiap item list */
      }

      .icon {
        margin-right: 20px; /* Jarak antara ikon dan teks */
        width: 50px; /* Lebar ikon */
        height: 50px; /* Tinggi ikon */
      }

      .booking-btn {
        position: absolute;
        right: 100px;
        bottom: 40px;
        background-color: #9a2929;
        color: white;
      }

      .card-body {
        background-color: #ffbd5c;
        width: 200px;
        border: solid;
        border-width: 1px;
        border-radius: 10px;
        border-color: #333;
        height: 200px;
      }

    a {
        text-decoration: none;
        color: inherit;
      }

      a:hover {
        text-decoration: none;
        color: #ffbd5c;
      }

      .metode-bayar:hover{
        color: #4b4a49;
      }
    </style>
  </head>
  <body style="background-color: #e3f2f1">
    <!-- Header -->
    <div
      class="header"
      style="align-items: center; justify-content: center; z-index: 1"
    >
      <div
        class="head-content"
        style="
          margin-left: 250px;
          align-items: center;
          justify-content: center;
          margin-top: 22px;
        "
      >
        <div class="container text-left" style="margin-left: 100px">
          <h1>Aladdin Futsal Center</h1>
        </div>

        <div
          class="container profile"
          style="
            justify-content: right;
            width: 250px;
            height: 100px;
            margin-right: 20px;
          "
        >
          <div class="user-info" style="margin-top: 15px">
            <h3>Username</h3>
            <p style="font-weight: bold">09.00 WIB</p>
            <p style="margin-top: -20px">Senin, 01/01/0000</p>
          </div>
          <div>
            <button
              style="background-color: inherit; border: none"
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              <img
                class="profile-picture"
                src="img/person.svg"
                alt="Foto Profil"
              />
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo" style="text-align: center">
        <img src="img/Logo.png" alt="Logo" width="200px" />
      </div>
      <div class="menu">
        <ul class="icon-list">
          <li class="icon-list-item">
            <img class="icon" src="img/home.png" alt="home" />
            <a href="src/app/dashboard-user.html">Home</a>
          </li>
          <li class="icon-list-item">
            <img class="icon" src="img/peoples.png" alt="team" />
            <a href="#">Team</a>
          </li>
          <li class="icon-list-item">
            <img class="icon" src="img/Money.png" alt="langganan" />
            <a href="#">Langganan</a>
          </li>
          <li class="icon-list-item">
            <img class="icon" src="img/Calendar.png" alt="lapangan" />
            <a href="Browse.html">Lapangan</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Isi Konten -->
    <div class="content text-center">
      <!-- Grid lapangan -->
      <div class="container card-lapang" style="margin-top: 100px">
        <div
          class="card"
          style="align-items: center; border: none; background-color: #e3f2f1"
        >
          <div class="card-body">
            <div class="text-Center">
              <a href="QR.php" class="metode-bayar">
                <p style="font-weight: bold; font-size: 24px">Dana</p>
                <img src="img/Dana Logo.png" alt="dana" width="100px" />
              </a>
            </div>
          </div>
        </div>

        <div
          class="card"
          style="align-items: center; border: none; background-color: #e3f2f1"
        >
          <div class="card-body">
            <div class="text-Center">
            <a href="QR.php" class="metode-bayar">
              <p style="font-weight: bold; font-size: 24px">Transfer Bank</p>
              <img src="img/BCA logo.png" alt="bank" width="100px" />
            </a>  
            </div>
          </div>
        </div>

        <div
          class="card"
          style="align-items: center; border: none; background-color: #e3f2f1"
        >
          <div class="card-body">
            <a href="QR.php" class="metode-bayar">
            <div class="text-Center">
              <p style="font-weight: bold; font-size: 24px">OVO</p>
              <img src="img/OVO Logo.png" alt="ovo" width="100px" />
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>

        <!-- Modal dropdown user-->
        <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div
            class="modal-content w-25 p-2"
            style="left: 100vh; background-color: #9a2929"
          >
            <ul class="nav flex-column">
              <li class="nav-item d-flex align-items-center">
  
                <!-- Tombol booking -->
                <?php if (isset($_SESSION['user_id'])) { ?>
                  <button
                  type="button"
                  class="btn text-white"
                  data-bs-toggle="modal"
                  data-bs-target="#profile"
                  style="margin-left: 20px"
                >
                  Profile
                </button>
                <?php } else { ?>
                    <!-- Tombol login jika belum login -->
                    <a
                  type="button"
                  class="btn text-white"
                  style="margin-left: 20px"
                  href="Login.php"
                >
                  Login
                </a>
                <?php } ?>
              </li>
              <li class="nav-item d-flex align-items-center">
                <button
                  type="button"
                  class="btn text-white"
                  data-bs-toggle="modal"
                  data-bs-target="#setting"
                  style="margin-left: 20px"
                >
                  Setting
                </button>
              </li>
              <li class="nav-item d-flex align-items-center">
                <a
                  type="button"
                  class="btn text-white"
                  style="margin-left: 20px"
                  href="logout.php"
                >
                  Log out
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
  
      <!-- Modal profile-->
      <div
        class="modal fade"
        id="profile"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" style="top: 100px">
          <div class="modal-content" style="background-color: #ffbd5c">
            <div
              class="modal-header text-center text-white d-flex justify-content-center"
              style="background-color: #a03636; height: 50px"
            >
              <p>User Profil</p>
            </div>
            <div class="modal-body">
              <div class="text-center mb-5 mt-5">
                <i class="fa-solid fa-user" style="color: #ffffff"></i>
              </div>
              <div class="menu-profile rounded text-center text-dark">
                <p><a href="src/app/dashboard-user.php">Dashboard</a></p>
              </div>
              <div class="menu-profile rounded text-center text-dark">
                <p>Handphone</p>
              </div>
              <div class="menu-profile rounded text-center text-dark">
                <p>Booking Lapang</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
