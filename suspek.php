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

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body>
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
    <ul></ul>
    <h3 class="text-center">Daftar Penumpang Suspek</h3>
  </div>
  <div class="card-footer bg-primary">

    <!-- Awal card -->
    <div class="card mt-3">
      <div class="card-header bg-primary text-light">
        Data Penumpang
      </div>
      <div class="card-body">
        <a href="export.php"><button class="btn btn-warning mb-2" type="submit" name="export">Export</button></a>
        <div class="col-md-8 mx-auto">
          <form method="post">
          </form>
        </div>

        <!-- Tabel -->
        <div class="table-responsive table-bordered">
          <table class="table table-striped table-hover">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nomor Penerbangan</th>
              <th class="text-center">Nama Penumpang</th>
              <th class="text-center">Nama Barang</th>
              <th class="text-center">Kategori Barang</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center">Status</th>
              <th class="text-center">Tanggal</th>
              <th>Aksi</th>
            </tr>

            <!-- Menampilkan Data yang ada di Database -->
            <?php
            $no = 1;
            if (isset($_POST['bcari'])) {
              $keyword = $_POST['tcari'];
              $q = "SELECT * FROM tb_suspek WHERE CONCAT('',nomor_penerbangan,nama_penumpang,nama_barang,tanggal) like '%$keyword%' order BY id_suspek DESC;";
            } else {
              $q = "SELECT * FROM tb_suspek order by id_suspek DESC";
            }

            $tampil = mysqli_query($conn, $q);
            while ($data = mysqli_fetch_array($tampil)) {

            ?>

              <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $data['nomor_penerbangan'] ?></td>
                <td class="text-center"><?= $data['nama_penumpang'] ?></td>
                <td class="text-center"><?= $data['nama_barang'] ?></td>
                <td class="text-center"><?= $data['kategori_barang'] ?></td>
                <td class="text-center"><?= $data['jumlah'] ?> <?= $data['satuan'] ?></td>
                <td class="text-center"><?= $data['status'] ?></td>
                <td><?= toDate_ID($data['tanggal_simpan']) ?></td>

                <td class="text-center">
                  <a href="edit-data-suspek.php?id=<?php echo $data['id_suspek'] ?>"><button class="btn btn-warning bi bi-pencil-square" name="bedit" type="submit"></button></a>
                  <a href="hapus.php?idp=<?php echo $data['id_suspek'] ?>" onclick="return confirm('Yakin ingin menghapus ?')"><button class="btn btn-danger bi bi-trash" name="bedit" type="submit"></button></a>
                </td>
              </tr>

            <?php } ?>

          </table>
        </div>
        <div class="card-footer bg-primary">
        </div>
      </div>
      <!-- Akhir card -->


    </div>
    <!-- Akhir Kontainer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <?php
    function toDate_ID($tanggal)
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
      return $var[0] . ' ' . $month[(int)$var[1]] . ' ' . $var[2] . ' ' . $hour_now;
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

      /* Auto refreshing clock time */
      function startTime() {
        var today = new Date(); /* new date object */
        /* getting minutes hours and seconds from date object */
        var hours = today.getHours();
        var minutes = today.getMinutes();
        var seconds = today.getSeconds();
        /* 12 hour time formate */
        var amPm = "AM";
        if (hours > 13) {
          amPm = "PM";
        }
        /* put zero before numbers < 10 */
        if (minutes < 10) {
          minutes = "0" + minutes;
        }
        if (seconds < 10) {
          seconds = "0" + seconds;
        }

        var time = hours + " : " + minutes + " : " + seconds + "  " + amPm;
        /* display current time */
        document.getElementById("currentTime").innerHTML = time;

        /* Auto refreshing time every 1 second */
        setTimeout(function() {
          startTime();
        }, 1000);
      }
    </script>

</body>

</html>