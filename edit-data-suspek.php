<?php
    	session_start();
        include 'db.php';
        if($_SESSION['login'] != true){
            echo '<script>window.location="login.php"</script>';
        }
    // Menanpilkan data dari tabel tb_suspek
        $barang = mysqli_query($conn, "SELECT * FROM tb_suspek WHERE id_suspek = '".$_GET['id']."' ");
        if(mysqli_num_rows($barang) == 0){
            echo '<script>window.location="dashboard.php"</script>';
        }
        $b = mysqli_fetch_object($barang);
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
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nomor Penerbangan" value="<?php echo $b->nomor_penerbangan ?>" required>
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Nama Penumpang</label>
                                <input type="text" name="tnamap" class="form-control" placeholder="Masukkan Nama Penumpang" value="<?php echo $b->nama_penumpang ?>" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" name="tnamab" class="form-control" placeholder="Masukkan Nama Barang" value="<?php echo $b->nama_barang ?>" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Kategori Barang</label>
                                <select class="form-select" name="tkategoribarang" required>
                                <optgroup label="--Pilih--"></optgroup>
                                <!-- <option value="">--Pilih--</option> -->
                                    <?php
                                        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC"); 
                                            while($r = mysqli_fetch_array($kategori)){
                                    ?> 
                                    <option value="<?php echo $r['kategori_barang'] ?>"><?php echo $r['kategori_barang'] ?></option>
                                <?php } ?>
                                </select>
                            <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="tjumlah" class="form-control" placeholder="Masukkan Jumlah Barang" value="<?php echo $b->jumlah ?>" required>
                                </div>
                            </div>    
                            <div class="col">
                            <div class="mb-2">
                                <label class="form-label">Satuan</label>
                                <select class="form-select" name="tsatuan" required>
                                <optgroup label=--Pilih--></optgroup>
                                    <!-- x -->
                                    <option value="Unit">Unit</option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Box">Box</option>
                                </select>
                            </div>    
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tTanggal" class="form-control" placeholder="Masukkan Jumlah Barang" required>
                                </div>
                            </div>   
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="tstatus" required>
                                <!-- <option value="">--Pilih--</option> -->
                                <optgroup label=test></optgroup>
                                    <?php
                                        $status = mysqli_query($conn, "SELECT * FROM tb_status ORDER BY id_status DESC"); 
                                            while($r = mysqli_fetch_array($status)){
                                    ?> 
                                    <option value="<?php echo $r['status'] ?>"><?php echo $r['status']?></option>
                                    <!-- <option value="1"  {{ if (old'id_status') == 1 ? 'selected' : '' }}><?php echo $r['status']?></option> -->
                                    <!-- <option value="2"  {{ old('id_status') == 2 ? 'selected' : '' }}><?php echo $r['status']?></option> -->
                                <?php } ?>
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
					if(isset($_POST['bsimpan'])){

						// data inputan dari form
						$nomor_penerbangan 	= $_POST['nama'];
						$nama_penumpang 	= $_POST['tnamap'];
						$nama_barang 		= $_POST['tnamab'];
						$kategori_barang 	= $_POST['tkategoribarang'];
						$jumlah 	        = $_POST['tjumlah'];
                        $status 	        = $_POST['tstatus'];
                        $satuan 	 	    = $_POST['tsatuan'];
						$tanggal 	 	    = $_POST['tTanggal'];
                        $update = mysqli_query($conn, "UPDATE tb_suspek SET 
												nomor_penerbangan = '".$nomor_penerbangan."',
												nama_penumpang = '".$nama_penumpang."',
												nama_barang = '".$nama_barang."',
												kategori_barang = '".$kategori_barang."',
												jumlah = '".$jumlah."',
                                                status = '".$status."',
                                                satuan = '".$satuan."',
												tanggal = '".$tanggal."'
												WHERE id_suspek = '".$b->id_suspek."'");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="suspek.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}
                    }
                    
						
                        ?>
                        
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