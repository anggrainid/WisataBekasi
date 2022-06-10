<?php
include 'koneksi.php';

$id_ktp = $_POST['id_ktp'];
$nama_lengkap = $_POST['nama_lengkap'];
$no_hp = $_POST['no_hp'];
$tempat_wisata = $_POST['tempat_wisata'];
$tgl_kunjungan = $_POST['tgl_kunjungan'];
$pengunjung_dewasa = $_POST['pengunjung_dewasa'];
$pengunjung_anak = $_POST['pengunjung_anak'];

$query = "insert into daftar_pemesan (id_ktp,nama_lengkap,no_hp,tempat_wisata,tgl_kunjungan, pengunjung_dewasa, pengunjung_anak) values
('$id_ktp','$nama_lengkap', '$id_ktp', '$tempat_wisata', '$tgl_kunjungan', '$pengunjung_dewasa','$pengunjung_anak')";

$hasil = mysqli_query($koneksi, $query);
if ($hasil) {
    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
}
else {
    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

}
?>