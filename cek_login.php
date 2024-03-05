<?php
//mengaktifkan session pada php
session_start();

//menghubungkan php dengan koneksi database
include 'koneksi.php';

//menangkap data yang dikirim dari form login
$username=$_POST['username'];
$Password=md5($_POST['password']);


//menyeleksi data user dengan username dan password yang sesuai
$login=mysqli_query($koneksi,"select*from petugas where Username='$username' and Password='$Password'");
//menghitung jumlah data yang ditemukan
$cek=mysqli_num_rows($login);

//cek apakah usernamedan password di temukan pada database
if($cek > 0){

$data=mysqli_fetch_assoc($login);

//cek jika user login sebagai admin
if($data['Level']=="1"){

//buat session logindan username
$_SESSION['Username']=#username;
$_SESSION['Level']="1";
//alihkan ke halaman dashboard admin
header("location:administrator/index.php");
//cek jika user login sebagai pegawai
}else if($data['Level']=="2"){
//buat sessionlogin dan username
$_SESSION['Username']=$username;
$_SESSION['Level']="2";
//alihkan kehalaman dashboard pegawai
header("location:index.php");
}else{
//alihkan ke halaman login kembali
header("location:index.php?pesan=gagal");
}
}else{
header("location:index.php?pesan=gagal");
}
?>