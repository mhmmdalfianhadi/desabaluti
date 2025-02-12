<?php
require '../session-start.php';
require '../koneksi.php';

// Cek apakah parameter id_pendaftaran dikirimkan
if (isset($_GET['id_kepala'])) {
    $id_kepala = $_GET['id_kepala'];

    // Query untuk menghapus data berdasarkan id
    $query = "DELETE FROM kepala WHERE id_kepala = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_kepala);

    if ($stmt->execute()) {
        // Jika berhasil, arahkan kembali ke halaman sebelumnya dengan pesan sukses
        echo "<script>
                alert('Data berhasil dihapus.');
                window.location.href = 'data-kepala.php'; 
            </script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>
                alert('Data gagal dihapus. Terjadi kesalahan.');
                window.location.href = 'data-kepala.php'; 
            </script>";
    }

    $stmt->close();
    $koneksi->close();
} else {
    // Jika tidak ada parameter id kembalikan ke halaman utama
    echo "<script>
            alert('ID status tidak ditemukan.');
            window.location.href = 'data-kepala.php'; 
        </script>";
}
