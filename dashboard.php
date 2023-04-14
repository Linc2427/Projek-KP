<?php
    session_start();
    include 'db.php';
    if (!$conn) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
    // Jika tidak bisa login maka balik ke login.php
    // jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
    if($_SESSION['login'] != true){
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
      
    <nav class="navbar navbar-expand-lg" style="background-color: #34eb49;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Nama Web</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="suspek.php">Data Suspek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Nav Bar END -->

      <!-- Awal Kontainer -->
    <div class="container">
          <br>
        <!-- Awal Row -->
        <div class="row">
            <!-- Awal col --> 
            <div class="col-md-8 mx-auto">
                <!-- Awal card --> 
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Form Scan
                    </div>
                    <div class="card-body">
                        <!-- Awal form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-2">
                                <label class="form-label">Cari</label>
                                <input type="text" name="tcari" value="<?php if(isset($_POST['bcari'])){echo $_POST['bcari'];} ?>" class="form-control" placeholder="Scan Here">
                        <div class="text-center">
                            <hr>
                            <button class="btn btn-primary bi bi-search" name="bcari" type="submit"> Cari</button>
                            <button class="btn btn-danger bi bi-bootstrap-reboot" name="breset" type="Batalkan"> Reset</button>
                        </div>     
                        </form>
                        <!-- Akhir form -->
                        
                        <?php
                        
                        if(isset($_POST['bsimpan'])) {
                            $simpan = mysqli_query($conn, " INSERT INTO tb_penumpang (`nama_penumpang`) VALUE('$_POST[tkode]')");     
                            if($simpan){
                                echo "<script>
                                        alert('Simpan data sukses');
                                        document.location='dashboard.php';
                                    </script>";
                            } else {
                                echo "<script>
                                        alert('Simpan data Gagal');
                                        document.location='dashboard.php';
                                    </script>";
                                
                                
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
        
        <!-- Awal card --> 
                <div class="card mt-3">
                    <div class="card-header bg-primary text-light">
                        Data Penumpang
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 mx-auto">
                            <form method="post">
                            </form>
                        </div>

                        <!-- Tabel -->
                        <div class="table-responsive text-center">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Nomor Penerbangan</th>
                                <th>Nama Penumpang</th>
                                <th>Aksi</th>
                        </tr>
                            <!-- Menampilkan Data yang ada di Database -->
                            <?php
                            $no = 1;
                            if(isset($_POST['bcari'])){
                                $keyword = $_POST['tcari'];
                                $q= "SELECT * FROM tb_penumpang WHERE CONCAT('',nama_penumpang, nomor) like '%$keyword%' order BY id_penumpang DESC;";
                            }
                            else{
                                $q = "SELECT * FROM tb_penumpang order by id_penumpang DESC";
                                
                            }

                            $tampil = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($tampil)) {
                                
                            ?>
                            
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nomor'] ?></td>
                                <td><?= $data['nama_penumpang'] ?></td>
                                <td>
                                <a href="edit-data.php?id=<?php echo $data['id_penumpang'] ?>"><button class="btn btn-success bi bi-person-fill-add" name="bedit" type="submit">Tambah </button></a>
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
  </body>
</html>
