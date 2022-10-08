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
                <a href="<?= base_url('data-kegiatan') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-kegiatan/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('kode_kegiatan')) ? 'has-error' : ''; ?>">
                                <label>Kode Kegiatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kode_kegiatan" autocomplete="off" value="<?= (old('kode_kegiatan')) ? old('kode_kegiatan') : $data['kode_kegiatan']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kode_kegiatan'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('nama_kegiatan')) ? 'has-error' : ''; ?>">
                                <label>Nama Kegiatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_kegiatan" autocomplete="off" value="<?= (old('nama_kegiatan')) ? old('nama_kegiatan') : $data['nama_kegiatan']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nama_kegiatan'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                        <a href="<?= base_url('data-kegiatan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>