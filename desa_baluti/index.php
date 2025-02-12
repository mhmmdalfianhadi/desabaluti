<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Escape untuk keamanan
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = $_POST['password'];

  $login = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username'");
  $cek = mysqli_num_rows($login);

  if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    // Verifikasi password yang diinput dengan hash di database
    if (password_verify($password, $data['password'])) {
      // Simpan id, username, dan level pengguna di session
      $_SESSION['id_pengguna'] = $data['id_pengguna'];
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['username'] = $username;
      $_SESSION['level'] = $data['level'];

      // Redirect berdasarkan level pengguna
      if ($data['level'] == "admin") {
        header("Location: on-admin/beranda.php");
      } else if ($data['level'] == "operator") {
        header("Location: operator/halaman_operator.php");
      } else if ($data['level'] == "pengguna") {
        header("Location: on-member/halaman_pengguna.php");
      } else {
        echo "<script>alert('Masuk tidak berhasil! Level pengguna tidak dikenal.'); window.location.href='index.php';</script>";
      }
      exit();
    } else {
      echo "<script>alert('Masuk tidak berhasil! Username atau password salah.'); window.location.href='index.php';</script>";
    }
  } else {
    echo "<script>alert('Masuk tidak berhasil! Username atau password salah.'); window.location.href='index.php';</script>";
  }
  mysqli_close($koneksi);
}
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Masuk - Desa Baluti</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/Logo Desa.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/fonts/materialdesignicons.css" />
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
  <!-- Menu waves for no-customizer fix -->
  <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
  <!-- Vendor -->
  <link rel="stylesheet" href="assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="assets/vendor/js/template-customizer.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>

  <style>
    /* Menghapus scroll pada seluruh halaman */
    html,
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      /* Tidak ada scroll */
      width: 100%;
      height: 100%;
    }

    h4 {
      text-align: center;
    }
  </style>
</head>

<body>
  <!-- Content -->

  <div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Login -->
        <div class="card p-2">
          <!-- Logo -->
          <div class="app-brand justify-content-center mt-5">
            <a href="index.php" class="app-brand-link gap-2">
              <img src="assets/img/Logo Desa.png" alt="Logo Desa" style="width: 70px; height: 70px;">
            </a>
          </div>
          <!-- /Logo -->

          <div class="card-body">
            <h4 class="mb-5 fw-semibold">MASUK</h4>

            <form id="formAuthentication" class="mb-3" method="POST">
              <div class="form-floating form-floating-outline mb-4">
                <input
                  type="username"
                  class="form-control"
                  name="username"
                  placeholder="Masukkan Username"
                  autofocus />
                <label for="email">Username</label>
              </div>
              <div class="mb-5">
                <div class="form-password-toggle">
                  <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                      <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Masukkan Password"
                        aria-describedby="password" />
                      <label for="password">Password</label>
                    </div>
                    <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                  </div>
                </div>
              </div>
              <div class="mb-5">
                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="assets/vendor/libs/node-waves/node-waves.js"></script>

  <script src="assets/vendor/libs/hammer/hammer.js"></script>
  <script src="assets/vendor/libs/i18n/i18n.js"></script>
  <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
  <script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>
</body>

</html>