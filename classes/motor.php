<?php
    require_once "kendaraan.php";
    class Motor extends Kendaraan {
        private $jenis;

        public function __construct($nama, $warna, $jenis){
            $this->nama = $nama;
            $this->warna = $warna;
            $this->jenis = $jenis;
        }

        public function getJenis(){
            return $this->jenis;
        }
    }
?>