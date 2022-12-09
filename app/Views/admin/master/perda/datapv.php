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
                                            <?php if ($r['status'] == 3) { ?>
                                                <center>
                                                    <span class="badge badge-warning">menunggu verifikasi</span>
                                                </center>
                                            <?php } elseif ($r['status'] == 4) { ?>
                                                <center>
                                                    <span class="badge badge-success">terverifikasi</span>
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
                                                    <?php if ($r['status'] == 3) { ?>
                                                        <a href="<?= base_url('admin/perda-terverifikasi/verifikasi/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fas fa-check-double"></i>&nbsp;&nbsp;Verifikasi
                                                        </a>
                                                    <?php } elseif ($r['status'] == 4) { ?>
                                                        <?php if ($r['tgl_banmus'] != null) { ?>
                                                            <center>
                                                                <span class="badge badge-success">terjadwal</span>
                                                            </center>
                                                        <?php } else { ?>
                                                            <center>
                                                                <a href="#" class="btn btn-info btn-xs mr-2" title="Jadwal" data-toggle='modal' data-target='#activateModalJadwal<?= $r['id'] ?>'>
                                                                    <i class="fas fa-calendar"></i>&nbsp;&nbsp;Jadwal Banmus
                                                                </a>
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
<!-- Modal Verifikasi -->
<form action="<?= base_url('admin/perda-terverifikasi/jadwal/' . $r['id']); ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $r['id']; ?>">
    <div class="modal fade" id="activateModalJadwal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jadwal Banmus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="date" class="form-control" name="jadwal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check-double"></i>&nbsp;&nbsp;Jadwalkan</button>
                    <button class="btn btn-default btn-sm" type="button" data-dismiss="modal"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;Kembali</button>
                </div>
            </div>
        </div>
    </div>
</form>