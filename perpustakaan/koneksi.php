<?php
$hostname="localhost";
$username="root";
$password="";
$database="responsi_2590";
$koneksi= mysqli_connect($hostname,$username,$password) or die ("koneksi ke MYSQL gagal");
mysqli_select_db($koneksi, $database) or die ("koneksi ke database gagal");
?>