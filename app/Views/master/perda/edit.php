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
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Kegiatan</a>
                        </li>
                    </ul>
                    <form action="<?= base_url('sppd/update/' . $data['id']); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="col-md-6">
                                        <div class="form-group <?= ($validation->hasError('idkegiatan')) ? 'has-error' : ''; ?>">
                                            <label>Pilih Kegiatan<span class="text-danger">*</span></label>
                                            <select class="js-example-language" id="id-kegiatan" name="idkegiatan" style="width: 100%">
                                                <?php foreach ($kegiatan as $r) : ?>
                                                    <option value="<?= $r['id'] ?>" <?= $data['id_kegiatan'] == $r['id'] ? 'selected' : ''; ?>><?= $r['nama_kegiatan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <small class="form-text text-danger">
                                                <?= $validation->getError('idkegiatan'); ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kode Kegiatan</label>
                                            <input type="text" class="form-control" id="kodekegiatan" name="kodekeg" value="<?= (old('kodekeg')) ? old('kodekeg') : $data['kode_kegiatan']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" class="form-control" id="namakegiatan" name="namakeg" value="<?= (old('namakeg')) ? old('namakeg') : $data['nama_kegiatan']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                                    <a href="<?= base_url('sppd') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
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