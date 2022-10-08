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
                <h4 class="card-title">SPJ SPPD</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                    <li class="nav-item submenu">
                        <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Belum Verifikasi</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sudah Verifikasi</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link" id="pills-tolak-tab" data-toggle="pill" href="#pills-tolak" role="tab" aria-controls="pills-tolak" aria-selected="false">Verifikasi Ditolak</a>
                    </li>
                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive">
                            <table id="add-row-one" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Bagian</th>
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
                                    foreach ($databv as $key => $r) :
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['bagian']; ?></td>
                                            <td><?= $r['kode_kegiatan']; ?></td>
                                            <td><?= $r['nama_kegiatan']; ?></td>
                                            <td><?= $r['status'] == 2 ? '<span class="badge badge-warning">menunggu verifikasi</span></center>' : ''; ?></td>
                                            <td>
                                                <center>
                                                    <div class="form-button-action">
                                                        <a href="/data-spjkegiatan/verifikasi/<?= $r['id']; ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fas fa-check"></i>&nbsp;&nbsp;Verifikasi
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
                    <div class="tab-pane fade active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="table-responsive">
                            <table id="add-row-two" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Bagian</th>
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
                                    foreach ($datasv as $key => $r) :
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['bagian']; ?></td>
                                            <td><?= $r['kode_kegiatan']; ?></td>
                                            <td><?= $r['nama_kegiatan']; ?></td>
                                            <td><?= $r['status'] == 3 ? '<span class="badge badge-success">terverifikasi</span></center>' : ''; ?></td>
                                            <td>
                                                <center>
                                                    <div class="form-button-action">
                                                        <a href="/data-spjkegiatan/review/<?= $r['id']; ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fas fa-eye"></i>&nbsp;&nbsp;Review
                                                        </a>
                                                        <a href="/data-spjkegiatan/export-excel/<?= $r['id']; ?>" class="btn btn-dark btn-xs mr-2">
                                                            <i class="fas fa-file-excel"></i>&nbsp;&nbsp;Export Excel
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
                    <div class="tab-pane fade active" id="pills-tolak" role="tabpanel" aria-labelledby="pills-tolak-tab">
                        <div class="table-responsive">
                            <table id="add-row-three" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Bagian</th>
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
                                    foreach ($datavt as $key => $r) :
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $r['bagian']; ?></td>
                                            <td><?= $r['kode_kegiatan']; ?></td>
                                            <td><?= $r['nama_kegiatan']; ?></td>
                                            <td><?= $r['status'] == 4 ? '<span class="badge badge-danger">ditolak</span></center>' : ''; ?></td>
                                            <td>
                                                <center>
                                                    <div class="form-button-action">
                                                        <a href="/data-spjkegiatan/review/<?= $r['id']; ?>" class="btn btn-info btn-xs mr-2">
                                                            <i class="fas fa-eye"></i>&nbsp;&nbsp;Review
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
</div>
</div>