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
                <a href="<?= base_url('data-sub-kegiatan') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('data-sub-kegiatan/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('id_kegiatan')) ? 'has-error' : ''; ?>">
                                <label>Nama Kegiatan<span class="text-danger">*</span></label>
                                <select name="id_kegiatan" id="id-kegiatan" class="js-example-language" style="width: 100%">
                                    <option selected disabled><?= (old('id_kegiatan')) ? old('id_kegiatan') : $data['nama_kegiatan']; ?></option>
                                    <?php foreach ($kegiatan as $r) : ?>
                                        <option value="<?= $r['id'] ?>"><?= $r['nama_kegiatan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('id_kegiatan'); ?></small>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="kodekegiatan" name="kode_kegiatan" value="<?= $data['kode_kegiatan']; ?>">
                        <input type="hidden" class="form-control" id="namakegiatan" name="nama_kegiatan" value="<?= $data['nama_kegiatan']; ?>">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('kode_sub')) ? 'has-error' : ''; ?>">
                                <label>Kode Sub Kegiatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kode_sub" autocomplete="off" value="<?= (old('kode_sub')) ? old('kode_sub') : $data['kode_sub']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('kode_sub'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('nama_sub')) ? 'has-error' : ''; ?>">
                                <label>Nama Sub Kegiatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_sub" autocomplete="off" value="<?= (old('nama_sub')) ? old('nama_sub') : $data['nama_sub']; ?>">
                                <small class="form-text text-danger">
                                    <?= $validation->getError('nama_sub'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('idbagian')) ? 'has-error' : ''; ?>">
                                <label>Pilih Bagian<span class="text-danger">*</span></label>
                                <select name="idbagian" id="idbagian" class="js-example-language" style="width: 100%">
                                    <option selected disabled><?= (old('idbagian')) ? old('idbagian') : $data['bagian']; ?></option>
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
                                <input type="text" class="form-control" id="namabagian" name="bagian" value="<?= (old('bagian')) ? old('bagian') : $data['bagian']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                        <a href="<?= base_url('data-sub-kegiatan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>