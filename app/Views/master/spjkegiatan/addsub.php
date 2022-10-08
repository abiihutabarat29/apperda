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
                <a href="<?= base_url('kegiatan/sub-kegiatan/' . $kegiatan['id']) ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= $title ?> <span class="badge badge-info btn-sm">
                        <?= $kegiatan['nama_kegiatan']; ?></span></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $title ?></div>
                </div>
                <form action="<?= base_url('kegiatan/save-sub-kegiatan/' . $kegiatan['id']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="idkegiatan" value="<?= $kegiatan['id']; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group <?= ($validation->hasError('idsub')) ? 'has-error' : ''; ?>">
                                        <label>Pilih Sub Kegiatan<span class="text-danger">*</span></label>
                                        <select name="idsub" id="id-sub" class="js-example-language" style="width: 100%">
                                            <option selected disabled><?= (old('idsub')) ? old('idsub') : ".::Pilih Sub Kegiatan::." ?></option>
                                            <?php foreach ($subkegiatan as $r) : ?>
                                                <option value="<?= $r['id'] ?>"><?= $r['nama_sub'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('idsub'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kode Sub Kegiatan</label>
                                        <input type="text" class="form-control" id="kodesubkeg" name="kodesubkeg" value="<?= old('kodesubkeg'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub Kegiatan</label>
                                        <input type="text" class="form-control" id="namasubkeg" name="namasubkeg" value="<?= old('namasubkeg'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="card-title fw-mediumbold">Syarat & Ketentuan</div>
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
                                            <span class="text-muted">2. Pilih/Cari Sub Kegiatan untuk mendapatkan data kode sub kegiatan & nama sub kegiatan otomatis.</span>
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
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('kegiatan/sub-kegiatan/' . $kegiatan['id']) ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>