<?php
    class Kendaraan{
        protected $nama, $warna;

        public function __construct($nama, $warna){
            $this->nama = $nama;
            $this->warna = $warna;
        }

        public function getNama(){
            return $this->nama;
        }

        public function getwarna(){
            return $this->warna;
        }
    }
?>