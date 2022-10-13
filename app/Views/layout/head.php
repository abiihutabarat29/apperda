<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PERDA</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?= base_url(); ?>/template/assets/img/icon-logo.png" type="image/x-icon" />
    <!-- Fonts and icons -->
    <script src="<?= base_url(); ?>/template/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Lato:300,400,700,900"]
            },
            custom: {
                families: [
                    "Flaticon",
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?= base_url(); ?>/template/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/atlantis.min.css" />
    <!-- Preloader -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/custom.css" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/demo.css" />
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/select2/dist/css/select2.min.css" />
    <!-- Select Picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/selectpicker/css/bootstrap-select.min.css" />
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                <a href="<?= base_url('home'); ?>" class="logo">
                    <img src="<?= base_url(); ?>/template/assets/img/perda.png" alt="navbar brand" class="navbar-brand" />
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more">
                    <i class="icon-options-vertical"></i>
                </button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
            <!--  Preloader Start -->
            <!-- <div id="preloader-active">
                <div class="preloader d-flex align-items-center justify-content-center">
                    <div class="preloader-inner relative">
                        <div class="preloader-circle"></div>
                        <div class="preloader-img pere-text">
                            <img src="<?= base_url("/template/assets/img/icon-logo.png") ?>" width="80px" alt="">
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Preloader End