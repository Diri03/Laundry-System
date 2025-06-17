<?php
    require_once "kendaraan.php";
    class Mobil extends Kendaraan {
        private $jml_pintu;

        public function __construct($nama, $warna, $jml_pintu){
            $this->nama = $nama;
            $this->warna = $warna;
            $this->jml_pintu = $jml_pintu;
        }

        public function getJmlPintu(){
            return $this->jml_pintu;
        }
    }
?>