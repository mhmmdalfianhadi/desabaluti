<?php
require '../session-start.php';
include '../profil.php';
require '../koneksi.php';

// Ambil data dari URL (GET)
$id_penduduk = isset($_GET['id_penduduk']) ? intval($_GET['id_penduduk']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $ttl = $_POST['ttl'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];
    $status_perkawinan = $_POST['status_perkawinan'];

    // Update data ke dalam database berdasarkan id_penduduk
    $stmt = $koneksi->prepare("UPDATE penduduk SET nama = ?, nik = ?, alamat = ?, desa = ?, kecamatan = ?, kabupaten = ?, ttl = ?, jenis_kelamin = ?, pekerjaan = ?, status_perkawinan = ? WHERE id_penduduk = ?");
    $stmt->bind_param("ssssssssssi", $nama, $nik, $alamat, $desa, $kecamatan, $kabupaten, $ttl, $jenis_kelamin, $pekerjaan, $status_perkawinan, $id_penduduk);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil diperbarui.');
            window.location.href = 'data-penduduk.php';
        </script>";
    } else {
        echo "<script>
            alert('Terjadi kesalahan: " . $stmt->error . "');
            window.location.href = 'data-penduduk.php';
        </script>";
    }

    $stmt->close();
} else {
    // Ambil data dari database untuk ditampilkan di form edit
    $stmt = $koneksi->prepare("SELECT * FROM penduduk WHERE id_penduduk = ?");
    $stmt->bind_param("i", $id_penduduk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Ambil data untuk ditampilkan di form
        $nama = $row['nama'] ?? '';
        $nik = $row['nik'] ?? '';
        $alamat = $row['alamat'] ?? '';
        $desa = $row['desa'] ?? '';
        $kecamatan = $row['kecamatan'] ?? '';
        $kabupaten = $row['kabupaten'] ?? '';
        $ttl = $row['ttl'] ?? '';
        $jenis_kelamin = $row['jenis_kelamin'] ?? '';
        $pekerjaan = $row['pekerjaan'] ?? '';
        $status_perkawinan = $row['status_perkawinan'] ?? '';
    } else {
        echo "<script>
            alert('Data tidak ditemukan.');
            window.location.href = 'data-penduduk.php';
        </script>";
        exit;
    }
    $stmt->close();
}

$koneksi->close();
?>
<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Desa Baluti - Beranda</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/Logo Desa.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css" />
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include 'menu.php'; ?>

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="mdi mdi-menu mdi-24px"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Style Switcher -->
                            <li class="nav-item me-1 me-xl-0">
                                <a
                                    class="nav-link btn btn-text-secondary rounded-pill btn-icon style-switcher-toggle hide-arrow"
                                    href="javascript:void(0);">
                                    <i class="mdi mdi-24px"></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar" style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden;">
                                        <?php if (!empty($data) && isset($data[0]['gambar']) && !empty($data[0]['gambar'])): ?>
                                            <img src="<?= htmlspecialchars($data[0]['gambar']) ?>" alt="img" style="object-fit: cover; width: 100%; height: 100%;">
                                        <?php else: ?>
                                            <img src="../assets/img/avatars/1.png" alt="default" class="w-px-40 h-auto rounded-circle">
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="../keluar.php">
                                            <i class="mdi mdi-logout me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Multi Column with Form Separator -->
                        <div class="card mb-4">
                            <h5 class="card-header">Formulir Surat Keterangan Tidak Mampu</h5>
                            <form class="card-body" method="post">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="nama" class="form-label">Nama Lengkap</label>
                                            <input class="form-control" type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" placeholder="Masukkan nama lengkap" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input class="form-control" type="text" name="nik" value="<?php echo htmlspecialchars($nik); ?>" placeholder="Masukkan 16 digit NIK KTP" oninput="if(this.value.length > 16) this.value = this.value.slice(0, 16);" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input class="form-control" type="text" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>" placeholder="Masukkan alamat tinggal" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="desa" class="form-label">Desa</label>
                                            <input class="form-control" type="text" name="desa" placeholder="Contoh : Baluti" value="<?php echo htmlspecialchars($desa); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="kecamatan" class="form-label">Kecamatan</label>
                                            <input class="form-control" type="text" name="kecamatan" placeholder="Contoh : Kandangan" value="<?php echo htmlspecialchars($kecamatan); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="kabupaten" class="form-label">Kabupaten</label>
                                            <input class="form-control" type="text" name="kabupaten" placeholder="Contoh : Hulu Sungai Selatan" value="<?php echo htmlspecialchars($kabupaten); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="ttl" class="form-label">Tempat/Tanggal Lahir</label>
                                            <input class="form-control" type="text" name="ttl" value="<?php echo htmlspecialchars($ttl); ?>" placeholder="Masukkan tempat dan tanggal lahir" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" required>
                                                <option value="">Pilih jenis kelamin</option>
                                                <option value="Laki-Laki" <?php echo ($jenis_kelamin == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?php echo ($jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                            <input class="form-control" type="text" name="pekerjaan" value="<?php echo htmlspecialchars($pekerjaan); ?>" placeholder="Masukkan pekerjaan" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="status_perkawinan" class="form-label">Status</label>
                                            <select class="form-control" name="status_perkawinan" required>
                                                <option value="">Pilih Status Perkawinan</option>
                                                <option value="Belum Kawin" <?php echo ($status_perkawinan == 'Belum Kawin') ? 'selected' : ''; ?>>Belum Kawin</option>
                                                <option value="Kawin" <?php echo ($status_perkawinan == 'Kawin') ? 'selected' : ''; ?>>Kawin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Edit</button>
                                        <button type="button" class="btn btn-danger me-sm-3 me-1" onclick="window.location.href='data-penduduk.php';">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- / Content -->
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../assets/vendor/libs/moment/moment.js"></script>
    <script src="../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../assets/vendor/libs/select2/select2.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/form-layouts.js"></script>
</body>

</html>