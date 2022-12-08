<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div class="page-header">
                <h4 class="page-title text-white"><?= $title ?></h4>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 20%">Instansi</th>
                                    <th style="width: 45%">Judul Perda</th>
                                    <th style="width: 15%">
                                        <center>
                                            Jenis Perda
                                        </center>
                                    </th>
                                    <th style="width: 10%">
                                        <center>
                                            Status
                                        </center>
                                    </th>
                                    <th style="width: 10%">
                                        <center>
                                            Action
                                        </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $key => $r) :
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $r['instansi']; ?></td>
                                        <td><?= $r['judul_perda']; ?></td>
                                        <td><?php if ($r['jenis_perda'] == null) { ?>
                                                <center>
                                                    <span class="badge badge-danger">belum terverifikasi</span>
                                                </center>
                                                <?php } else { ?><?= $r['jenis_perda']; ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($r['status'] == 0) { ?>
                                                <center>
                                                    <span class="badge badge-warning">menunggu verifikasi</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 1) { ?>
                                                <center>
                                                    <span class="badge badge-info">menunggu verifikasi admin setwan</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 2) { ?>
                                                <center>
                                                    <span class="badge badge-info">menunggu verifikasi ketua bapemperda</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 3) { ?>
                                                <center>
                                                    <span class="badge badge-success">diterima</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 4) { ?>
                                                <center>
                                                    <span class="badge badge-danger">ditolak</span>
                                                </center>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="form-button-action">
                                                    <?php if ($r['status'] == 0) { ?>
                                                        <a href="<?= base_url('admin/pengajuan-perda/verifikasi/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fa fa-check-double"></i>&nbsp;&nbsp;Verifikasi
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('admin/pengajuan-perda/review/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fas fa-book-reader"></i>&nbsp;&nbsp;Review
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>