<?php
require '../session-start.php';
include '../profil.php';
require '../koneksi.php';


// Mendapatkan jumlah
$penduduk_query = "SELECT COUNT(*) as total FROM penduduk";
$penduduk_result = $koneksi->query($penduduk_query);

// Pastikan hasil query ditemukan
if ($penduduk_result->num_rows > 0) {
    $penduduk = $penduduk_result->fetch_assoc();
    $total_penduduk = $penduduk['total'];
} else {
    $total_penduduk = 0;
}


// Query untuk menghitung jumlah surat diproses
$sql = "SELECT 
    (SELECT COUNT(*) FROM domisili WHERE ket = 'diproses') +
    (SELECT COUNT(*) FROM pindah WHERE ket = 'diproses') +
    (SELECT COUNT(*) FROM sktm WHERE ket = 'diproses') +
    (SELECT COUNT(*) FROM usaha WHERE ket = 'diproses') +
    (SELECT COUNT(*) FROM md WHERE ket = 'diproses') AS total_diproses;
";

// Eksekusi query
$result = $koneksi->query($sql);

// Ambil hasil
$total_diproses = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_diproses = $row['total_diproses'];
}

// Query untuk menghitung jumlah surat ditolak
$sql = "SELECT 
    (SELECT COUNT(*) FROM domisili WHERE ket = 'ditolak') +
    (SELECT COUNT(*) FROM pindah WHERE ket = 'ditolak') +
    (SELECT COUNT(*) FROM sktm WHERE ket = 'ditolak') +
    (SELECT COUNT(*) FROM usaha WHERE ket = 'ditolak') +
    (SELECT COUNT(*) FROM md WHERE ket = 'ditolak') AS total_ditolak;
";

// Eksekusi query
$result = $koneksi->query($sql);

// Ambil hasil
$total_ditolak = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_ditolak = $row['total_ditolak'];
}

$sql = "SELECT 
    (SELECT COUNT(*) FROM domisili) +
    (SELECT COUNT(*) FROM pindah) +
    (SELECT COUNT(*) FROM sktm) +
    (SELECT COUNT(*) FROM usaha) +
    (SELECT COUNT(*) FROM md) AS total_surat;
    ";
// Eksekusi query
$result = $koneksi->query($sql);

// Ambil hasil
$total_surat = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_surat = $row['total_surat'];
}

// Query untuk menghitung jumlah surat ditolak
$sql = "SELECT 
    (SELECT COUNT(*) FROM domisili WHERE ket = 'selesai') +
    (SELECT COUNT(*) FROM pindah WHERE ket = 'selesai') +
    (SELECT COUNT(*) FROM sktm WHERE ket = 'selesai') +
    (SELECT COUNT(*) FROM usaha WHERE ket = 'selesai') +
    (SELECT COUNT(*) FROM md WHERE ket = 'selesai') AS total_selesai;
";

// Eksekusi query
$result = $koneksi->query($sql);

// Ambil hasil
$total_selesai = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_selesai = $row['total_selesai'];
}

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
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/cards-statistics.css" />
    <link rel="stylesheet" href="../assets/vendor/css/pages/cards-analytics.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!--<script src="../assets/vendor/js/template-customizer.js"></script>-->

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
                        <div class="row gy-4">
                            <!-- Halaman Konten -->

                            <!-- Total Warga -->
                            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <div class="avatar">
                                                <div class="avatar-initial bg-label-primary rounded">
                                                    <i class="mdi mdi-account-multiple mdi-24px"></i>
                                                </div>
                                            </div>
                                            <div class="ms-3 d-flex flex-column">
                                                <h6 class="mb-1 fw-semibold">Jumlah Warga</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <h6><?php echo ($total_penduduk); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Warga -->

                            <!-- Total Surat -->
                            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <div class="avatar">
                                                <div class="avatar-initial bg-label-primary rounded">
                                                    <i class="mdi mdi-email-multiple mdi-24px"></i>
                                                </div>
                                            </div>
                                            <div class="ms-3 d-flex flex-column">
                                                <h6 class="mb-1 fw-semibold">Jumlah Surat</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <h6><?php echo htmlspecialchars($total_surat); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Surat -->

                            <!-- Total Diproses -->
                            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <div class="avatar">
                                                <div class="avatar-initial bg-label-secondary rounded">
                                                    <i class="mdi mdi-email-check mdi-24px"></i>
                                                </div>
                                            </div>
                                            <div class="ms-3 d-flex flex-column">
                                                <h6 class="mb-1 fw-semibold">Surat Diproses</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <h6><?php echo $total_diproses; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Diproses -->

                            <!-- Total Ditolak -->
                            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <div class="avatar">
                                                <div class="avatar-initial bg-label-secondary rounded">
                                                    <i class="mdi mdi-email-remove mdi-24px"></i>
                                                </div>
                                            </div>
                                            <div class="ms-3 d-flex flex-column">
                                                <h6 class="mb-1 fw-semibold">Surat Ditolak</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <h6><?php echo $total_ditolak; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Ditolak -->

                            <!-- Total Selesai -->
                            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <div class="avatar">
                                                <div class="avatar-initial bg-label-secondary rounded">
                                                    <i class="mdi mdi-folder-check mdi-24px"></i>
                                                </div>
                                            </div>
                                            <div class="ms-3 d-flex flex-column">
                                                <h6 class="mb-1 fw-semibold">Surat Selesai</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <h6><?php echo $total_selesai; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Selesai -->
                        </div>

                        <!-- Gambar -->
                        <div class="col-12">
                            <div class="card mb-4 mt-4">
                                <img src="../assets/img/Kantor.jpg" alt="Kantor Desa Baluti" style="width: 100%; height: auto; border-radius: inherit;">
                            </div>
                        </div>

                        <!-- /Gambar -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div
                                    class="footer-container d-flex align-items-center justify-content-center py-3 flex-column">
                                    <div class="text-center">
                                        ©
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script><span class="text-primary"> Pelayanan Desa Baluti</span> | Design by Muhammad Alfian Hadi
                                    </div>
                                </div>
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
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
</body>

</html>