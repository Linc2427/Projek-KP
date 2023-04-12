<?php
    session_start();
    include 'db.php';
    if (!$conn) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baggage Services</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
     <div class="text_box">
            <p></p>
            <h1>Airport Baggage Check Service</h1>
            <p></p>
             <p id="headtext">Daftar Penumpang Koper Tidak Lolos X-RAY</p>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3></h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nomor Penerbangan</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                         <!-- Menampilkan Data yang ada di Database -->
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM tbarang ORDER BY id_barang DESC");
                                    while($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_penerbangan'] ?></td>
                                <td><?= $data['nama_penumpang'] ?></td>
                                <?php } ?>
                            <tr>
                            <!---else--->
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - PT. Angkasa Pura I</small>
        </div>
    </footer>
</body>
</html> 