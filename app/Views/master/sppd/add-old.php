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
                <a href="<?= base_url('sppd') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('sppd/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('idkegiatan')) ? 'has-error' : ''; ?>">
                                <label>Nama Kegiatan<span class="text-danger">*</span></label>
                                <select name="idkegiatan" id="kodekeg" class="js-example-language" style="width: 100%">
                                    <option selected disabled><?= (old('idkegiatan')) ? old('idkegiatan') : ".::Pilih Kegiatan::." ?></option>
                                    <?php foreach ($kegiatan as $r) : ?>
                                        <option value="<?= $r['id'] ?>"><?= $r['nama_kegiatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('idkegiatan'); ?></small>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="kodekegiatan" name="kodekeg">
                        <input type="hidden" class="form-control" id="namakegiatan" name="namakeg">
                        <div id="dynamic_field_append">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group <?= ($validation->hasError('namasub')) ? 'has-error' : ''; ?>">
                                            <label>Nama Sub Kegiatan<span class="text-danger">*</span></label>
                                            <select class="form-control subnama namasub" id="" name="namasub[]" style="width: 100%">
                                            </select>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('namasub'); ?></small>
                                        </div>
                                        <input type="text" class="form-control kodesubkeg" id="" name="kodesubkeg[]">
                                        <input type="text" class="form-control namasubkeg" id="" name="namasubkeg[]">
                                    </div>
                                    <div class="form-group">
                                        </br>
                                        <div class="col-md-4 mt-2">
                                            <button type="button" id="add_field" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Tambah Sub</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('koderek')) ? 'has-error' : ''; ?>">
                                <label>Nama Rekening<span class="text-danger">*</span></label>
                                <select name="koderek" id="koderek" class="js-example-language" style="width: 100%">
                                    <option selected disabled><?= (old('koderek')) ? old('koderek') : ".::Pilih Rekening::." ?></option>
                                    <?php foreach ($rekening as $r) : ?>
                                        <option value="<?= $r['id'] ?>"><?= $r['kode_rek'] ?> - <?= $r['nama_rek'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('koderek'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Rekening<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="namarek" name="namarek" value="<?= old('namarek'); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode Rekening Simda<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="reksimda" name="reksimda" value="<?= old('reksimda'); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('sppd') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>