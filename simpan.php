<?php
include 'koneksi.php';

$id_ktp = $_POST['id_ktp'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];
$tempat_wisata = $_POST['tempat_wisata'];
$tgl_kunjungan = $_POST['tgl_kunjungan'];
$pengunjung_dewasa = $_POST['pengunjung_dewasa'];
$pengunjung_anak = $_POST['pengunjung_anak'];

$query = "INSERT INTO daftar_pemesan values ('','$id_ktp','$nama_lengkap', '$id_ktp', '$no_hp', '$tempat_wisata', '$tgl_kunjungan', '$pengunjung_dewasa','$pengunjung_anak')";

mysqli_query($koneksi, $query);
header("location:index.php"); //mengalihkan ke halaman index.php
?>