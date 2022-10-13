<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $title ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?= base_url('home') ?>">
                    <i class="flaticon-home"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">
                        <td><?= $title ?></td>
                    </h4>
                </div>
            </div>
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
                                    <td>
                                        <?php if ($r['status'] == 0) { ?>
                                            <center>
                                                <span class="badge badge-warning">menunggu verifikasi</span>
                                            </center>
                                        <?php } else { ?>
                                            <center>
                                                <span class="badge badge-success">terverifikasi</span>
                                            </center>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="form-button-action">
                                                <?php if ($r['status'] == 0) { ?>
                                                    <a href="<?= base_url('pengajuan-perda/verifikasi/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                        <i class="fa fa-check-double"></i>&nbsp;&nbsp;Verifikasi
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('pengajuan-perda/review/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
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
<!-- Modal -->
<?php foreach ($data as $r) { ?>
    <form action="<?= base_url('perda/' . $r['id']); ?>" method="post">
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