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
                <form action="<?= base_url('kegiatan/save-file/' . $kegiatan['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="idkegiatan" value="<?= $kegiatan['id']; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <label>Kwitansi<span class="text-danger">*</span></label>
                                    <div class="form-group form-group-default <?= ($validation->hasError('kwitansi')) ? 'has-error' : ''; ?>">
                                        <input type="file" name="kwitansi" class="form-control-file" accept=".pdf">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('kwitansi'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Berita Acara<span class="text-danger">*</span></label>
                                    <div class="form-group form-group-default <?= ($validation->hasError('berita_acara')) ? 'has-error' : ''; ?>">
                                        <input type="file" name="berita_acara" class="form-control-file" accept=".pdf">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('berita_acara'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Surat Perintah Tugas<span class="text-danger">*</span></label>
                                    <div class="form-group form-group-default <?= ($validation->hasError('pesanan_brg')) ? 'has-error' : ''; ?>">
                                        <input type="file" name="pesanan_brg" class="form-control-file" accept=".pdf">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('pesanan_brg'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Laporan Perjalanan Dinas<span class="text-danger">*</span></label>
                                    <div class="form-group form-group-default <?= ($validation->hasError('bon_faktur')) ? 'has-error' : ''; ?>">
                                        <input type="file" name="bon_faktur" class="form-control-file" accept=".pdf">
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('bon_faktur'); ?></small>
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
                                            <span class="text-muted">2. File yang diinput harus berupa file ber-ekstensi (.pdf) dan maksimal ukuran file sebesar 200kb.</span>
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
                        <a href="<?= base_url('kegiatan/file/' . $kegiatan['id']) ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>