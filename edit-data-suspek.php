<?php
session_start();
include 'db.php';
if ($_SESSION['login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
// Menanpilkan data dari tabel tb_suspek
$barang = mysqli_query($conn, "SELECT * FROM tb_suspek WHERE id_suspek = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($barang) == 0) {
    echo '<script>window.location="dash.php"</script>';
}
$b = mysqli_fetch_assoc($barang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
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
                        <a class="nav-link active text-white" aria-current="page" href="suspek.php">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav Bar END -->

    <ul></ul>
    <!-- Awal Kontainer -->
    <div class="container">
        <ul></ul>
        <h3 class="text-center">Input Data Barang</h3>
        <ul></ul>
        <!-- Awal Row -->
        <div class="row">
            <!-- Awal col -->
            <div class="col-md-8 mx-auto">
                <!-- Awal card -->
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Form Input Data Barang
                    </div>
                    <div class="card-body">
                        <!-- Awal form -->
                        <form method="post">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $b['id_suspek'] ?>">
                            <div class="mb-2">
                                <label class="form-label">Nomor Penerbangan</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nomor Penerbangan" value="<?php echo $b['nomor_penerbangan'] ?>" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Nama Penumpang</label>
                                <input type="text" name="tnamap" class="form-control" placeholder="Masukkan Nama Penumpang" value="<?php echo $b['nama_penumpang'] ?>" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" name="tnamab" class="form-control" placeholder="Masukkan Nama Barang" value="<?php echo $b['nama_barang'] ?>" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Kategori Barang</label>
                                <select class="form-select" name="tkategoribarang" required>
                                    <?php $kategori_barang = $b['kategori_barang']; ?>
                                    <!-- <optgroup label="--Pilih--"></optgroup> -->
                                    <option value="">--Pilih--</option>
                                    <option value="Benda Tajam" <?php echo ($kategori_barang == 'Benda Tajam') ? "selected" : "" ?>>Benda Tajam</option>
                                    <option value="Material Korosif" <?php echo ($kategori_barang == 'Material Korosif') ? "selected" : "" ?>>Material Korosif</option>
                                    <option value="Bahan Peledak" <?php echo ($kategori_barang == 'Bahan Peledak') ? "selected" : "" ?>>Bahan Peledak</option>
                                    <option value="Gas Bertekanan" <?php echo ($kategori_barang == 'Gas Bertekana') ? "selected" : "" ?>>Gas Bertekanan</option>
                                    <option value="Cairan Mudah Terbakar" <?php echo ($kategori_barang == 'Cairan Mudah Terbakar') ? "selected" : "" ?>>Cairan Mudah Terbakar</option>
                                    <option value="Benda Padat Mudah Terbakar" <?php echo ($kategori_barang == 'Benda Padat Mudah Terbaka') ? "selected" : "" ?>>Benda Padat Mudah Terbakar</option>
                                    <option value="Material yang Teroksidasi" <?php echo ($kategori_barang == 'Material yang Teroksidasi') ? "selected" : "" ?>>Material yang Teroksidasi</option>
                                    <option value="Zat Radioaktif" <?php echo ($kategori_barang == 'Zat Radioaktif') ? "selected" : "" ?>>Zat Radioaktif</option>
                                    <option value="Zat Beracun" <?php echo ($kategori_barang == 'Zat Beracun') ? "selected" : "" ?>>Zat Beracun</option>
                                    <option value="Agen Etiologis" <?php echo ($kategori_barang == 'Agen Etiologis') ? "selected" : "" ?>>Agen Etiologis</option>
                                    <option value="Gas Padat" <?php echo ($kategori_barang == 'Gas Padat') ? "selected" : "" ?>>Gas Padat</option>
                                    <option value="Senjata Tajam" <?php echo ($kategori_barang == 'Senjata Tajam') ? "selected" : "" ?>>Senjata Tajam</option>
                                </select>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-2">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" name="tjumlah" class="form-control" placeholder="Masukkan Jumlah Barang" value="<?php echo $b['jumlah'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-2">
                                            <label class="form-label">Satuan</label>
                                            <select class="form-select" name="tsatuan" required>
                                                <?php $satuan = $b['satuan']; ?>
                                                <option value="">---Pilih---</option>
                                                <option value="Unit" <?php echo ($satuan == 'Unit') ? "selected" : "" ?>>Unit</option>
                                                <option value="Pcs" <?php echo ($satuan == 'Pcs') ? "selected" : "" ?>>Pcs</option>
                                                <option value="Box" <?php echo ($satuan == 'Box') ? "selected" : "" ?>>Box</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col">
                                <div class="mb-2">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tTanggal" class="form-control" placeholder="Masukkan Jumlah Barang" value="<?php echo date('d:m:y') ?>" required>
                                </div>
                            </div>    -->
                                    <div class="mb-2">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="tstatus" required>
                                            <?php $status = $b['status']; ?>
                                            <option <?php echo ($status == 'Aktif') ? "selected" : "" ?>>Aktif</option>
                                            <option <?php echo ($status == 'Tidak Aktif') ? "selected" : "" ?>>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <hr>
                                        <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                                        <button class="btn btn-danger" name="bbatal" type="reset">Batalkan</button>
                                    </div>
                                </div>
                        </form>
                        <!-- Akhir form -->

                        <?php
                        if (isset($_POST['bsimpan'])) {

                            // data inputan dari form
                            $id          = $_POST['id'];
                            $nomor_penerbangan     = $_POST['nama'];
                            $nama_penumpang     = $_POST['tnamap'];
                            $nama_barang         = $_POST['tnamab'];
                            $kategori_barang     = $_POST['tkategoribarang'];
                            $jumlah             = $_POST['tjumlah'];
                            $status             = $_POST['tstatus'];
                            $satuan              = $_POST['tsatuan'];
                            $update = "UPDATE `tb_suspek` SET `nomor_penerbangan`='$nomor_penerbangan',`nama_penumpang`='$nama_penumpang',`nama_barang`='$nama_barang',`kategori_barang`='$kategori_barang',`jumlah`='$jumlah',`satuan`='$satuan',`status`='$status' WHERE `id_suspek`='$id'";
                            $query = mysqli_query($conn, $update);
                            if ($query) {
                                echo '<script>alert("Ubah data berhasil")</script>';
                                echo '<script>window.location="suspek.php"</script>';
                            } else {
                                echo 'gagal ' . mysqli_error($conn);
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

</html>