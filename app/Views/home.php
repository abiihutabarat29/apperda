<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard <?= session()->get('nama_bagian'); ?>
                </h2>
                <h5 class="text-white op-7 mb-2">SISTEM INFORMASI PENATAUSAHAAN KEUANGAN BERBASIS ONLINE</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-secondary btn-round btn-sm mr-2 mb-2"><?= $gu['judul'] ?> aktif mulai <?= format_indo($gu['tgl_mulai']) ?> s/d <?= format_indo($gu['tgl_selesai']) ?></a>
                <!-- <span class='badge rounded-pill btn-info' id="berakhir"><i></i></span> -->
                <a href="#" class="btn btn-danger btn-round btn-sm mb-2" id="berakhir"></a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <?php if (session()->get('level') == '2') { ?>
        <div class="row row-card-no-pd">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="avatar avatar-lg">
                                <?php if (session()->get('foto') == null) { ?>
                                    <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } else { ?>
                                    <img src="<?= base_url('/media/fotouser/' . $data['foto']) ?>" alt="image profile" class="avatar-img rounded-circle">
                                <?php } ?>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category"><?= $data['nama']; ?></p>
                                    <p class="card-category"><?= $data['nama_bagian']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total SPJ SPPD</p>
                                    <h4 class="card-category"><?= $spjsppd ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-file text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total SPJ Kegiatan</p>
                                    <h4 class="card-category"><?= $spjkegiatan ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-credit-card-1 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Pagu</p>
                                    <?php if (!empty($anggaran) && is_array($anggaran)) : ?>
                                        <h4 class="card-category"><?= rupiah($anggaran['sisa_anggaran']); ?></h4>
                                    <?php else : ?>
                                        <h4 class="card-category text-danger"><?= rupiah(0) ?></h4>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row mt--2">
        <?php if (session()->get('level') == '1') { ?>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-school"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Bagian</p>
                                    <h4 class="card-title"><?= $bagian ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Account User</p>
                                    <h4 class="card-title"><?= $account ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total SPJ SPPD</p>
                                    <h4 class="card-title"><?= $spjsppdall ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total SPJ Kegiatan</p>
                                    <h4 class="card-title"><?= $spjkegiatanall ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
<!-- GU -->
<script>
    // Set the date we're counting down to
    var countDownDate4 = new Date("October 20, 2022 00:00:00").getTime();
    // Update the count down every 1 second
    var countdownfunction4 = setInterval(function() {
        // Get todays date and time
        var now = new Date("October 2, 2022 00:00:00").getTime();
        // Find the distance between now an the count down date
        var distance4 = countDownDate4 - now;
        // Time calculations for days, hours, minutes and seconds
        var days4 = Math.floor(distance4 / (1000 * 60 * 60 * 24));
        var hours4 = Math.floor(
            (distance4 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes4 = Math.floor((distance4 % (1000 * 60 * 60)) / (1000 * 60));
        var seconds4 = Math.floor((distance4 % (1000 * 60)) / 1000);
        // Output the result in an element with id="demo"
        document.getElementById("berakhir").innerHTML = "Berakhir dalam " +
            days4 + " hari " + hours4 + " jam " + minutes4 + " menit " + seconds4 + " detik " + "lagi...";
        // If the count down is over, write some text
        if (distance4 < 0) {
            clearInterval(countdownfunction4);
            document.getElementById("berakhir").innerHTML = "<span class='badge rounded-pill btn-info'><i>selesai</i></span>";
        }
    }, 1000);
</script>