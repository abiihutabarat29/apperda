<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/vendor/css/pages/page-auth.css" />
    <script src="<?= base_url(); ?>/template/assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="swal-login" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                    <div class="swal-logout" data-swal="<?= session()->getFlashdata('ml'); ?>"></div>
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <img src="<?= base_url(); ?>/template/assets/img/icon-logo.png">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 text-center">Administrator Panel</h4>
                        <p class="mb-4 text-center">Silahkan Masukkan Username dan Password Anda </p>

                        <form id="formAuthentication" class="mb-3" action="/auth/verify" method="POST">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="Username" value="<?= old('username'); ?>" placeholder=" Enter username" required>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('username'); ?></small>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('password'); ?></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                        <!-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a> -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url(); ?>/template/assets/vendor/js/menu.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/main.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url(); ?>/template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetscript.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        window.setTimeout(function() {
            $(".form-text").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            })
        }, 3000);
    </script>

</body>

</html>