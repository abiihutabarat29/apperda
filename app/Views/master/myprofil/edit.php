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
                <a href="<?= base_url('my-profil') ?>"><?= $titlebar ?></a>
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
        <?php if (!empty($data) && is_array($data)) : ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $titlebar ?></h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-sekolah-tab" data-toggle="pill" href="#pills-sekolah" role="tab" aria-controls="pills-sekolah" aria-selected="true">Bagian</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-kontak-tab" data-toggle="pill" href="#pills-kontak" role="tab" aria-controls="pills-kontak" aria-selected="false">Kontak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profil-tab" data-toggle="pill" href="#pills-profil" role="tab" aria-controls="pills-profil" aria-selected="false">Profil</a>
                            </li>
                        </ul>
                        <form action="<?= base_url('my-profil/update/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-sekolah" role="tabpanel" aria-labelledby="pills-sekolah-tab">
                                    <div class="card-body">
                                        <?php if (session()->get('level') == '2') { ?>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group">
                                                    <label>Bagian</label>
                                                    <input type="text" class="form-control" id="nama_bagian" name="nama_bagian" value="<?= $data['nama_bagian']; ?>" readonly>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-kontak" role="tabpanel" aria-labelledby="pills-kontak-tab">
                                    <div class="card-body">
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
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profil" role="tabpanel" aria-labelledby="pills-profil-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group <?= ($validation->hasError('nik')) ? 'has-error' : ''; ?>">
                                                        <label>NIK<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nik" name="nik" autocomplete="off" value="<?= (old('nik')) ? old('nik') : $data['nik']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('nik'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 pr-0">
                                                    <div class="form-group <?= ($validation->hasError('nama')) ? 'has-error' : ''; ?>">
                                                        <label>Nama<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= (old('nama')) ? old('nama') : $data['nama']; ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('nama'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 pr-0">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group <?= ($validation->hasError('password')) ? 'has-error' : ''; ?>">
                                                        <label>Password<span class="text-danger">*</span></label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" value="<?= old('password'); ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('password'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group <?= ($validation->hasError('repassword')) ? 'has-error' : ''; ?>">
                                                        <label>Retype password<span class="text-danger">*</span></label>
                                                        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Retype Password" autocomplete="off" value="<?= old('repassword'); ?>">
                                                        <small class="form-text text-danger">
                                                            <?= $validation->getError('repassword'); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Foto</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img src="<?= base_url('media/fotouser/' . $data['foto']) ?>" alt="image profile" class="img-thumbnail rounded img-preview">
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <div class="form-group form-group-default <?= ($validation->hasError('foto')) ? 'has-error' : ''; ?>">
                                                            <input type="file" name="foto" class="form-control-file" id="foto" onchange="previewImg();" accept=".png, .jpg, .jpeg">
                                                            <small class="form-text text-danger">
                                                                <?= $validation->getError('foto'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                                        <a href="<?= base_url('my-profil') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title ?></div>
                    </div>
                    <div class="card-body">
                        <h2>
                            <center><i>Maaf, data ini tidak dapat ditampilkan . . .</i></center>
                        </h2>
                        <a href="<?= base_url('my-profil') ?>" class="btn btn-default ml-lg-1 btn-sm"><i class="fa fa-undo-alt"></i> Kembali</a>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
</div>