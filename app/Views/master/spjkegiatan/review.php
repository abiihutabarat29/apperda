<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"><?= $titlebar ?></h4>
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
                <a href="<?= base_url('sppd') ?>"><?= $titlebar ?></a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">
                    <span class="badge badge-info btn-sm">
                        <?= $kegiatan['nama_kegiatan']; ?></span></a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><?= $kegiatan['bagian']; ?></div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-primary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                        <li class="nav-item submenu">
                            <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="false">Data Kegiatan & Sub Kegiatan</a>
                        </li>
                        <li class="nav-item submenu">
                            <a class="nav-link" id="pills-detail-tab-nobd" data-toggle="pill" href="#pills-detail-nobd" role="tab" aria-controls="pills-detail-nobd" aria-selected="false">Detail</a>
                        </li>
                        <li class="nav-item submenu">
                            <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">File Upload</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                        <div class="tab-pane fade active show" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <h4><b>Data Kegiatan</b></h4>
                                            <hr>
                                            <div class="table-responsive table-hover table-sales">
                                                <table class="table">
                                                    <tr>
                                                        <td style="width: 4%">
                                                            Kode Kegiatan
                                                        </td>
                                                        <td style="width: 0%">
                                                            :
                                                        </td>
                                                        <td style="width: 20%">
                                                            <?= $data['kode_kegiatan']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Kegiatan
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $data['nama_kegiatan']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Kode Rekening
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $data['kode_rek']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nama Rekening
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $data['nama_rek']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Kode Rekening Simda
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td>
                                                            <?= $data['kode_rek_simda']; ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <h4><b>Data Sub Kegiatan</b></h4>
                                            <hr>
                                            <div class="table-responsive table-hover table-sales">
                                                <table class="table">
                                                    <?php $i = 1;
                                                    foreach ($datasub as $key => $s) : ?>
                                                        <tr>
                                                            <td rowspan="2" style="width: 10%">
                                                                <span class="badge badge-primary btn-sm">
                                                                    <?= $i++; ?></span>
                                                            </td>
                                                            <td style="width: 20%">
                                                                Kode
                                                            </td>
                                                            <td style="width: 0%">
                                                                :
                                                            </td>
                                                            <td>
                                                                <?= $s['kode_sub']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Sub Kegiatan
                                                            </td>
                                                            <td>
                                                                :
                                                            </td>
                                                            <td>
                                                                <?= $s['nama_sub']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-detail-nobd" role="tabpanel" aria-labelledby="pills-detail-tab-nobd">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <h4><b>Detail</b></h4>
                                            <hr>
                                            <div class="table-responsive table-hover table-sales">
                                                <table class="table">
                                                    <tr>
                                                        <td style="width: 10%">
                                                            Uraian Kegiatan
                                                        </td>
                                                        <td style="width: 20%">
                                                            <?= $data['uraian'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nilai Kwitansi
                                                        </td>
                                                        <td>
                                                            <?= rupiah($data['nilai_kwitansi']) ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <h4><b>Penerima Pembayaran</b></h4>
                                            <hr>
                                            <div class="table-responsive table-hover table-sales">
                                                <table class="table">
                                                    <tr>
                                                        <td style="width: 10%">
                                                            Nama Rekanan
                                                        </td>
                                                        <td style="width: 20%">
                                                            <?= $data['nama_penerima'] ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alamat
                                                        </td>
                                                        <td>
                                                            <?= $data['alamat_penerima'] ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4><b>Data File</b></h4>
                                    <hr>
                                    <div class="table-responsive table-sales">
                                        <table class="table">
                                            <?php foreach ($datafile as $key => $f) : ?>
                                                <tr>
                                                    <td style="width: 4%">
                                                        Kwitansi
                                                    </td>
                                                    <td style="width: 20%">
                                                        <a href="<?= base_url() ?>/media/kwitansi/<?= $f['kwitansi']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Berita Acara
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>/media/berita-acara/<?= $f['berita_acara']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Pesanan Barang
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>/media/pesanan-barang/<?= $f['pesanan_brg']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Bon Faktur
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>/media/bon-faktur/<?= $f['bon_faktur']; ?>" target="blank"><button class="btn btn-info btn-xs"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="<?= base_url('data-spjkegiatan') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i>&nbsp;&nbsp;Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>