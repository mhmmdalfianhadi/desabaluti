<?php
require 'koneksi.php';

//Validasi Username Reall Time
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);

    $sql = "SELECT * FROM pengguna WHERE username = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<span style='color:red'>Username sudah digunakan</span>";
    } else {
        echo "<span style='color:green'>Username tersedia</span>";
    }

    $stmt->close();
    exit();
}
