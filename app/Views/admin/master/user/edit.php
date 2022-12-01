<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('admin/home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/data-user') ?>"><?= $titlebar ?></a>
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
                <form action="<?= base_url('admin/data-user/update/' . $data['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('idinstansi')) ? 'has-error' : ''; ?>">
                                    <label>Pilih Instansi<span class="text-danger">*</span></label>
                                    <select name="idinstansi" id="idinstansi" class="js-example-language" style="width: 100%">
                                        <option selected disabled><?= (old('idinstansi')) ? old('idinstansi') : $data['instansi']; ?></option>
                                        <?php foreach ($instansi as $r) : ?>
                                            <option value="<?= $r['id'] ?>"><?= $r['instansi'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('idinstansi'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label>Nama Instansi<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="namainstansi" name="instansi" value="<?= (old('instansi')) ? old('instansi') : $data['instansi']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('nik')) ? 'has-error' : ''; ?>">
                                    <label>NIK<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nik" name="nik" autocomplete="off" value="<?= (old('nik')) ? old('nik') : $data['nik']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nik'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('nama')) ? 'has-error' : ''; ?>">
                                    <label>Nama<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= (old('nama')) ? old('nama') : $data['nama']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nama'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('nohp')) ? 'has-error' : ''; ?>">
                                    <label>Nomor Handphone<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nohp" name="nohp" autocomplete="off" value="<?= (old('nohp')) ? old('nohp') : $data['nohp']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('nohp'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('email')) ? 'has-error' : ''; ?>">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?= (old('email')) ? old('email') : $data['email']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('email'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('username')) ? 'has-error' : ''; ?>">
                                    <label>Username<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="<?= (old('username')) ? old('username') : $data['username']; ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('username'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('password')) ? 'has-error' : ''; ?>">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" value="<?= old('password'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('password'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= ($validation->hasError('repassword')) ? 'has-error' : ''; ?>">
                                    <label>Retype password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="repassword" name="repassword" autocomplete="off" value="<?= old('repassword'); ?>">
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('repassword'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group <?= ($validation->hasError('level')) ? 'has-error' : ''; ?>">
                                    <label>Level<span class="text-danger">*</span></label>
                                    <select name="level" class="form-control">
                                        <option value="<?= $data['level'] ?>" <?= $data['level'] == 2 ? 'selected' : ''; ?>>Admin OPD</option>
                                        <option value="<?= $data['level'] ?>" <?= $data['level'] == 3 ? 'selected' : ''; ?>>Admin Hukum</option>
                                        <option value="<?= $data['level'] ?>" <?= $data['level'] == 4 ? 'selected' : ''; ?>>Admin Bapemperda</option>
                                    </select>
                                    <small class="form-text text-danger">
                                        <?= $validation->getError('level'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="<?= base_url('admin/data-user') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>