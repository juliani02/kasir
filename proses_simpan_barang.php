<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirimdari form
$NamaProduk = $_POST['NamaProduk'];
$Harga = $_POST['Harga'];
$Stok = $_POST['Stok'];

// menginput data ke database
mysqli_query($koneksi,"insert into produk values('','$NamaProduk','$Harga','Stok')")

//mengalihkan halaman kembalike data_barang.php
header ("location:data_barang.php?pesan=simpan");

?>