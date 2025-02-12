<?php
$servername = "localhost";
$database = "desa_baluti";
$username = "root";
$password = "";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

//Membuat tampilan waktu
date_default_timezone_set('Asia/Makassar');
