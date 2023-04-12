<?php
    	session_start();
        include 'db.php';
        if($_SESSION['login'] != true){
            echo '<script>window.location="login.php"</script>';
        }
    // Menanpilkan data dari tabel tb_penumpang
        $penumpang = mysqli_query($conn, "SELECT * FROM tb_penumpang WHERE id_penumpang = '".$_GET['id']."' ");
        if(mysqli_num_rows($penumpang) == 0){
            echo '<script>window.location="dashboard.php"</script>';
        }
        $b = mysqli_fetch_object($penumpang);
        // menamasukkan ke tb_suspek
        // $suspek = mysqli_query($conn, "SELECT * FROM tb_suspek");
        // if(mysqli_num_rows($suspek) == 0){
        //     echo '<script>window.location="dashboard.php"</script>';
        // }
        // $s = mysqli_fetch_object($suspek);

        if(isset($_POST['bsimpan'])){

            // data inputan dari form
            // $idt                = $_POST['id_penumpang'];
            $nomor_penerbangan 	= $_POST['nomor'];
            $nama_penumpang 	= $_POST['tnamap'];
            // $nama_barang 		= $_POST['tnamab'];
            // $kategori_barang 	= $_POST['tkategoribarang'];
            // $jumlah 	        = $_POST['tjumlah'];
            // $status 	        = $_POST['tstatus'];
            // $satuan 	 	    = $_POST['tsatuan'];
            // $tanggal 	 	    = $_POST['tTanggal'];
            $update= mysqli_query($conn, "INSERT INTO `tb_suspek`(`id_suspek`, `nomor_penerbangan`, `nama_penumpang`, 'status') VALUES (null,'$nomor_penerbangan','$nama_penumpang')");
            // $update= mysqli_query("INSERT INTO tb_suspek (nomor_penerbangan, nama_penumpang, nama_barang, kategori_barang, jumlah, satuan, tanggal) SELECT (nomor, nama_penumpang) FROM tb_penumpang WHERE nomor='".$nomor_penerbangan."', nama_penumpang='".$nama_penumpang."'");
            // $update = mysqli_query($conn, "INSERT INTO tb_suspek SET 
            //                         nomor = '".$nama_penerbangan."',
            //                         nama_penumpang = '".$nama_penumpang."',
            //                         nama_barang = '".$nama_barang."',
            //                         kategori_barang = '".$kategori_barang."',
            //                         jumlah = '".$jumlah."',
            //                         status = '".$status."',
            //                         satuan = '".$satuan."',
            //                         tanggal = '".$tanggal."'
            //                         WHERE id_barang = '".$b->id_barang."'	");
            if($update){
                echo '<script>alert("Ubah data berhasil")</script>';
                echo '<script>window.location="dashboard.php"</script>';
            }else{
                echo 'gagal '.mysqli_error($conn);
            }
        }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
    
  <body>
      <!-- Awal Kontainer -->
    <div class="container">
        <h3 class="text-center">Selamat Datang</h3>
        <h4 class="text-center">Silahkan Input Data Barang</h4>
          
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
                            <div class="mb-2">
                                <label class="form-label">Nomor Penerbangan</label>
                                <!-- <input type="text" name="tkode" class="form-control" placeholder="Masukkan Nama Penerbangan"> -->
                                <input type="text" name="nomor" class="form-control" placeholder="Masukkan Nomor Penerbangan" value="<?php echo $b->nomor ?>" required>
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Nama Penumpang</label>
                                <!-- <input type="text" name="tnamap" class="form-control" placeholder="Masukkan Nama Penumpang"> -->
                                <input type="text" name="tnamap" class="form-control" placeholder="Masukkan Nama Penumpang" value="<?php echo $b->nama_penumpang ?>" required>
                            </div>
                            
                        <div class="text-center">
                            <hr>
                            <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                            <button class="btn btn-danger" name="bbatal" type="reset">Batalkan</button>
                        </div>     
                        </div>
                        </form>
                        <!-- Akhir form -->
                    </div>
                    <div class="card-footer bg-primary">
                        
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