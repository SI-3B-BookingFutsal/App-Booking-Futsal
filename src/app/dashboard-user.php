<?php
session_start();
require_once "../../db.php";

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: ../../login.php");
    exit();
}

// Jika sudah login, tampilkan halaman utama
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="ds-user.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/6e406072ee.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="vh-100 d-flex">
    <div class="container sidebar d-flex flex-column align-items-center" style="width: 20%;">
      <div class="logo">
        <img src="..\assets\images\logo.png" alt="" srcset="" width="150px">
      </div>
      <div>
        <ul class="nav flex-column">
          <li class="nav-item d-flex align-items-center">
            <i class="fa-solid fa-house" style="color: #ffffff;"></i>
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <i class="fa-solid fa-people-group" style="color: #ffffff;"></i>
            <a class="nav-link text-white" href="#">Teams</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <i class="fa-solid fa-key" style="color: #ffffff;"></i>
            <a class="nav-link text-white" href="#">Paket Langganan</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <i class="fa-solid fa-futbol" style="color: #ffffff;"></i>
            <a class="nav-link text-white" href="../../Browse.php">Lapangan</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="d-flex flex-column" style="width: 80%;">
      <div class="navbar d-flex justify-content-between" >
        <div class="w-50 ">
          <h1 class="fw-bold text-center">Aladin Futsal Center</h1>
        </div>
        <div class="w-50 d-flex justify-content-end">
          <span>
            <div class="profile">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-user" style="color: #000000;"></i>
              </button>
            </div>
            <div class="username">
              <p>USER</p>
            </div>
            <div class="jam">
              <p class="fw-bold">19:00 WIB</p>
            </div>
            <div class="tanggal">
              <p>13-OKT-2023</p>
            </div>
          </span>
          <span>
            <img src="..\assets\images\pitch.png" alt="" srcset="">
          </span>
        </div>
      </div>
      <div class="content-bungkus vh-100" >
        <div class="content m-auto mt-3 d-flex flex-column align-items-center" style="width: 95%; height: 425px;">
          <div class="kotak-atas w-75 position-relative ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
              <path fill="#A03636" fill-opacity="1"
                d="M0,64L60,90.7C120,117,240,171,360,165.3C480,160,600,96,720,85.3C840,75,960,117,1080,133.3C1200,149,1320,139,1380,133.3L1440,128L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
              </path>
            </svg>
            <div class="position-absolute d-flex justify-content-between" style="bottom: 50px; top: 45px;">
              <div style="margin-right: 625px;">
                <p class="text-white ms-2">Diskon <span class="fw-bold">50%</span> <br> Bagi member</p>
              </div>
              <div>
                <img src="..\assets\images\player.png" alt="" width="100px">
              </div>
            </div>
          </div>
          <div class="container w-75 mt-5 d-flex justify-content-between">
            <div class="kotak text-center ms-0 position-relative p-2" style="width: 200px;">
              <div class="position-absolute" style="left: 80px; bottom: 80px;">
                <img src="..\assets\images\pitch.png" alt="" srcset="" width="35px">
              </div>
              <p class="mt-5 text-white"><a href="../../Browse.html" style="text-decoration: none; color: white;">Booking Lapangan</a></p>
            </div>
            <div class="kotak text-center p-2 position-relative" style="width: 200px;">
              <div class="position-absolute" style="left: 80px; bottom: 80px;">
                <img src="..\assets\images\pitch.png" alt="" srcset="" width="35px">
              </div>
              <p class="mt-5 text-white">
                Paket Langganan
              </p>
            </div>
            <div class="kotak text-center p-2 position-relative" style="width: 200px;">
              <div class="position-absolute" style="left: 75px; bottom: 80px;">
                <img src="..\assets\images\pitch.png" alt="" srcset="" width="35px">
              </div>
              <p class="mt-5 text-white">
                Join Team
              </p>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content w-25 p-2" style="left: 650px;">
            <ul class="nav flex-column">
              <li class="nav-item d-flex align-items-center">
                <i class="fa-solid fa-user" style="color: #fff;"></i>
                <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#profile" >
                  Profile
                </button>
              </li>
              <li class="nav-item d-flex align-items-center">
                <i class="fa-solid fa-gear" style="color: #ffffff;"></i>
                <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#setting">
                  Setting
                </button>
              </li>
              <li class="nav-item d-flex align-items-center">
                <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                <a class="nav-link text-white" href="../../logout.php">Log out</a>
              </li>
            </ul>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="top: 100px;">
            <div class="modal-content" style="background-color: #FFBD5C;">
              <div class="modal-header text-center text-white d-flex justify-content-center" style="background-color: #A03636; height: 50px;">
                <p>User Profil</p>
              </div>
              <div class="modal-body">
                <div class="text-center mb-5 mt-5">
                  <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                </div>
                <div class="menu-profile rounded text-center text-white">
                  <p>Nama User</p>
                </div>
                <div class="menu-profile rounded text-center text-white">
                  <p>Handphone</p>
                </div>
                <div class="menu-profile rounded text-center text-white">
                  <p><a href="../../Browse.php" style="text-decoration: none; color: white">Booking Lapang</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="setting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="top: 100px;">
            <div class="modal-content" style="background-color: #FFBD5C;">
              <div class="modal-header text-center text-white d-flex justify-content-center" style="background-color: #A03636; height: 50px;"">
                <p>Setting</p>
              </div>
              <div class="modal-body">
                <div class="text-center mb-5 mt-5">
                  <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                </div>
                <div class="menu-profile rounded text-center text-white">
                  <p>Change password</p>
                </div>
                <div class="menu-profile rounded text-center text-white">
                  <p>Change Handphone</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>