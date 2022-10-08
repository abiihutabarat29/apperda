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
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Rekening</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab" aria-controls="pills-detail" aria-selected="false">Detail Kegiatan</a>
                        </li>
                    </ul>
                    <form action="<?= base_url('kegiatan/save') ?>" method="post">
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
                                                <span class="text-muted">2. Pilih/Cari Kegiatan untuk mendapatkan data kode kegiatan & nama kegiatan otomatis.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">3. Pilih/Cari Rekening untuk mendapatkan data kode rekening,nama rekening, & kode rekening simda otomatis.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">4. Inputkan Uraian Kegiatan sesuai dengan Lampiran File yang akan di upload.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">5. Inputkan Nilai Kwitansi sesuai dengan Lampiran File yang akan di upload.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">6. Inputkan Nama & Alamat Penerima Pembayaran sesuai dengan Lampiran File yang akan di upload.</span>
                                            </div>
                                            <button class="btn btn-icon btn-success btn-round btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="info-user ml-3">
                                                <span class="text-muted">7. Nilai Kwitansi yang diinputkan harus lebih kecil dari sisa pagu anda sekarang.</span>
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
                                        <div class="form-group <?= ($validation->hasError('idkegiatan')) ? 'has-error' : ''; ?>">
                                            <label>Pilih Kegiatan<span class="text-danger">*</span></label>
                                            <select class="js-example-language" id="id-kegiatan" name="idkegiatan" style="width: 100%">
                                                <option selected disabled><?= (old('idkegiatan')) ? old('idkegiatan') : ".::Pilih Kegiatan::." ?></option>
                                                <?php foreach ($kegiatan as $r) : ?>
                                                    <option value="<?= $r['id'] ?>"><?= $r['nama_kegiatan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('idkegiatan'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode Kegiatan</label>
                                            <input type="text" class="form-control" id="kodekegiatan" name="kodekeg" value="<?= old('kodekeg'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" class="form-control" id="namakegiatan" name="namakeg" value="<?= old('namakeg'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('idrekening')) ? 'has-error' : ''; ?>">
                                            <label>Pilih Rekening<span class="text-danger">*</span></label>
                                            <select name="idrekening" id="koderek" class="js-example-language" style="width: 100%">
                                                <option selected disabled><?= (old('idrekening')) ? old('idrekening') : ".::Pilih Rekening::." ?></option>
                                                <?php foreach ($rekening as $r) : ?>
                                                    <option value="<?= $r['id'] ?>"><?= $r['kode_rek'] ?> - <?= $r['nama_rek'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('idrekening'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode Rekening</label>
                                            <input type="text" class="form-control" id="koderekening" name="koderekening" value="<?= old('koderekening'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Rekening</label>
                                            <input type="text" class="form-control" id="namarek" name="namarek" value="<?= old('namarek'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode Rekening Simda</label>
                                            <input type="text" class="form-control" id="reksimda" name="reksimda" value="<?= old('reksimda'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('uraian')) ? 'has-error' : ''; ?>">
                                            <label>Uraian Kegiatan<span class="text-danger">*</span></label>
                                            <textarea type="text" name="uraian" class="form-control" autocomplete="off"><?= old('uraian'); ?></textarea>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('uraian'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('nilai')) ? 'has-error' : ''; ?>">
                                            <label>Nilai Kwitansi<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nilai" autocomplete="off" value="<?= old('nilai'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('nilai'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('nmpenerima')) ? 'has-error' : ''; ?>">
                                            <label>Nama Rekanan/Penerima<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nmpenerima" autocomplete="off" value="<?= old('nmpenerima'); ?>">
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('nmpenerima'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-error' : ''; ?>">
                                            <label>Alamat Penerima<span class="text-danger">*</span></label>
                                            <textarea type="text" name="alamat" class="form-control" autocomplete="off"><?= old('alamat'); ?></textarea>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('alamat'); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="<?= base_url('kegiatan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
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