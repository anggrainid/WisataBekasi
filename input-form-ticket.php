<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan Tiket</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $id_ktp =input($_POST["id_ktp"]);
        $nama_lengkap =input($_POST["nama_lengkap"]);
        $no_hp =input($_POST["no_hp"]);
        $tempat_wisata =input($_POST["tempat_wisata"]);
        $tgl_kunjungan = input ($_POST["tgl_kunjungan"]);
        $pengunjung_dewasa = input ($_POST["pengunjung_dewasa"]);
        $pengunjung_anak = input ($_POST["pengunjung_anak"]);

        //Query input menginput data kedalam tabel anggota
        //$sql="insert into daftar_pemesan (id_ktp,nama_lengkap,no_hp,tempat_wisata,tgl_kunjungan, pengunjung_dewasa, pengunjung_anak) values
		//('$id_ktp','$nama_lengkap', '$id_ktp', '$tempat_wisata', '$tgl_kunjungan', '$pengunjung_dewasa','$pengunjung_anak')";

        $sql = "INSERT INTO `daftar_pemesan` (`id_ktp`, `nama_lengkap`, `nomor_hp`, `tempat_wisata`, `tgl_kunjungan`, `pengunjung_dewasa`, `pengunjung_anak`) VALUES ('$id_ktp','$nama_lengkap', '$id_ktp', '$tempat_wisata', '$tgl_kunjungan', '$pengunjung_dewasa','$pengunjung_anak')";
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<div class='alert alert-success'> Data Berhasil disimpan.</div>";
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>ID KTP</label>
            <input type="text" name="id_ktp" class="form-control" placeholder="Masukan Username" required />

        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>No HP</label>
            <input  name="no_hp" class="form-control" placeholder="Masukan Nama" required/>

        </div>

        <div class="form-group">
            <label>Tempat Wisata</label>
            <input type="text" name="tempat_wisata" class="form-control" placeholder="Masukan Nama" required/>

        </div>

        <div class="form-group">
            <label>Tgl Kunjungan</label>
            <input type="date" name="tgl_kunjungan" class="form-control" placeholder="Masukan Nama" required/>

        </div>

        <div class="form-group">
            <label>Pengunjung Dewasa</label>
            <input type="text" name="pengunjung_dewasa" class="form-control" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Pengunjung Anak</label>
            <input type="text" name="pengunjung_anak" class="form-control" placeholder="Masukan Nama" required/>

        </div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>