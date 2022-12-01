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
                    <a href="<?= base_url('data-anggota/add') ?>" class="badge badge-primary btn-sm">
                        <i class="fa fa-plus-circle"></i>&nbsp;Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th>Nama</th>
                                    <th style="width: 10%">Foto</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $key => $value) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><img src="<?= base_url('/media/fotoanggota/' . $value['foto']) ?>" width="100px" class="img rounded"></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="<?= base_url('data-anggota/edit/' . $value['id']); ?>" class="btn btn-primary btn-xs mr-2" title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-xs mr-2 btn-danger" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $value['id'] ?>'>
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
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
<?php foreach ($data as $key => $value) { ?>
    <form action="<?= base_url('data-anggota/' . $value['id']); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="activateModal<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apa kamu yakin ingin menghapus data <span class="text-danger"><?= $value['nama'] ?></span> ini secara permanen ???
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