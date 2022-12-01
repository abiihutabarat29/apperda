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
                                                    <span class="badge badge-success">diterima</span>
                                                </center>
                                            <?php } else { ?>
                                                <center>
                                                    <p>belum ada</p>
                                                </center>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="form-button-action">
                                                    <?php if ($r['status'] == 2) { ?>
                                                        <a href="<?= base_url('admin/perda-terverifikasi/verifikasi/' . $r['id']); ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fas fa-check-double"></i>&nbsp;&nbsp;Verifikasi
                                                        </a>
                                                    <?php } else { ?>
                                                        <center>
                                                            <a href="#" class="btn btn-info btn-xs mr-2">
                                                                <i class="fas fa-calendar"></i>&nbsp;&nbsp;Jadwal Banmus
                                                            </a>
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