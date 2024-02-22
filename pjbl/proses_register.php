<?php
//memanggil file koneksi.php
include "koneksi.php";
$username=$_POST['nama'];
$email=$_POST['email'];
$password=$_POST['password'];

$level="user";//level otomatis diisi user pd saat registrasi
//format acak password harus sama dengan proses_login.php

$kirim=$_POST['Register'];
//proses kirim data ke database MYSQL
if($kirim){
$query="INSERT INTO tbl_user VALUES
('','$username','$email','$password','$level')";
$hasil=mysqli_query($conn,$query);
header('location:user.html');
}else{
echo "Registrasi User Gagal!";
}   