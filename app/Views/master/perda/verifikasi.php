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
                <a href="<?= base_url('pengajuan-perda') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">
                    <span class="badge badge-info btn-sm">
                        <?= $data['judul_perda']; ?></span></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="swal-error" data-swal="<?= session()->getFlashdata('me'); ?>"></div>
                <div class="card-header">
                    <div class="card-title"><?= $data['instansi']; ?></div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-primary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                        <li class="nav-item submenu">
                            <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="false">Perda</a>
                        </li>
                        <li class="nav-item submenu">
                            <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">File Upload</a>
                        </li>
                        <li class="nav-item submenu">
                            <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd" aria-selected="true">Verifikasi</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                        <div class="tab-pane fade active show" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h4><b>Perda</b></h4>
                                    <hr>
                                    <div class="table-responsive table-hover table-sales">
                                        <table class="table">
                                            <tr>
                                                <td style="width: 4%">
                                                    Instansi
                                                </td>
                                                <td style="width: 0%">
                                                    :
                                                </td>
                                                <td style="width: 20%">
                                                    <?= $data['instansi']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Judul Perda
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <?= $data['judul_perda']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dasar Hukum
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td>
                                                    <?= $data['dasar_hukum']; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4><b>File</b></h4>
                                    <hr>
                                    <div class="table-responsive table-sales">
                                        <table class="table">
                                            <tr>
                                                <td style="width: 4%">
                                                    Draf Perda
                                                </td>
                                                <td style="width: 20%">
                                                    <a href="<?= base_url() ?>/media/draf-perda/<?= $data['draf_perda']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Naskah Akademik
                                                </td>
                                                <td>
                                                    <a href="<?= base_url() ?>/media/naskah-akademik/<?= $data['naskah_akademik']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dokumen Lainnya
                                                </td>
                                                <td>
                                                    <a href="<?= base_url() ?>/media/dokumen/<?= $data['dokumen']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                            <form action="<?= base_url('pengajuan-perda/verify/' . $data['id']) ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                                <div class="col-md-6 pr-0">
                                    <div class="form-group <?= ($validation->hasError('jenis')) ? 'has-error' : ''; ?>">
                                        <label>Tentukan Jenis Perda<span class="text-danger">*</span></label>
                                        <select name="jenis" class="form-control">
                                            <option selected disabled><?= (old('jenis')) ? old('jenis') : ".::Pilih Jenis::." ?></option>
                                            <option value="Propemperda">Propemperda</option>
                                            <option value="Non-Propemperda">Non-Propemperda</option>
                                        </select>
                                        <small class="form-text text-danger">
                                            <?= $validation->getError('jenis'); ?></small>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-check-double"></i>&nbsp;&nbsp;Verifikasi</button>
                                    <a href="<?= base_url('pengajuan-perda') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>