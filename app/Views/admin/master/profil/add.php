<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('admin/home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/profil') ?>"><?= $titlebar ?></a>
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
                    <h4 class="card-title"><?= $titlebar ?></h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab" aria-controls="pills-detail" aria-selected="false">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-kontak-tab" data-toggle="pill" href="#pills-kontak" role="tab" aria-controls="pills-kontak" aria-selected="false">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-icon-tab" data-toggle="pill" href="#pills-icon" role="tab" aria-controls="pills-icon" aria-selected="false">Icon</a>
                        </li>
                    </ul>
                    <form action="<?= base_url('admin/profil/save') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('nmapp')) ? 'has-error' : ''; ?>">
                                            <label>Nama Aplikasi<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nmapp" autocomplete="off" value="<?= old('nmapp'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('nmapp'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('linkapp')) ? 'has-error' : ''; ?>">
                                            <label>Link Aplikasi<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="linkapp" autocomplete="off" value="<?= old('linkapp'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('linkapp'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('deskripsi')) ? 'has-error' : ''; ?>">
                                            <label>Deskripsi Aplikasi<span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" name="deskripsi" autocomplete="off"><?= old('deskripsi'); ?></textarea>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('deskripsi'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-kontak" role="tabpanel" aria-labelledby="pills-kontak-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                            <label>Alamat<span class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" name="alamat" autocomplete="off"><?= old('alamat'); ?></textarea>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('alamat'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="email" autocomplete="off" value="<?= old('email'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('email'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('telp')) ? 'has-error' : ''; ?>">
                                            <label>Nomor Handphone<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="telp" autocomplete="off" value="<?= old('telp'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('telp'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-icon" role="tabpanel" aria-labelledby="pills-icon-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <img src="<?= base_url('media/icon/' . 'blank.png') ?>" alt="image profile" class="img-thumbnail rounded img-preview">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="form-group form-group-default <?= ($validation->hasError('icon')) ? 'has-error' : ''; ?>">
                                                    <input type="file" name="icon" class="form-control-file" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                                    <small class="form-text text-danger">
                                                        <?= $validation->getError('icon'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                        <a href="<?= base_url('admin/profil') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                                    </div>
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