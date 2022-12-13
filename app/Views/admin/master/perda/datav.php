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
                                    <th style="width: 10%">
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
                                        <td><?= $r['jenis_perda']; ?></td>
                                        <td>
                                            <?php if ($r['status'] == 1) { ?>
                                                <center>
                                                    <span class="badge badge-warning">menunggu verifikasi</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 2) { ?>
                                                <center>
                                                    <span class="badge badge-warning">menunggu verifikasi ketua setwan</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 3) { ?>
                                                <center>
                                                    <span class="badge badge-warning">menunggu verifikasi ketua bapemperda</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 4) { ?>
                                                <center>
                                                    <span class="badge badge-success">diterima</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 5) { ?>
                                                <center>
                                                    <span class="badge badge-danger">ditolak</span>
                                                </center>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="form-button-action">
                                                    <?php if ($r['status'] == 1) { ?>
                                                        <a href="<?= base_url('admin/verifikasi-perda/verifikasi/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fas fa-check-double"></i>&nbsp;&nbsp;Verifikasi
                                                        </a>
                                                    <?php } elseif ($r['status'] == 2) { ?>
                                                        <center>
                                                            <span class="badge badge-info">menunggu verifikasi ketua setwan</span>
                                                        </center>
                                                    <?php } elseif ($r['status'] == 3) { ?>
                                                        <center>
                                                            <span class="badge badge-info">menunggu verifikasi ketua bapemperda</span>
                                                        </center>
                                                    <?php } elseif ($r['status'] == 4) { ?>
                                                        <?php if ($r['tgl_banmus'] != null) { ?>
                                                            <a href="<?= base_url('admin/data-file/file/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                                <i class="fas fa-file"></i>&nbsp;&nbsp;Arsip Data
                                                            </a>
                                                        <?php } else { ?>
                                                            <center>
                                                                <span class="badge badge-info">menunggu jadwal banmus</span>
                                                            </center>
                                                        <?php } ?>
                                                    <?php } elseif ($r['status'] == 5) { ?>
                                                        <center>
                                                            <span><i>no action</i></span>
                                                        </center>
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