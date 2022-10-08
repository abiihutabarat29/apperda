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
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">
                        <td><?= $title ?></td>
                    </h4>
                    <?php
                    if ($kegiatan['status'] != 3) { ?>
                        <a href="<?= base_url('sppd/add-file/' . $kegiatan['id']) ?>" class="btn btn-primary btn-round ml-auto btn-sm">
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
                                <th style="width: 20%">
                                    <center>Kwitansi</center>
                                </th>
                                <th style="width: 20%">
                                    <center>Lumsum</center>
                                </th>
                                <th style="width: 20%">
                                    <center>SPT</center>
                                </th>
                                <th style="width: 20%">
                                    <center>Laporan Perjalanan</center>
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
                                    <td>
                                        <center>
                                            <a href="<?= base_url() ?>/media/kwitansi/<?= $r['kwitansi']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Kwitansi</button></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="<?= base_url() ?>/media/lumsum/<?= $r['lumsum']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Lumsum</button></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="<?= base_url() ?>/media/spt/<?= $r['spt']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Surat Perintah Tugas</button></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="<?= base_url() ?>/media/lpd/<?= $r['lpd']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Laporan Perjalanan Dinas</button></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="form-button-action">
                                                <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                    <i class="fas fa-trash"></i>
                                                </a>
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
    <form action="<?= base_url('sppd/file/' . $r['id']); ?>" method="post">
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
                        Apa kamu yakin ingin menghapus data <span class="text-danger">File</span> ini secara permanen ???
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