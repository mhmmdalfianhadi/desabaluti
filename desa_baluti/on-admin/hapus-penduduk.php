<?php
require '../session-start.php';
require '../koneksi.php';

// Cek apakah parameter id_pendaftaran dikirimkan
if (isset($_GET['id_penduduk'])) {
    $id_penduduk = $_GET['id_penduduk'];

    // Query untuk menghapus data berdasarkan id
    $query = "DELETE FROM penduduk WHERE id_penduduk = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_penduduk);

    if ($stmt->execute()) {
        // Jika berhasil, arahkan kembali ke halaman sebelumnya dengan pesan sukses
        echo "<script>
                alert('Data berhasil dihapus.');
                window.location.href = 'data-penduduk.php'; 
            </script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<script>
                alert('Data gagal dihapus. Terjadi kesalahan.');
                window.location.href = 'data-penduduk.php'; 
            </script>";
    }

    $stmt->close();
    $koneksi->close();
} else {
    // Jika tidak ada parameter id kembalikan ke halaman utama
    echo "<script>
            alert('ID status tidak ditemukan.');
            window.location.href = 'data-penduduk.php'; 
        </script>";
}
