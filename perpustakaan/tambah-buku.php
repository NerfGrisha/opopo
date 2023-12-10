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
        <h1>Tambah Buku</h1>
        <br>
        <form action="tambah-buku.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <label for="inputBuku" class="col-sm-2 col-form-label">Judul Buku</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="judulbuku" name="judulBuku">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPenulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="penulis" name="penulis">
            </div>
          </div>
          
          <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Jenis Buku</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisBuku" id="gridRadios1" value="Fiksi" checked>
                <label class="form-check-label" for="gridRadios1">
                  Fiksi
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisBuku" id="gridRadios2" value="Nonfiksi">
                <label class="form-check-label" for="gridRadios2">
                  Nonfiksi
                </label>
              </div>
              
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cover Buku</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="fileCover" name="fileCover">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="simpan" value="Simpan">Tambahkan</button>
        </form>

      <?php
        /*Mengecek apabila tombol Tambahkan diklik*/
        if (isset ($_POST['simpan'])) {
            include ('koneksi.php');
            /*Menerima dan Menampung data*/
            $judul_buku = $_POST['judulBuku'];
            $penulis_buku = $_POST['penulis'];
            $jenis_buku = $_POST['jenisBuku'];
            $cover_buku = basename($_FILES["fileCover"]["name"]);

            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileCover"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
              echo "Maaf, hanya file berekstensi JPG, JPEG, PNG & GIF yang diperbolehkan untuk diupload. ";
              $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Maaf, file Anda gagal diupload.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["fileCover"]["tmp_name"], $target_file)) {
                echo "File ". htmlspecialchars( basename( $_FILES["fileCover"]["name"])). " berhasil diupload.";
              } else {
                echo "Maaf, ada error ketika mengupload file Anda.";
              }
            }

            if ($uploadOk == 1) {
              /*Melakukan penyimpanan data*/
              $sql=mysqli_query ($koneksi, "INSERT INTO tb_katalog VALUES (NULL,'$judul_buku','$penulis_buku','$jenis_buku','$cover_buku')");
            }

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
