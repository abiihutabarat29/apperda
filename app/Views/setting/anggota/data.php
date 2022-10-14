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
        </ul>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Daftar Anggota</h4>
                    <a href="<?= base_url('data-anggota/add') ?>" class="btn btn-primary btn-round ml-auto btn-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Fraksi</th>
                                <th>Jabatan</th>
                                <th>Foto</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1;
                            foreach ($anggota as $key => $a) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $a['nama']; ?></td>
                                    <td><?= $a['fraksi']; ?></td>
                                    <td><?= $a['jabatan']; ?></td>
                                    <td><?php if ($a['foto'] == null) { ?>
                                            <img src="<?= base_url('/media/fotoanggota/' . 'blank.png') ?>" width="50px" class="img rounded">
                                        <?php } else { ?>
                                            <img src="<?= base_url('/media/fotoanggota/' . $a['foto']) ?>" width="50px" class="img rounded">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="/data-anggota/edit/<?= $a['id']; ?>" class="btn btn-link btn-primary btn-lg" title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-link btn-lg btn-danger" title="Hapus Data" data-toggle='modal' data-target='#activateModal<?= $a['id'] ?>'>
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

<!-- Modal -->
<?php foreach ($anggota as $key => $a) { ?>
    <form action="<?= base_url('data-anggota/' . $a['id']); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="activateModal<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apa kamu yakin ingin menghapus data <span class="text-danger"></span> ini secara permanen ???
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