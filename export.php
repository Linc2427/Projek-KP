<?php
session_start();
include 'db.php';
if (!$conn) {
  die("<script>alert('Gagal tersambung dengan database.')</script>");
}
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if ($_SESSION['login'] != true) {
  echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <!-- Title -->
  <title>Export Data Ke Excel</title>
</head>

<body>
  <!-- Nav Bar Start -->
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="dash.php">
        <img src="images/ap.png" alt="Bootstrap" width="200" height="50">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto ms-auto mr-auto">
          <li class="nav-item">
            <a class="nav-link active btn btn-outline-warning" aria-current="page" href="dash.php">Kembali</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Nav Bar END -->

  <!-- Title -->
  <h1 class="title text-center mb-3 mt-2">Laporan Data Suspek</h1>

  <!-- Container -->
  <div class="container">
    <div class="card">
      <div class="card-header bg-light-primary text-light" style="background-color: #23b5d3;">
        Form Export
      </div>
      <div class="card-body">
        <!-- Awal form -->
        <!-- Form Export -->
        <form action="" method="POST">
          <div class="mb-2">
            <label class="form-label">Dari Tanggal</label>
            <input type="date" name="tanggal_awal" class="form-control" required>
            <label class="form-label">Sampai Tanggal</label>
            <input type="date" name="tanggal_akhir" class="form-control" required>
            <button class="btn btn-primary mt-3" type="submit" name="cari">Cari</button>
            <?php if (isset($_POST['cari'])) : ?>
              <a class="btn btn-success mt-3" target="_blank" href="export_excel.php?tanggal_awal=<?= $_POST['tanggal_awal']; ?>&tanggal_akhir=<?= $_POST['tanggal_akhir']; ?>&include_time=false">Export</a>
              </a>
            <?php endif; ?>
          </div>
        </form>

      </div>
    </div>
    <!-- Table Start -->
    <table class="table table-stripped table-bordered mt-2">
      <tr>
        <th>No</th>
        <th>Nomor Penerbangan</th>
        <th>Nama Penumpang</th>
        <th>Nama Barang</th>
        <th>Kategori Barang</th>
        <th>Jumlah</th>
        <th>Tanggal</th>
      </tr>
      <!-- Menampilkan Data yang ada di Database -->
      <?php
      $no = 1;
      if (isset($_POST['cari'])) {
        $tangwal = $_POST['tanggal_awal'] . " 00:00:00";
        $tangkir = $_POST['tanggal_akhir'] . " 23:59:59";
        $tampil = mysqli_query($conn, "SELECT * FROM `tb_suspek` WHERE tanggal_simpan BETWEEN '$tangwal' AND  '$tangkir' ORDER BY `tanggal_simpan` ASC");
      } else {
        $tampil = mysqli_query($conn, "SELECT * FROM `tb_suspek` ORDER BY `tanggal_simpan` ASC");
      }

      while ($data = mysqli_fetch_array($tampil)) {
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nomor_penerbangan'] ?></td>
          <td><?= $data['nama_penumpang'] ?></td>
          <td><?= $data['nama_barang'] ?></td>
          <td><?= $data['kategori_barang'] ?></td>
          <td><?= $data['jumlah'] ?>
          <td><?= toDate_ID($data['tanggal_simpan']) ?></td>
        <?php } ?>
        </tr>
    </table>
    <!-- End Table -->
  </div>
  <!-- End Container -->
  <?php
  function toDate_ID($tanggal, $includeTime = true)
  {
    $date = new DateTime($tanggal);
    $date_now = $date->format('d-m-Y');
    $hour_now = $date->format('H:i:s');
    $month = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $var = explode('-', $date_now);
    $formattedDate = $var[0] . ' ' . $month[(int)$var[1]] . ' ' . $var[2];

    if ($includeTime) {
      return $formattedDate . ' ' . $hour_now;
    } else {
      return $formattedDate;
    }
  }
  ?>

  <script>
    var today = new Date(); /* new date object */
    var month = [
      "",
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ];

    var date =
      today.getDate() +
      "  " +
      month[today.getMonth() + 1] +
      "  " +
      today.getFullYear();
    /* display current date */
    document.getElementById("currentDate").innerHTML = date;
  </script>

</body>

</html>