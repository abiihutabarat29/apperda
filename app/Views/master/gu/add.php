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
                <a href="<?= base_url('data-gu') ?>"><?= $titlebar ?></a>
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
        <div class="col-md-6">
            <div class="card">
                <div class="swal-error" data-swal="<?= session()->getFlashdata('me'); ?>"></div>
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('data-gu/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('gu')) ? 'has-error' : ''; ?>">
                                <label>Judul<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="gu" autocomplete="off" value="<?= old('gu'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('gu'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('mulai')) ? 'has-error' : ''; ?>">
                                <label>Tanggal Mulai<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="mulai" autocomplete="off" value="<?= old('mulai'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('mulai'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('jmulai')) ? 'has-error' : ''; ?>">
                                <label>Jam Mulai<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="jmulai" autocomplete="off" value="<?= old('jmulai'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('jmulai'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('selesai')) ? 'has-error' : ''; ?>">
                                <label>Tanggal Selesai<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="selesai" autocomplete="off" value="<?= old('selesai'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('selesai'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('jselesai')) ? 'has-error' : ''; ?>">
                                <label>Jam Selesai<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="jselesai" autocomplete="off" value="<?= old('jselesai'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('jselesai'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('data-gu') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>