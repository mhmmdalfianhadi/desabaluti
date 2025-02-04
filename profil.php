<?php
require '../koneksi.php';
require '../session-start.php';

// Periksa apakah id_pengguna ada dalam sesi
if (!isset($_SESSION['id_pengguna'])) {
    die("Anda harus login untuk mengakses halaman ini.");
}

// Ambil id_pengguna dari sesi
$id_pengguna = $_SESSION['id_pengguna'];

// Query untuk mengambil data profil berdasarkan id_pengguna
$stmt = $koneksi->prepare("SELECT profil.id_profil, profil.gambar 
    FROM profil 
    JOIN pengguna ON profil.id_pengguna = pengguna.id_pengguna 
    WHERE profil.id_pengguna = ?");
$stmt->bind_param("i", $id_pengguna);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = []; // Tidak ada data ditemukan
}

$stmt->close();
$koneksi->close();
