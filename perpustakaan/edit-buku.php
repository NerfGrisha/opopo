<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpustakaan SMA Berdikari</a>  
            <a class="btn btn-outline-light" href="logout.php">Logout</a> 
        </div>        
    </nav> 
    <br> 
    <div class="container">
        <h1>Edit Buku</h1>
        <?php 
          include ('koneksi.php');

          if (isset($_GET['buku_id'])){ 
            $id=$_GET['buku_id']; 
            $sql_edit=mysqli_query($koneksi,"SELECT * FROM tb_katalog WHERE buku_id='$id'");
            while ($data=mysqli_fetch_array($sql_edit)){
                $judul_buku=$data['buku_judul'];
                $penulis_buku=$data['buku_penulis'];
                $jenis_buku=$data['buku_jenis'];
                $cover_buku=$data['buku_cover'];
            }
            
        ?>

        <form action="edit-buku.php" method="POST" >
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">ID Buku</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="idbuku" name="idBuku" value="<?php echo $id ?>" readonly="readonly">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cover Buku</label>
            <div class="col-sm-10">
              <image width='60px' src='<?php echo "img/".$cover_buku ?>'>
              File terupload: <?php echo $cover_buku ?>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Judul Buku</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="judulbuku" name="judulBuku" value="<?php echo $judul_buku ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="penulis" name="penulis" value="<?php echo $penulis_buku ?>">
            </div>
          </div>
          
          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Jenis Buku</legend>
            <div class="col-sm-10">
              <?php 
                if ($jenis_buku=='Fiksi'){
                  echo "
                  <div class='form-check'>
                    <input class='form-check-input' type='radio' name='jenisBuku' id='gridRadios1' value='Fiksi' checked>
                    <label class='form-check-label' for='gridRadios1'>
                      Fiksi
                    </label>
                  </div>
                  <div class='form-check'>
                    <input class='form-check-input' type='radio' name='jenisBuku' id='gridRadios2' value='Nonfiksi'>
                    <label class='form-check-label' for='gridRadios2'>
                      Nonfiksi
                    </label>
                  </div>
                  ";
                }
                else
                {
                  echo "
                  <div class='form-check'>
                    <input class='form-check-input' type='radio' name='jenisBuku' id='gridRadios1' value='Fiksi'>
                    <label class='form-check-label' for='gridRadios1'>
                      Fiksi
                    </label>
                  </div>
                  <div class='form-check'>
                    <input class='form-check-input' type='radio' name='jenisBuku' id='gridRadios2' value='Nonfiksi' checked>
                    <label class='form-check-label' for='gridRadios2'>
                      Nonfiksi
                    </label>
                  </div>
                  ";
                }

              ?>
              
            </div>
          </fieldset>
          
          <button type="submit" class="btn btn-primary" name="simpan" value="Simpan">Edit Buku</button>
        </form>

      <?php

        }
        
        /*Mengecek apabila tombol Tambahkan diklik*/
        if (isset ($_POST['simpan'])) {
           
            /*Menerima dan Menampung data*/
            $id_buku = $_POST['idBuku'];
            $judul_buku = $_POST['judulBuku'];
            $penulis_buku = $_POST['penulis'];
            $jenis_buku = $_POST['jenisBuku'];

            /*Melakukan penyimpanan data ke tabel katalog*/
            $sql=mysqli_query ($koneksi, "UPDATE tb_katalog SET buku_judul='$judul_buku', buku_penulis='$penulis_buku', buku_jenis='$jenis_buku' WHERE buku_id='$id_buku'");

            echo "<br><h5>Data buku berjudul <b><i>".$judul_buku."</b></i> berhasil diubah.</h5>";

            }
        ?>
        <br>
        <a href="index.php"  class="btn btn-primary">Kembali ke Beranda</a>
    </div>

   
    
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">&copy; 2023 SMA Berdikari</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          </a>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
