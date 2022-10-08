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
            <div class="swal-error" data-swal="<?= session()->getFlashdata('me'); ?>"></div>
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">
                        <td><?= $title ?></td>
                    </h4>
                    <a href="<?= base_url('kegiatan/add') ?>" class="btn btn-primary btn-round ml-auto btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Kode Kegiatan</th>
                                <th style="width: 45%">Kegiatan</th>
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
                                    <td><?= $r['kode_kegiatan']; ?></td>
                                    <td><?= $r['nama_kegiatan']; ?></td>
                                    <td>
                                        <?php if ($r['status'] == 0) { ?>
                                            <center>
                                                <span class="badge badge-info">input sub kegiatan</span>
                                            </center>
                                        <?php } elseif ($r['status'] == 1) { ?>
                                            <center>
                                                <span class="badge badge-info">input file</span>
                                            </center>
                                        <?php } elseif ($r['status'] == 2) { ?>
                                            <center>
                                                <span class="badge badge-warning">menunggu verifikasi</span>
                                            </center>
                                        <?php } elseif ($r['status'] == 3) { ?>
                                            <center>
                                                <span class="badge badge-success">terverifikasi</span>
                                            </center>
                                        <?php } else { ?>
                                            <center>
                                                <span class="badge badge-danger">ditolak</span>
                                            </center>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="form-button-action">
                                                <?php if ($r['status'] == 0) { ?>
                                                    <a href="/kegiatan/sub-kegiatan/<?= $r['id']; ?>" class="btn btn-info btn-xs mr-2">
                                                        <i class="fas fa-plus"></i> Sub
                                                    </a>
                                                    <a href="/kegiatan/edit/<?= $r['id']; ?>" class="btn btn-primary btn-xs mr-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php } elseif ($r['status'] == 1) { ?>
                                                    <a href="/kegiatan/sub-kegiatan/<?= $r['id']; ?>" class="btn btn-info btn-xs mr-2">
                                                        <i class="fas fa-plus"></i> Sub
                                                    </a>
                                                    <a href="/kegiatan/file/<?= $r['id']; ?>" class="btn btn-warning btn-xs mr-2">
                                                        <i class="fa fa-plus"></i> File
                                                    </a>
                                                    <a href="/kegiatan/edit/<?= $r['id']; ?>" class="btn btn-primary btn-xs mr-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php } elseif ($r['status'] == 2) { ?>
                                                    <center>
                                                        <span class="badge badge-warning">menunggu verifikasi</span>
                                                    </center>
                                                <?php } elseif ($r['status'] == 3) { ?>
                                                    <a href="/kegiatan/sub-kegiatan/<?= $r['id']; ?>" class="btn btn-info btn-xs mr-2">
                                                        <i class="fas fa-file"></i> Sub
                                                    </a>
                                                    <a href="/kegiatan/file/<?= $r['id']; ?>" class="btn btn-warning btn-xs mr-2">
                                                        <i class="fa fa-file"></i> File
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="#" class="btn btn-info btn-xs" title="Alasan Admin" data-toggle='modal' data-target='#activateModalInfo<?= $r['id'] ?>'>
                                                        <i class="fas fa-comment-dots"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs ml-2" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
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
<!-- Modal -->
<?php foreach ($data as $r) { ?>
    <form action="<?= base_url('kegiatan/' . $r['id']); ?>" method="post">
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
                        Apa kamu yakin ingin menghapus data <span class="text-danger"><?= $r['nama_kegiatan']; ?></span> ini secara permanen ???
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
<!-- Modal Alasan-->
<?php foreach ($data as $r) { ?>
    <div class="modal fade" id="activateModalInfo<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alasan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="text-primary"><i class="fas fa-headset"></i>&nbsp;&nbsp;admin : </span><?= $r['alasan']; ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-sm" type="button" data-dismiss="modal"><i class="far fa-frown-open"></i>&nbsp;&nbsp;Oke, Terima kasih</button>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php } ?>