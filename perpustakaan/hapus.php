<?php
    include "index.php";
    $katalog = $_GET['buku_id'];

    $sql ="DELETE FROM tb_katalog WHERE buku_id='$katalog'";
    $hasil = mysqli_query($koneksi, $sql);

    echo "<script> alert ('data berhasil di hapuskan')</script>";
    header("location:index.php");
    ?>