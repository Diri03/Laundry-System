<?php
    include "config/connection.php";
    session_start();

    if (isset($_POST['email'])){
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $query = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' AND password = '$password'");
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['NAME'] = $row['name'];
            $_SESSION['ID_USER'] = $row['id'];
            $_SESSION['ID_LEVEL'] = $row['id_level'];
            header("location:home.php");
        } else {
            header("location:index.php?login=error");
        }

    }

?>

<!doctype html>

<html
  lang="en"
  class="layout-wide customizer-hide"
  data-assets-path="assets/assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Halaman Login | Laundry System</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="assets/assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css -->

    <link rel="stylesheet" href="assets/assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="assets/assets/vendor/css/core.css" />
    <link rel="stylesheet" href="assets/assets/css/demo.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="assets/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config: Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file. -->

    <script src="assets/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="position-relative">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6 mx-4">
          <!-- Login -->
          <div class="card p-sm-7 p-2">
            <!-- Logo -->
            <div class="app-brand justify-content-center mt-5">
              <a href="index.php" class="app-brand-link gap-3">             
                <span class="app-brand-text demo text-heading fw-semibold">Laundry System</span>
              </a>
            </div>
            <!-- /Logo -->

            <div class="card-body mt-1">

              <form id="formAuthentication" class="mb-5" action="index.php" method="POST">
                <div class="form-floating form-floating-outline mb-5 form-control-validation">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus required/>
                  <label for="email">Email</label>
                </div>
                <div class="mb-5">
                  <div class="form-password-toggle form-control-validation">
                    <div class="input-group input-group-merge">
                      <div class="form-floating form-floating-outline">
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          aria-describedby="password" required />
                        <label for="password">Password</label>
                      </div>
                      <span class="input-group-text cursor-pointer"
                        ><i class="icon-base ri ri-eye-off-line icon-20px"></i
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="mb-5 pb-2 d-flex justify-content-between pt-2 align-items-center">
                  <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                  <a href="auth-forgot-password-basic.html" class="float-end mb-1">
                    <span>Forgot Password?</span>
                  </a>
                </div>
                <div class="mb-5">
                  <button class="btn btn-primary d-grid w-100" type="submit">login</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Login -->
          <img
            src="assets/assets/img/illustrations/tree-3.png"
            alt="auth-tree"
            class="authentication-image-object-left d-none d-lg-block" />
          <img
            src="assets/assets/img/illustrations/auth-basic-mask-light.png"
            class="authentication-image d-none d-lg-block scaleX-n1-rtl"
            height="172"
            alt="triangle-bg" />
          <img
            src="assets/assets/img/illustrations/tree.png"
            alt="auth-tree"
            class="authentication-image-object-right d-none d-lg-block" />
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->

    <script src="assets/assets/vendor/libs/jquery/jquery.js"></script>

    <script src="assets/assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/assets/vendor/js/bootstrap.js"></script>
    <script src="assets/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->

    <script src="assets/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async="async" defer="defer" src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
