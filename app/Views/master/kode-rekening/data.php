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
                    <a href="<?= base_url('data-kode-rekening/add') ?>" class="btn btn-primary ml-auto btn-round btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                    <!-- <div class="input-group-append">
                        <button class="btn btn-warning btn-sm  dropdown-toggle ml-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-file-excel"></i> Import Excel</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle='modal' data-target='#modal-import-koderek'><i class="fas fa-upload"></i> Upload File</a>
                            <a class=" dropdown-item" href="<?= base_url() ?>/media/format/format-kode-rekening.xlsx" target="blank"><i class="fas fa-file-excel"></i> Download Example</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Kode Rekening</th>
                                <th>Nama Rekening</th>
                                <th>Kode Rek Simda</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data as $key => $r) :
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $r['kode_rek']; ?></td>
                                    <td><?= $r['nama_rek']; ?></td>
                                    <td><?= $r['kode_rek_simda']; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="/data-kode-rekening/edit/<?= $r['id']; ?>" class="btn btn-link btn-primary btn-lg">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-link btn-lg btn-danger" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $r['id'] ?>'>
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
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
    <form action="<?= base_url('data-kode-rekening/' . $r['id']); ?>" method="post">
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
                        Apa kamu yakin ingin menghapus data <span class="text-danger"><?= $r['nama_rek'] ?></span> ini secara permanen ???
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
<!-- Modal -->
<div class="modal fade" id="modal-import-koderek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Kode Rekening</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('kode-rekening/import') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>File Excel <span class="text-danger">*</span></label>
                        <div class="form-group form-group-default">
                            <input type="file" name="file_excel" class="form-control-file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default btn-sm" type="button" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Kembali</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Import</button>
                </div>
            </form>
        </div>
    </div>
</div>