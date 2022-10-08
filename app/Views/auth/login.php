<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/template/assets/login/images/logo.png" type="image/ico">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/login/css/style.css">

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="swal-login" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                    <div class="swal-logout" data-swal="<?= session()->getFlashdata('ml'); ?>"></div>
                    <div class="card-body">
                        <img src="<?= base_url(); ?>/template/assets/login/images/logo.png" alt="" class="img-fluid" width="100">
                        <form action="/auth/verify" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group mt-5 mb-4">
                                <label class="floating-label" for="Username">Username</label>
                                <input type="text" name="username" class="form-control" id="Username" value="<?= old('username'); ?>" required>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('username'); ?></small>
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" name="password" class="form-control" id="Password" autocomplete="off" required>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('password'); ?></small>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary mb-4">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><br>

        <center>
            <small class="text text-black"><b>SIPKAN</b></small>
        </center>
        <center>
            <small class="text text-black"><b>Versi 1.0</b></small>
        </center>
    </div>
</div>
<!-- [ auth-signin ] end -->
<!-- Required Js -->
<script src="<?= base_url(); ?>/template/assets/login/js/vendor-all.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/login/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/login/js/pcoded.min.js"></script>
<!-- Bootstrap Notify -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- Sweet Alert -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetscript.js"></script>
<!-- Atlantis JS -->
<script src="<?= base_url(); ?>/template/assets/js/atlantis.min.js"></script>
<script>
    window.setTimeout(function() {
        $(".form-text").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        })
    }, 3000);
</script>

</body>

</html>