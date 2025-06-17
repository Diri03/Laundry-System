<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'kendaraan';
    $config = mysqli_connect($host, $user, $pass, $db);
    if($config->connect_error){
        echo 'Koneksi Error';
    }
?>