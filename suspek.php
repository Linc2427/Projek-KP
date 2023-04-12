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
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="suspek.php">Data Suspek</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
<!-- Nav Bar END -->

      <!-- Awal Kontainer -->
    <div class="container">
        <h3 class="text-center">Daftar Penumpang Suspect</h3>
                        
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
                        <div class="table-responsive">
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
                            if(isset($_POST['bcari'])){
                                $keyword = $_POST['tcari'];
                                $q= "SELECT * FROM tb_suspek WHERE CONCAT('',nomor_penerbangan,nama_penumpang,nama_barang,tanggal) like '%$keyword%' order BY id_suspek DESC;";
                            }
                            else{
                                $q = "SELECT * FROM tb_suspek order by id_suspek DESC";
                                
                            }

                            $tampil = mysqli_query($conn, $q);
                            while($data = mysqli_fetch_array($tampil)) {
                                
                            ?>
                            
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $data['nomor_penerbangan'] ?></td>
                                <td class="text-center"><?= $data['nama_penumpang'] ?></td>
                                <td class="text-center"><?= $data['nama_barang'] ?></td>
                                <td class="text-center"><?= $data['kategori_barang'] ?></td>
                                <td class="text-center"><?= $data['jumlah'] ?> <?= $data['satuan'] ?></td>
                                <td class="text-center"><?= $data['status'] ?></td>
                                <td class="text-center"><?= $data['tanggal']?></td>
                                <td class="text-center">
                                <!-- <button class="btn btn-primary bi bi-save" name="bsimpan" type="submit"></button> -->
                                <a href="edit-data.php?id=<?php echo $data['id_suspek'] ?>"><button class="btn btn-warning bi bi-pencil-square" name="bedit" type="submit"></button></a>
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
    <a href="logout.php" class="btn btn-person">logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>