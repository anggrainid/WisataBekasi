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

        $tempat_wisata=input($_POST["tempat_wisata"]);
        $jam_buka=input($_POST["jam_buka"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into daftar_harga (tempat_wisata, jam_buka) values
		('$tempat_wisata', '$jam_buka')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<div class='alert alert-danger'> Data Berhasil disimpan.</div>";
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Tempat Wisata:</label>
            <input type="text" name="tempat_wisata" class="form-control" placeholder="Masukan Username" required />

        </div>
        <div class="form-group">
            <label>Jam Buka:</label>
            <input type="text" name="jam_buka" class="form-control" placeholder="Masukan Nama" required/>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>