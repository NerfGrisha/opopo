<?php 
  include 'koneksi.php';
  session_start();

  $user = $_POST['username'];
  $pass = $_POST['password'];

  $query = mysqli_query($koneksi, "SELECT * FROM tb_admin where admin_username='$user' and admin_password='$pass'");
  $cek = mysqli_num_rows($query);

  if ($cek==1)
  {
    session_start();
    $_SESSION['username'] = $user;
    header("location:index.php");
  }

  else{
    echo "<br><br><center><h1>Login gagal, cek bagian username dan password.</h1></center>";
    echo "<center><a href='login.php'><h2>&#11013 Kembali</h2></a></center>";
  }
  
  
  
?>