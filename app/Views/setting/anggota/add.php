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
                <a href="<?= base_url('data-user') ?>"><?= $titlebar ?></a>
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
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('data-anggota/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('idfraksi')) ? 'has-error' : ''; ?>">
                                    <label>Pilih Fraksi<span class="text-danger">*</span></label>
                                    <select name="idfraksi" id="idfraksi" class="js-example-language " style="width: 100%">
                                        <option selected disabled><?= (old('idfraksi')) ? old('idfraksi') : ".::Pilih Fraksi::." ?></option>
                                        <?php foreach ($fraksi as $f) : ?>
                                            <option value="<?= $f['id'] ?>"><?= $f['fraksi'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('idfraksi'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label>Nama Fraksi<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="namafraksi" name="fraksi" value="<?= old('fraksi'); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('nama')) ? 'has-error' : ''; ?>">
                                    <label>Nama<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= old('nama'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nama'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('jabatan')) ? 'has-error' : ''; ?>">
                                    <label>Jabatan<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" autocomplete="off" value="<?= old('jabatan'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('jabatan'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('data-user') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>