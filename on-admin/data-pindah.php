<?php
require '../session-start.php';
include '../profil.php';
require '../koneksi.php';

$sql = "SELECT 
    p.nama,
    p.nik,
    p.ttl,
    p.jenis_kelamin,
    p.alamat,
    p.desa,
    p.kecamatan,
    p.kabupaten,
    n.*
FROM 
    pindah n
JOIN 
    penduduk p ON n.id_penduduk = p.id_penduduk";

$result = $koneksi->query($sql);

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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

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

    <!-- Page CSS -->

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
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data SKTM</h5>
                                <button class="btn btn-secondary" onclick="window.location.href='form-pindah.php'"><i class="mdi mdi-pen-plus me-1"></i>Buat Surat Pindah</button>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>TTL</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Desa</th>
                                            <th>Kecamatan</th>
                                            <th>Kabupaten</th>
                                            <th>Alamat Tujuan</th>
                                            <th>Desa Tujuan</th>
                                            <th>Kecamatan Tujuan</th>
                                            <th>Kabupaten Tujuan</th>
                                            <th>No. Surat</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if ($result->num_rows > 0) {
                                            $no = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $no++ . "</td>";
                                                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['nik']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['ttl']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['desa']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['kecamatan']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['kabupaten']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['alamat_tujuan']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['desa_tujuan']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['kecamatan_tujuan']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['kabupaten_tujuan']) . "</td>";
                                                echo "<td>" . (isset($row['no_surat']) ? htmlspecialchars($row['no_surat']) : '-') . "</td>";
                                                echo "<td>" . (isset($row['ket']) ? htmlspecialchars($row['ket']) : '-') . "</td>";
                                                echo "<td>
                                                    <a href='edit-pindah.php?id_pindah=" . $row['id_pindah'] . "' class='btn btn-primary mr-1'><i class='fa fa-pencil'></i></a>
                                                    <a href='hapus-pindah.php?id_pindah=" . $row['id_pindah'] . "' class='btn btn-danger mr-1 ' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='fa fa-trash'></i></a>
                                                    <a href='print-pindah.php?id_pindah=" . $row['id_pindah'] . "' class='btn btn-success mr-1' target='_blank' onclick='openPrint(this.href)'><i class='fa fa-print'></i></a>
                                                </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr>";
                                            echo "<td colspan='16' style='text-align: center;'>Tidak ada data ditemukan</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Responsive Table -->
                    </div>
                    <!-- / Content -->

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

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

</body>

</html>