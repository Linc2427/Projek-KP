<?php
session_start();
include 'db.php';
if (!$conn) {
  die("<script>alert('Gagal tersambung dengan database.')</script>");
}
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=Data Pegawai-$tangwal-$tangkir.xls");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Export Data Ke Excel</title>
</head>

<body>
  <style type="text/css">
    body {
      font-family: sans-serif;
    }

    table {
      margin: 20px auto;
      border-collapse: collapse;
    }

    table th,
    table td {
      border: 1px solid #3c3c3c;
      padding: 3px 8px;

    }

    a {
      background: blue;
      color: #fff;
      padding: 8px 10px;
      text-decoration: none;
      border-radius: 2px;
    }
  </style>

  <?php
  $tangwaltok = toDate_ID($_GET['tanggal_awal']);
  $tangkirtok = toDate_ID($_GET['tanggal_akhir']);

  $name_for_project = $tangwaltok . ' - ' . $tangkirtok;
  $file = $name_for_project . ".xls";
  header("Content-type: application/vnd-ms-excel");
  // header("Content-Disposition: attachment; filename=Data Pegawai-$tangwaltok-$tangkirtok.xls");
  header('Content-disposition: attachment; filename=Laporan Data Suspek Tanggal ' . basename($file));
  ?>
  <center>
    <h4>Laporan Datasuspek<br>
      Terminal 1 Bandara Juanda Surabaya<br>
      Periode <?= $tangwaltok ?> hingga <?= $tangkirtok ?></h4>
  </center>
  <table border="1" width="100%">
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Nomor Penerbangan</th>
      <th class="text-center">Nama Penumpang</th>
      <th class="text-center">Nama Barang</th>
      <th class="text-center">Kategori Barang</th>
      <th class="text-center">Jumlah</th>
      <th class="text-center">Tanggal</th>
    </tr>
    <!-- Menampilkan Data yang ada di Database -->
    <?php
    $no = 1;
    $tangwal = $_GET['tanggal_awal'] . " 00:00:00";
    $tangkir = $_GET['tanggal_akhir'] . " 23:59:59";
    $tampil = mysqli_query($conn, "SELECT * FROM `tb_suspek` WHERE tanggal_simpan BETWEEN '$tangwal' AND  '$tangkir' ");
    while ($data = mysqli_fetch_array($tampil)) {
    ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nomor_penerbangan'] ?></td>
        <td><?= $data['nama_penumpang'] ?></td>
        <td><?= $data['nama_barang'] ?></td>
        <td><?= $data['kategori_barang'] ?></td>
        <td><?= $data['jumlah'] ?>
          <!-- <td><?= $data['tanggal_simpan'] ?></td> -->
        <td><?= toDate_ID($data['tanggal_simpan']) ?></td>
      <?php } ?>
      </tr>

  </table>

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