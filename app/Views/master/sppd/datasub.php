<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $title ?></h4>
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
                <span class="badge badge-info btn-sm">
                    <?= $kegiatan['nama_kegiatan']; ?></span>
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
                    <?php
                    if ($kegiatan['status'] != 3) { ?>
                        <a href="<?= base_url('sppd/add-sub-kegiatan/' . $kegiatan['id']) ?>" class="btn btn-primary btn-round ml-auto btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="<?= base_url('sppd') ?>" class="btn btn-dark btn-round btn-sm ml-2">
                            <i class="fas fa-undo-alt"></i> Kembali
                        </a>
                    <?php } else { ?>
                        <a href="<?= base_url('sppd') ?>" class="btn btn-dark btn-round btn-sm ml-auto">
                            <i class="fas fa-undo-alt"></i> Kembali
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 10%">Kode Sub Kegiatan</th>
                                <th style="width: 40%">Sub Kegiatan</th>
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
                                    <td><?= $r['kode_sub']; ?></td>
                                    <td><?= $r['nama_sub']; ?></td>
                                    <td>
                                        <center>
                                            <div class="form-button-action">
                                                <?php if ($kegiatan['status'] == 1) { ?>
                                                    <a href="/sppd/edit-sub-kegiatan/<?= $r['id']; ?>" class="btn btn-primary btn-xs mr-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                <?php } else { ?>
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
<!-- Modal -->
<?php foreach ($data as $r) { ?>
    <form action="<?= base_url('sppd/sub-kegiatan/' . $r['id']); ?>" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="idkegiatan" value="<?= $r['id_kegiatan']; ?>">
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
                        Apa kamu yakin ingin menghapus data <span class="text-danger"><?= $r['nama_sub']; ?></span> ini secara permanen ???
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