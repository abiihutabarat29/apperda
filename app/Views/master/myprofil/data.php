<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= $titlebar ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <?php if (!empty($data) && is_array($data)) : ?>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url('<?= base_url('media/profil/bg.jpg'); ?>')">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">
                                <?php if (session()->get('foto') == null) { ?>
                                    <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } else { ?>
                                    <img src="<?= base_url('/media/fotouser/' . $data['foto']) ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">
                            <div class="name"><?= $data['nama']; ?></div>
                            <div class="desc">NIK : <?= $data['nik']; ?></div>
                            <div class="desc"> <?php if (session()->get('level') == '1') {
                                                    echo "admin";
                                                } else {
                                                    echo "User Bagian";
                                                } ?></div>
                            <div class="view-profile">
                                <a href="#" class="btn btn-primary btn-block"><?= $data['status'] == 1 ? 'Aktif' : 'Nonaktif' ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card-list">
                                <?php if (session()->get('level') == '2') { ?>
                                    <div class="item-list">
                                        <div class="info-user ml-3">
                                            <h6 class="text-uppercase fw-bold mb-1">Bagian</h6>
                                            <span class="text-muted"><?= $data['nama_bagian']; ?></span>
                                        </div>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                <?php } ?>
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Username</h6>
                                        <span class="text-muted"><?= $data['username']; ?></span>
                                    </div>
                                    <button class="btn btn-icon btn-success btn-round btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Email</h6>
                                        <span class="text-muted"><?= $data['email']; ?></span>
                                    </div>
                                    <button class="btn btn-icon btn-success btn-round btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Nomor Handphone</h6>
                                        <span class="text-muted"><?= $data['nohp']; ?></span>
                                    </div>
                                    <button class="btn btn-icon btn-success btn-round btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="<?= base_url('my-profil/edit/' . $data['id']) ?>" class="btn btn-warning ml-auto btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('/home') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table>
                            <h2>
                                <center><i>Data tidak ditemukan . . .</i></center>
                            </h2>
                        </table>
                        <a href="<?= base_url('my-profil') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
</div>