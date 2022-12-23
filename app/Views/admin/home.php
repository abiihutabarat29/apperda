<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-12">
                <img src="<?= base_url("template/assets/img/icon-logo.png") ?>" class="mb-0" alt="" width="70px">
                <h2 class="text-white mb-1 fw-bold"><?= $title ?></h2>
                <h2 class="text-white mb-1 fw-bold"><?= session()->get('instansi'); ?></h2>
                <h5 class="text-white op-7 mb-2"><?= $appname ?></h5>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <?php if (session()->get('level') == '2') { ?>
        <div class="row row-card-no-pd">
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="avatar avatar-lg">
                                <?php if (session()->get('foto') == null) { ?>
                                    <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } else { ?>
                                    <img src="<?= base_url('/media/fotouser/' . $data['foto']) ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } ?>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category"><?= $data['nama']; ?></p>
                                    <p class="card-category"><?= $data['instansi']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Propemperda</p>
                                    <h4 class="card-category"><?= $perdapi ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Non-Propemperda</p>
                                    <h4 class="card-category"><?= $perdanpi ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (session()->get('level') == '3' or session()->get('level') == '4' or session()->get('level') == '5') { ?>
        <div class="row row-card-no-pd">
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="avatar avatar-lg">
                                <?php if (session()->get('foto') == null) { ?>
                                    <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } else { ?>
                                    <img src="<?= base_url('/media/fotouser/' . $data['foto']) ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } ?>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category"><?= $data['nama']; ?></p>
                                    <p class="card-category"><?= $data['instansi']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Propemperda</p>
                                    <h4 class="card-category"><?= $perdap ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Non-Propemperda</p>
                                    <h4 class="card-category"><?= $perdanp ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (session()->get('level') == '1') { ?>
        <div class="row mt--2">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-school"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Instansi</p>
                                    <h4 class="card-title"><?= $instansi ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Account User</p>
                                    <h4 class="card-title"><?= $user ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Propemperda</p>
                                    <h4 class="card-title"><?= $perdap ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Non-Propemperda</p>
                                    <h4 class="card-title"><?= $perdanp ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>