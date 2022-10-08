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
                <a href="<?= base_url('data-kode-rekening') ?>"><?= $titlebar ?></a>
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
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('data-kode-rekening/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('kode_rek')) ? 'has-error' : ''; ?>">
                                <label>Kode Rekening<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kode_rek" autocomplete="off" value="<?= (old('kode_rek')) ? old('kode_rek') : $data['kode_rek']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kode_rek'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('nama_rek')) ? 'has-error' : ''; ?>">
                                <label>Nama Rekening<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_rek" autocomplete="off" value="<?= (old('nama_rek')) ? old('nama_rek') : $data['nama_rek']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nama_rek'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('kode_rek_simda')) ? 'has-error' : ''; ?>">
                                <label>Kode Rekening Simda<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kode_rek_simda" autocomplete="off" value="<?= (old('kode_rek_simda')) ? old('kode_rek_simda') : $data['kode_rek_simda']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kode_rek_simda'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                        <a href="<?= base_url('data-kode-rekening') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>