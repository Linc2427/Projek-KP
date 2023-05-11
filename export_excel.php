<?php
  session_start();
  include 'db.php';
  if (!$conn) {
      die("<script>alert('Gagal tersambung dengan database.')</script>");
  }
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>
	<center>
		<h4>Laporan Datasuspek<br> Terminal 1 Bandara Juanda Surabaya</h4>
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
		$tangwal = $_GET['tanggal_awal'];
		$tangkir = $_GET['tanggal_akhir'];
        $tampil = mysqli_query($conn, "SELECT * FROM `tb_suspek` WHERE tanggal_simpan BETWEEN '$tangwal' AND  '$tangkir' ");
        while($data = mysqli_fetch_array($tampil)) {
        ?>
        <tr>
        	<td><?= $no++ ?></td> 
        	<td><?= $data['nomor_penerbangan'] ?></td>
			<td><?= $data['nama_penumpang'] ?></td>
			<td><?= $data['nama_barang'] ?></td>
			<td><?= $data['kategori_barang'] ?></td>
			<td><?= $data['jumlah'] ?>
			<td><?= $data['tanggal_simpan']?></td>
        <?php } ?>
		</tr>
	
	</table>
</body>
</html>