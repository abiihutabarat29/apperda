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
                <a href="<?= base_url('kegiatan/sub-kegiatan/' . $data['id_kegiatan']) ?>"><?= $titlebar ?></a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><?= $title ?></div>
            </div>
            <form action="<?= base_url('kegiatan/update-sub-kegiatan/' . $data['id']) ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="idkegiatan" value="<?= $data['id_kegiatan']; ?>">
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group <?= ($validation->hasError('idsub')) ? 'has-error' : ''; ?>">
                                <label>Pilih Sub Kegiatan<span class="text-danger">*</span></label>
                                <select name="idsub" id="id-sub" class="js-example-language" style="width: 100%">
                                    <?php foreach ($subkegiatan as $r) : ?>
                                        <option value="<?= $r['id'] ?>" <?= $data['id_subkegiatan'] == $r['id'] ? 'selected' : ''; ?>><?= $r['nama_sub'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <small class="form-text text-danger">
                                    <?= $validation->getError('idsub'); ?></small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kode Sub Kegiatan</label>
                                <input type="text" class="form-control" id="kodesubkeg" name="kodesubkeg" value="<?= (old('kodesubkeg')) ? old('kodesubkeg') : $data['kode_sub']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sub Kegiatan</label>
                                <input type="text" class="form-control" id="namasubkeg" name="namasubkeg" value="<?= (old('namasubkeg')) ? old('namasubkeg') : $data['nama_sub']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                    <a href="<?= base_url('kegiatan/sub-kegiatan/' . $data['id_kegiatan']) ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>