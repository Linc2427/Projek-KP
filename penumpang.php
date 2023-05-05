<?php
    session_start();
    include 'db.php';
    if (!$conn) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
    date_default_timezone_set('Asia/jakarta');
?>
<!DOCTYPE html>

<html>
<head>
<title>ATNOS</title>
<!-- <meta http-equiv="refresh" content="5"> -->
<link rel="stylesheet" href="tabel.css">
</head>
 <div class="text_box">
            <p></p>
            <center><h1>Airport Baggage Check Service</h1></center>
            <p></p>
            <center><p id="headtext" >Daftar Penumpang Koper Tidak Lolos X-RAY</p></center>
<body>
<div class="filter">
</div>

<h2><span id="time"></span></h2>
<script type="text/javascript">
function refreshTime() {
  const timeDisplay = document.getElementById("time");
  const dateString = new Date().toLocaleString();
  const formattedString = dateString.replace(", ", " - ");
  timeDisplay.textContent = formattedString;
}
  setInterval(refreshTime, 1000);
</script>
<table >
<tr>
            <th width="60px">No</th>
            <th>Nomor Penerbangan</th>
            <th>Nama</th>
            <th>Status</th>
    </tr>

    <div class='barisf'><div class='c1'><img name='img0' src='/display/images/jt-t.gif' width='190' height='45' /></div><div class='c2' id='cstext0'>JT 222</div><div class='c3'>12:25</div><div class='c4' id='0'>BANJARMASIN</div><div class='c5'>13</div><div class='c6'>14:11</div><div class='c7'>Boarding</div></div>

            <tbody>
                         <!-- Menampilkan Data yang ada di Database -->
                         
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM `tb_suspek` WHERE `status` like 'Aktif' ORDER BY `id_suspek` DESC;
                            ");
                                    while($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nomor_penerbangan'] ?></td>
                                <td><?= $data['nama_penumpang'] ?></td>
                                <td><?= $data['status'] ?></td>
                                <?php } ?>
            <tr>
            <!---else--->
            </tr>
            </tbody>
</table>
</body>
</html>