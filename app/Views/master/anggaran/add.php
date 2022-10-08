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
                <a href="<?= base_url('data-anggaran') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-anggaran/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('idbagian')) ? 'has-error' : ''; ?>">
                                <label>Pilih Bagian<span class="text-danger">*</span></label>
                                <select name="idbagian" id="idbagian" class="js-example-language" style="width: 100%">
                                    <option selected disabled><?= (old('idbagian')) ? old('idbagian') : ".::Pilih Bagian::." ?></option>
                                    <?php foreach ($bagian as $r) : ?>
                                        <option value="<?= $r['id'] ?>"><?= $r['nama_bagian'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('idbagian'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Bagian<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="namabagian" name="bagian" value="<?= old('bagian'); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('anggaran')) ? 'has-error' : ''; ?>">
                                <label>Jumlah Anggaran<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="anggaran" name="anggaran" autocomplete="off" value="<?= old('anggaran'); ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('anggaran'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('tahun')) ? 'has-error' : ''; ?>">
                                <label>Tahun</label><span class="text-danger">*</span>
                                <select name="tahun" class="form-control">
                                    <option selected disabled><?= (old('tahun')) ? old('tahun') : ".::Pilih Tahun::." ?></option>
                                    <option value="<?= format_tahun(date('Y-m-d')); ?>"><?= format_tahun(date('Y-m-d')); ?></option>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('tahun'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('data-anggaran') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>