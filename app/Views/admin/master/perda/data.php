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
                <div class="card-header">
                    <a href="<?= base_url('admin/perda/add') ?>" class="badge badge-primary btn-sm">
                        <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
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
                                                    <span class="badge badge-warning">menunggu verifikasi admin setwan</span>
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
                                                    <?php if ($r['status'] == 0) { ?>
                                                        <a href="<?= base_url('admin/perda/edit/' . $r['id']); ?>" class="btn btn-warning btn-xs mr-2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    <?php } elseif ($r['status'] == 1) { ?>
                                                        <a href="<?= base_url('admin/perda/review/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                    <?php } elseif ($r['status'] == 2) { ?>
                                                        <a href="<?= base_url('admin/perda/review/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                    <?php } elseif ($r['status'] == 3 || $r['status'] == 4) { ?>
                                                        <a href="<?= base_url('admin/perda/review/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                    <?php } elseif ($r['status'] == 4 || $r['status'] == 5) { ?>
                                                        <a href="<?= base_url('admin/perda/review/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                            <i class="fas fa-trash"></i>
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
<!-- Modal -->
<?php foreach ($data as $r) { ?>
    <form action="<?= base_url('admin/perda/' . $r['id']); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="activateModal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apa kamu yakin ingin menghapus <span class="text-danger"><?= $r['judul_perda']; ?></span> ini secara permanen ?
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary btn-sm">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>