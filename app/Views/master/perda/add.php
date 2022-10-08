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
                <a href="<?= base_url('perda') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= $title ?></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Panduan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-file-tab" data-toggle="pill" href="#pills-file" role="tab" aria-controls="pills-file" aria-selected="false">File</a>
                        </li>
                    </ul>
                    <form action="<?= base_url('perda/save') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="card-body">
                                    <div class="card-title fw-mediumbold">Panduan Penginputan</div>
                                    <div class="card-list">
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">1. Field yang memiliki tanda (<span class="text-danger">*</span>) artinya wajib diinput atau tidak boleh kosong.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">2. Ekstensi File yang diupload wajib pdf.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">2. Ukuran File yang diupload maksimal 200KB.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('judul')) ? 'has-error' : ''; ?>">
                                            <label>Judul Perda<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="judul" autocomplete="off" value="<?= old('judul'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('judul'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('dasar')) ? 'has-error' : ''; ?>">
                                            <label>Dasar Hukum<span class="text-danger">*</span></label>
                                            <textarea type="text" name="dasar" class="form-control" rows="4" autocomplete="off"><?= old('dasar'); ?></textarea>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('dasar'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-file" role="tabpanel" aria-labelledby="pills-file-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <label>Draf Perda<span class="text-danger">*</span></label>
                                        <div class="form-group form-group-default <?= ($validation->hasError('draf')) ? 'has-error' : ''; ?>">
                                            <input type="file" name="draf" class="form-control-file" accept=".pdf">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('draf'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Naskah Akademik<span class="text-danger">*</span></label>
                                        <div class="form-group form-group-default <?= ($validation->hasError('naskah')) ? 'has-error' : ''; ?>">
                                            <input type="file" name="naskah" class="form-control-file" accept=".pdf">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('naskah'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Dokumen Lain<span class="text-danger">*</span></label>
                                        <div class="form-group form-group-default <?= ($validation->hasError('dokumen')) ? 'has-error' : ''; ?>">
                                            <input type="file" name="dokumen" class="form-control-file" accept=".pdf">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('dokumen'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="<?= base_url('perda') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>