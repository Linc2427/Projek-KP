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
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body style="background-color:#AFFF">

  <!-- Nav Bar Start -->
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/ap.png" alt="Bootstrap" width="200" height="50">
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto ms-auto mr-auto">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="dash.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="suspek.php">Data Suspek</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="penumpang.php">Monitor Penumpang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Nav Bar END -->

  <!-- Awal Kontainer -->
  <div class="container">
    <br>
    <!-- <h3 class="text-center">Scan Barcode</h3> -->
    <!-- Awal Row -->
    <div class="row">
      <!-- Awal col -->
      <div class="col-md-12 mx-auto">
        <!-- Awal card -->
        <div class="card">
          <div class="card-header bg-light-primary text-light" style="background-color: #23b5d3;">
            Form Scan
          </div>
          <div class="card-body">
            <!-- Awal form -->
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-2">
                <label class="form-label">Tambah</label>
                <input type="text" name="tcari" value="<?php if (isset($_POST['bcari'])) {
                                                          echo $_POST['bcari'];
                                                        } ?>" class="form-control" placeholder="Scan Here">
                <div class="text-center">
                  <hr>
                  <button class="btn btn-success bi bi-plus" name="bsimpan" type="submit"> Tambah</button>
                  <!-- <button class="btn btn-primary bi bi-search" name="bcari" type="submit"> Cari</button> -->
                  <button class="btn btn-danger bi bi-bootstrap-reboot" name="breset" type="Batalkan"> Reset</button>
                </div>
            </form>
            <!-- Akhir form -->

            <?php

            if (isset($_POST['bsimpan'])) {
              $input = $_POST['tcari'];
              $array = explode(' ', $input);

              $DataArray = array();

              foreach ($array as $item) {
                $DataArray[] = "'$item'";
              }

              $sql = "INSERT INTO `tb_suspek`(`nomor_penerbangan`, `nama_penumpang`) VALUES ";
              $sql .= '(' . implode(',', $DataArray) . ')';
              $simpan = mysqli_query($conn, $sql);
              if ($simpan) {
                echo "<script>
                                    alert('Simpan data sukses');
                                    document.location='dash.php';
                                </script>";
              } else {
                echo "<script>
                                      alert('Simpan data Gagal');
                                      document.location='dash.php';
                                  </script>";
              }
            }
            ?>


          </div>
        </div>
        <!-- Akhir card -->
      </div>
      <!-- Akhir col -->
    </div>
    <!-- Akhir Row -->

  </div>
  <!-- Akhir Kontainer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
<ul></ul>
<!-- Footer -->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top fixed-bottom">
    <div class="col d-flex align-items-center">
      <marquee onmouseout='this.start()' onmouseover='this.stop()' scrollamount='10'><img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspSELAMAT DATANG DI TERMINAL 1 BANDAR UDARA INTERNASIONAL JUANDA SURABAYA&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspJANGAN MENINGGALKAN BARANG BAWAAN ANDA TANPA PENGAWASAN&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspDO NOT LEAVE YOUR LUGGAGE UNATTENDED&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspSILENT AIRPORT SUDAH DIBERLAKUKAN, MOHON PARA PENUMPANG SELALU MEMPERHATIKAN INFORMASI PENERBANGAN PADA MONITOR FIDS YANG TERSEDIA. TERIMAKASIH.&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspSILENT AIRPORT POLICY HAS BEEN ENFORCED, PASSANGERS ARE ADVISED TO CHECK FLIGHT INFORMATION ON AVAILABLE FIDS SCREEN. THANK YOU.&nbsp&nbsp</marquee>
    </div>
  </footer>
</div>
<!-- End Footer -->

</html>