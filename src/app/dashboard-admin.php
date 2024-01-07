<?php
session_start();

// Periksa apakah sudah login atau belum
if (!isset($_SESSION['username'])) {
  echo '<script>alert("Anda harus login terlebih dahulu.");</script>';
  echo '<script>window.location.href = "login-admin.php";</script>'; // Redirect ke halaman login jika belum login
    exit();
}

// Halaman dashboard
echo "Welcome, " . $_SESSION['username'] . "!";
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
  <link rel="stylesheet" href="ds-admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/6e406072ee.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="w-100 vh-100">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">
            <img src="../logo.png" alt="Bootstrap" width="30" height="24">
          </a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Setting</a>
            </li>
          </ul>
          <span>
            <i class="fa-solid fa-magnifying-glass me-2" style="color: #000000;"></i>
            <i class="fa-solid fa-bell  me-2" style="color: #000000;"></i>
            <i class="fa-solid fa-user" style="color: #000000;"></i>
          </span>
        </div>
      </div>
    </nav>
    <div class="content w-100  d-flex">
      <div class="sidebar w-25">
        <ul class="nav flex-column">
          <li class="nav-item text-center d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-table-columns" style="color: #000000;"></i>
            <a class="nav-link active text-white" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item text-center d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-user" style="color: #000000;"></i>
            <a class="nav-link text-white" href="#">Profile</a>
          </li>
          <li class="nav-item text-center d-flex align-items-center justify-content-center">
            <i class="fa-regular fa-credit-card" style="color: #000000;"></i>
            <a class="nav-link text-white" href="#">Payment</a>
          </li>
          <li class="nav-item text-center d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-location-dot" style="color: #000000;"></i>
            <a class="nav-link text-white" href="#">Location</a>
          </li>
          <li class="nav-item text-center d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-location-dot" style="color: #000000;"></i>
            <a class="nav-link text-white" href="logout-admin.php">Logout</a>
          </li>
        </ul>
      </div>
      <div class="main w-75 h-100 p-2">
        <div class="container mt-2 mb-3 text-center">
          <div class="row">
            <div class="col me-2 rounded">
              <p>Total tenants</p>
              <i class="fa-solid fa-chart-column" style="color: #000000;"></i>
              <p>200</p>
            </div>
            <div class="col me-2 rounded">
              <p>Total futsal field</p>
              <i class="fa-solid fa-chart-column" style="color: #000000;"></i>
              <p>2</p>
            </div>
            <div class="col rounded" id="container-income">
              <p>Income</p>
              <i class="fa-solid fa-chart-column" style="color: #000000;"></i>
              <p>$20.000</p>
            </div>
          </div>
        </div>
        <div class="container graph mt-2 p-3" id="graph">
          <div class="judul-content text-white px-2">
            <p>Annual futsal field rental</p>
          </div>
          <div class="container">
            <canvas id="lineChart"></canvas>
          </div>
        </div>
        <div class="container income mt-2 p-3" id="content-income">
          <div class="judul-content text-white px-2">
            <p>Income</p>
          </div>
          <div class="container">
            <h4 class="fw-bold text-center">Laporan Penghasilan Aladin</h4>
            <div class="tanggal">
              <form action="" class="d-flex">
                <div class="start me-4">
                  <label for="tanggal" class="text-center">Tanggal Mulai</label>
                  <br>
                  <input type="date" name="" id="">
                </div>
                <div class="end me-4">
                  <label for="tanggal">Tanggal Akhir</label>
                  <br>
                  <input type="date" name="" id="">
                </div>
                <span>
                  <button type="button" class="btn px-5 h-5 rounded-pill" id="btn-search">Cari</button>
                </span>
              </form>
            </div>
            <div class="table">
              <table class="table table-white table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Pemasukan</th>
                    <th scope="col">Pengeluaran</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>21-06-2019</td>
                    <td>Keluarga</td>
                    <td>Kiki</td>
                    <td>Rp. 1.000.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>21-06-2019</td>
                    <td>keperluan kantor</td>
                    <td colspan="2">Beli alat kantor</td>
                    <td>Rp. 50.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>20-06-2019</td>
                    <td colspan="2">Penjualan Aplikasi</td>
                    <td>Rp. 1.500.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>06-06-2019</td>
                    <td>Lainnya</td>
                    <td>Pembayaran project</td>
                    <td>Rp. 13.570.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>14-06-2019</td>
                    <td>Pembuatan Aplikasi</td>
                    <td>Pembuatan aplikasi sistem rumah sakit karya bakti</td>
                    <td>Rp. 20.000.000,-</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script src="chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="ds-admin.js"></script>
</body>
</html>