<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wisata Bekasi</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
    <section class="projects-section bg-light" id="pesan_tiket">
        <div class="container px-4 px-lg-5">
            
            <div class="row gx-4 gx-lg-5 justify-content-center">
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
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="text-white-1000">Form Pemesanan Tiket</h2>
                    <hr class="divider" />
                    <p class="text-white-500 mb-5">Udah siap untuk berwisata ke bekasi? Yuk langsung aja isi formnya sesuai dengan data yang sebenar-benarnya ya!</p>
                </div>
            </div>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                <input placeholder="Isi dengan nama lengkap" type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="id_ktp" class="col-sm-2 col-form-label">Nomor Identitas</label>
                <div class="col-sm-10">
                <input placeholder="Isi dengan NIK" type="number" name="id_ktp"class="form-control" id="id_ktp" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                <input placeholder="Isi dengan namor HP aktif" type="number" name="no_hp"class="form-control" id="no_hp" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="tempat_wisata" class="col-sm-2 col-form-label">Tempat Wisata</label>

                <div class="col-sm-10">
                    <select id="select_tempat" name="tempat_wisata" class="form-control" onchange="getHarga()" required>
                        <option disabled selected>Pilih Tempat Wisata</option>
                        <?php
                        include "koneksi.php";
                        $daftar = mysqli_query($koneksi, "SELECT * FROM daftar_harga");
                        foreach ($daftar as $pesan){
                        ?>
                            <option value="<?php echo $pesan['tempat_wisata']?>"> <?php echo $pesan['tempat_wisata'] ?> </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="tgl_kunjungan" class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                <div class="col-sm-10">
                <input type="date" name="tgl_kunjungan"class="form-control" id="tgl_kunjungan" required>
                </div>
            </div>
            <br>
            <div class="form-group row" id="kolom_pd">
                <label for="pengunjung_dewasa" class="col-sm-2 col-form-label">Pengunjung Dewasa</label>
                <div class="col-sm-10">
                <input placeholder="Isi dengan jumlah pengunjung yang berusia 12 tahun ke atas" type="number" name="pengunjung_dewasa" class="form-control" id="pengunjung_dewasa" onchange="getTotal()" required>
                </div>
            </div>
            <br>
            <div class="form-group row" id="kolom_pa">
                <label for="pengunjung_anak" class="col-sm-2 col-form-label">Pengunjung Anak</label>
                <div class="col-sm-10">
                <input placeholder="Isi dengan jumlah pengunjung yang berusia di bawah 12 tahun" type="number" name="pengunjung_anak" class="form-control" id="pengunjung_anak" onchange="getTotal()" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="harga_tempat" class="col-sm-2 col-form-label">Harga</label>
                
                <div class="col-sm-10">
                <p id="harga_tempat"></p>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="total_bayar" class="col-sm-2 col-form-label">Total Bayar</label>
                <div class="col-sm-10">
                <p id="total_bayar"></p>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1" required>
                    <label class="form-check-label" for="gridCheck1">
                    Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan
                    </label>
                </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="justify-content-center">
                    <a class="btn btn-primary" role="button" onclick="getTotal()">Hitung Total Bayar</a>
                    <button type="submit" name="submit" class="btn btn-primary">Pesan Tiket</button>
                    <a href="index.php" class="btn btn-primary" role="button">Cancel</a>
                </div>
            </div>
            </form>
        </div>
    </section>
</body>
<script>
    var kolom_pa = document.getElementById("kolom_pa");
    var kolom_pd = document.getElementById("kolom_pd");

    function getHarga(){
        var tempat_wisata = document.getElementById("select_tempat").value;
        if (tempat_wisata == "Muara Beting"){
            harga = 10000
        } else if (tempat_wisata == "Go! Wet Waterpark"){
            harga = 75000

        } else if (tempat_wisata == "Rumah Pohon Jatiasih"){
            harga = 5000
        }else {
            harga = 0
        }
        document.getElementById("harga_tempat").innerHTML = harga;
        kolom_pa.show();
        kolom_pd.show();

    }
    function getTotal(){
        pengunjung_anak = document.getElementById("pengunjung_anak").value;
        pengunjung_dewasa = document.getElementById("pengunjung_dewasa").value;
        jumlah_pengunjung = +pengunjung_anak + +pengunjung_dewasa;
        tempat_wisata = document.getElementById("select_tempat").value;
        if (tempat_wisata == "Muara Beting"){
            harga = 10000
        } else if (tempat_wisata == "Go! Wet Waterpark"){
            harga = 75000

        } else if (tempat_wisata == "Rumah Pohon Jatiasih"){
            harga = 5000
        }else {
            harga = 0
        }
        total_bayar = jumlah_pengunjung * harga;
        document.getElementById("total_bayar").innerHTML = total_bayar;

    }
</script>
</html>