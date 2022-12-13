<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div class="page-header">
                <h4 class="page-title text-white"><?= $title ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header">
                            <div class="card-title fw-mediumbold"><?= $data['judul_perda']; ?></div>
                        </div>
                        <div class="card-body">
                            <div class="card-list">
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Penyampaian Nota</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file1'); ?></small>
                                    </div>
                                    <?php if ($data['nota'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Penyampaian Nota" data-toggle='modal' data-target='#activateModalF1<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pandangan Fraksi atas nota Ranperda</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file2'); ?></small>
                                    </div>
                                    <?php if ($data['pdg_nota'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Pandangan Fraksi atas nota Ranperda" data-toggle='modal' data-target='#activateModalF2<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Jawaban Bupati atas pandangan Fraksi</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file3'); ?></small>
                                    </div>
                                    <?php if ($data['jwb_bupati'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Jawaban Bupati atas pandangan Fraksi" data-toggle='modal' data-target='#activateModalF3<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pembahasan Ranperda</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file4'); ?></small>
                                    </div>
                                    <?php if ($data['pbhs_ranperda'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Pembahasan Ranperda" data-toggle='modal' data-target='#activateModalF4<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pansus / Bapemperda</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file5'); ?></small>
                                    </div>
                                    <?php if ($data['pansus_bapemperda'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Pansus / Bapemperda" data-toggle='modal' data-target='#activateModalF5<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Hasil Pembahasan Ranperda</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file6'); ?></small>
                                    </div>
                                    <?php if ($data['hsl_pembahasan'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Hasil Pembahasan Ranperda" data-toggle='modal' data-target='#activateModalF6<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Laporan Pembahasan Ranperda</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file7'); ?></small>
                                    </div>
                                    <?php if ($data['lap_pembahasan'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Laporan Pembahasan Ranperda" data-toggle='modal' data-target='#activateModalF7<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pendapat Akhir Fraksi</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file8'); ?></small>
                                    </div>
                                    <?php if ($data['pendapat_fraksi'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Pendapat Akhir Fraksi" data-toggle='modal' data-target='#activateModalF8<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Penandatangan Persetujuan Bersama</h6>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('file9'); ?></small>
                                    </div>
                                    <?php if ($data['penandatangan'] != null) { ?>
                                        <button class="btn btn-icon btn-success btn-round btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button href="#" class="btn btn-icon btn-danger btn-round btn-xs" title="Penandatangan Persetujuan Bersama" data-toggle='modal' data-target='#activateModalF9<?= $data['id'] ?>'>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <div class="card-title fw-mediumbold">Syarat & Ketentuan</div>
                        </div>
                        <div class="card-body">
                            <div class="card-list">
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <span class="text-muted">1. Ekstensi File yang diupload wajib pdf.</span>
                                    </div>
                                    <button class="btn btn-icon btn-success btn-round btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <span class="text-muted">2. Ukuran File yang diupload maksimal 5MB.</span>
                                    </div>
                                    <button class="btn btn-icon btn-success btn-round btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('admin/verifikasi-perda') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal File Penyampaian Nota -->
<form action="<?= base_url('admin/data-file/up1/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF1<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Penyampaian Nota</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file1" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Pandangan Nota -->
<form action="<?= base_url('admin/data-file/up2/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF2<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pandangan Fraksi atas nota Ranperda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file2" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Jawaban Bupati -->
<form action="<?= base_url('admin/data-file/up3/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF3<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Jawaban Bupati</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file3" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Pembahasan Ranperda -->
<form action="<?= base_url('admin/data-file/up4/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF4<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pembahasan Ranperda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file4" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Pansus / Bapemperda -->
<form action="<?= base_url('admin/data-file/up5/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF5<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pansus / Bapemperda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file5" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Hasil Pembahasan Ranperda -->
<form action="<?= base_url('admin/data-file/up6/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF6<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Hasil Pembahasan Ranperda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file6" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Laporan Pembahasan Ranperda -->
<form action="<?= base_url('admin/data-file/up7/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF7<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Laporan Pembahasan Ranperda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file7" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Pendapat Akhir Fraksi -->
<form action="<?= base_url('admin/data-file/up8/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF8<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pendapat Akhir Fraksi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file8" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal File Penandatangan Persetujuan Bersama -->
<form action="<?= base_url('admin/data-file/up9/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalF9<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Penandatangan Persetujuan Bersama</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <input type="file" name="file9" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i>&nbsp;&nbsp;Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>