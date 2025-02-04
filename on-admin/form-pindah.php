<?php
require '../session-start.php';
include '../profil.php';
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $id_penduduk = $_POST['id_penduduk'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $desa_tujuan = $_POST['desa_tujuan'];
    $kecamatan_tujuan = $_POST['kecamatan_tujuan'];
    $kabupaten_tujuan = $_POST['kabupaten_tujuan'];
    $no_surat = NULL;
    $ket = NULL;

    // Masukkan data ke dalam database
    $stmt = $koneksi->prepare("INSERT INTO pindah (id_penduduk, alamat_tujuan, desa_tujuan, kecamatan_tujuan, kabupaten_tujuan, no_surat, ket) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "issssss",  // Tipe data: i = integer, s = string
        $id_penduduk,
        $alamat_tujuan,
        $desa_tujuan,
        $kecamatan_tujuan,
        $kabupaten_tujuan,
        $no_surat,
        $ket
    );

    if ($stmt->execute()) {
        echo "<script>
        alert('Data berhasil disimpan.');
        window.location.href = 'data-pindah.php';
    </script>";
    } else {
        echo "<script>
        alert('Terjadi kesalahan: " . $stmt->error . "');
        window.location.href = 'form-pindah.php';
    </script>";
    }

    $stmt->close();
}

$query = "SELECT * FROM penduduk";
$pendudukList = get_multiple_values($koneksi, $query);

function get_multiple_values($koneksi, $query)
{
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Failed: " . mysqli_error($koneksi));
    }
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
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

    <title>Desa Baluti - Pindah</title>

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
                            <h5 class="card-header">Formulir Surat Keterangan Pindah</h5>
                            <form class="card-body" method="post">
                                <div class="row g-4">
                                    <div class="col-md-6 col-xl-6 col-xxl-6 mb-2">
                                        <label for="id_penduduk" class="form-label">Penduduk</label>
                                        <select id="id_penduduk" class="form-control" name="id_penduduk" required style="max-height: 200px; overflow-y: auto;">
                                            <option value="">Pilih Penduduk</option>
                                            <?php foreach ($pendudukList as $penduduk): ?>
                                                <option value="<?php echo htmlspecialchars($penduduk['id_penduduk']); ?>">
                                                    <?php echo htmlspecialchars($penduduk['nama']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="alamat_tujuan" class="form-label">Alamat Tujuan</label>
                                            <input class="form-control" type="text" name="alamat_tujuan" placeholder="Masukkan alamat tujuan" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="desa_tujuan" class="form-label">Desa Tujuan</label>
                                            <input class="form-control" type="text" name="desa_tujuan" placeholder="Contoh : Baluti" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="kecamatan_tujuan" class="form-label">Kecamatan Tujuan</label>
                                            <input class="form-control" type="text" name="kecamatan_tujuan" placeholder="Contoh : Kandangan" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="kabupaten_tujuan" class="form-label">Kabupaten Tujuan</label>
                                            <input class="form-control" type="text" name="kabupaten_tujuan" placeholder="Contoh : Hulu Sungai Selatan" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="no_surat" class="form-label">No Surat</label>
                                            <input class="form-control" type="text" name="no_surat" placeholder="Masukkan nomor surat" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <label for="ket" class="form-label">Keterangan</label>
                                            <select class="form-control" name="ket" required>
                                                <option value="">Pilih Keterangan</option>
                                                <option value="Diproses">Diproses</option>
                                                <option value="Ditolak">Ditolak</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Simpan</button>
                                    <button type="button" class="btn btn-danger me-sm-3 me-1" onclick="window.location.href='data-pindah.php';">Batal</button>
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