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
            <?php if (!empty($data) && is_array($data)) : ?>
                <div class="card">
                    <div class="swal" data-swal="<?= session()->getFlashdata('m'); ?>"></div>
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <a href="<?= base_url('admin/profil/edit/' . $data['id']) ?>" class="badge badge-warning btn-sm">
                                <i class="fa fa-edit"></i>&nbsp;Edit
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover table-sales">
                            <table class="table">
                                <tr>
                                    <td rowspan="6" style="width: 0%">
                                        <img src="<?= base_url('/media/icon/' . $data['icon']) ?>" width="150px" class="img rounded">
                                    </td>
                                    <td style="width: 4%">
                                        Nama Aplikasi
                                    </td>
                                    <td style="width: 0%">
                                        :
                                    </td>
                                    <td style="width: 20%">
                                        <?= $data['nama_app']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Link Aplikasi
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?= $data['link_app']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Deskripsi Aplikasi
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?= $data['deskripsi_app']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?= $data['alamat']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?= $data['email']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nomor Handphone
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?= $data['nohp']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php else : ?>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title"><?= $title ?></h4>
            </div>
        </div>
        <div class="card-body">
            <table>
                <h5>
                    <center>profil kosong . . .</center>
                    </h2>
            </table>
            <div class="d-flex align-items-center">
                <a href="<?= base_url('admin/profil/add') ?>" class="badge badge-primary btn-sm">
                    <i class="fa fa-plus"></i>&nbsp;Tambah
                </a>
            </div>
        </div>
    </div>
<?php endif ?>
</div>
</div>
</div>
</div>