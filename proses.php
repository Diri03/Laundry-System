<?php
    include 'koneksi2.php';
    include 'classes/kendaraan.php';
    include 'classes/mobil.php';
    include 'classes/motor.php';

    if (isset($_POST['kirim'])) {
        $kendaraan = $_POST['kendaraan'];
        $nama = $_POST['nama'];
        $warna = $_POST['warna'];
        if ($kendaraan == "Mobil") {
            $jml_pintu = $_POST['jml_pintu'];
            $mobil = new Mobil($nama, $warna, $jml_pintu);
            $mobil->getNama();
            $mobil->getwarna();
            $mobil->getJmlPintu();
            mysqli_query($config,"INSERT INTO tbl_kendaraan (kendaraan, nama, warna, jml_pintu) VALUES ('$kendaraan', '$nama', '$warna', '$jml_pintu')");
        } else {
            $jenis = $_POST['jenis'];
            $motor = new Motor($nama, $warna, $jenis);
            $motor->getNama();
            $motor->getwarna();
            $motor->getJenis();
            mysqli_query($config,"INSERT INTO tbl_kendaraan (kendaraan, nama, warna, jenis) VALUES ('$kendaraan', '$nama', '$warna', '$jenis')");
        }

        header("location:index2.php");
    }
?>