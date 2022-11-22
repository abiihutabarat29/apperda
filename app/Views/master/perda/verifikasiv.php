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
                            <a class="nav-link" id="pills-surat-tab-nobd" data-toggle="pill" href="#pills-surat-nobd" role="tab" aria-controls="pills-surat-nobd" aria-selected="false">Surat</a>
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
                                                    Dokumen Pendukung Lainnya
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
                        <div class="tab-pane fade" id="pills-surat-nobd" role="tabpanel" aria-labelledby="pills-surat-tab-nobd">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4><b>Surat Bupati</b></h4>
                                    <hr>
                                    <div class="table-responsive table-sales">
                                        <table class="table">
                                            <tr>
                                                <td style="width: 5%">
                                                    Surat Bupati
                                                </td>
                                                <td style="width: 0%">
                                                    :
                                                </td>
                                                <td style="width: 20%">
                                                    <a href="<?= base_url() ?>/media/surat/<?= $data['surat']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4><b>Konfirmasi Kelayakan Perda</b></h4>
                                    <hr>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group">
                                            <p><b>Jika data perda sudah layak untuk diteruskan ke ketua bappemperda, tekan teruskan.</b></p>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <a href="#" class="btn btn-success btn-sm" title="Teruskan" data-toggle='modal' data-target='#activateModalV<?= $data['id'] ?>'>
                                            <i class="fas fa-check-double"></i>&nbsp;&nbsp;Teruskan
                                        </a>
                                        <a href="<?= base_url('verifikasi-perda') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Verifikasi -->
<form action="<?= base_url('verifikasi-perda/verif/' . $data['id']); ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="modal fade" id="activateModalV<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Verifikasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah data Perda dari <span class="text-danger"><b><?= $data['instansi']; ?></b></span> sudah layak diteruskan ? <b>Konfirmasi</b> jika data sudah layak.
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check-double"></i>&nbsp;&nbsp;Konfirmasi</button>
                    <button class="btn btn-default btn-sm" type="button" data-dismiss="modal"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;Kembali</button>
                </div>
            </div>
        </div>
    </div>
</form>