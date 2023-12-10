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
    <nav class="navbar navbar-dark bg-primary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpustakaan SMA Berdikari</a>
            <a class="btn btn-outline-light" href="logout.php">Logout</a>   
        </div>        
    </nav> 
    <br> 
    <div class="container">
        <h1>Katalog Perpustakaan SMA Berdikari</h1>
        <br>
        <a href="tambah-buku.php"  class="btn btn-primary">Tambah Buku</a>
        <br>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Cover</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Penulis</th>
                <th scope="col">Jenis Buku</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              
                <?php 
                    include ('koneksi.php');
                    //*********** Perintah menampilkan daftar buku ***********//
                    $sql=mysqli_query($koneksi, "select * from tb_katalog order by buku_id ASC");
                    $no=1;
                        while ($row=mysqli_fetch_array($sql)){
                          $judul_buku=$row['buku_judul'];
                            echo "
                                  <tr>
                                    <td width='30'>".$no."</td>
                                    <td width='100'><image width='60px' src='img/".$row['buku_cover']."'></td>
                                    <td width='200'>".$row['buku_judul']."</td>
                                    <td width='150'>".$row['buku_penulis']."</td>
                                    <td width='100'>".$row['buku_jenis']."</td>
                                    <td width='100'><a class='btn btn-info' href='edit-buku.php?buku_id=".$row['buku_id']."'>Edit</a> <a class='btn btn-danger' href='hapus.php?buku_id=".$row['buku_id']."'>Hapus</a> </td>
                                  </tr>
                                            ";
                          $no++;
                        };
                ?>
                
            </tbody>
          </table>
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
