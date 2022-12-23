<section id="jadwal" class="jadwal">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-4 bg-white rounded">
                        <div class="table-responsive">
                            <table id="example" style="width:100%" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Instansi</th>
                                        <th>Judul</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Jadwal Banmus</th>
                                        <th>
                                            <center>
                                                Status
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data as $key => $r) :
                                    ?>
                                        <tr>
                                            <td><?= $r['instansi'] ?></td>
                                            <td><?= $r['judul_perda'] ?></td>
                                            <td><?= $r['created_at'] ?></td>
                                            <td><?= $r['tgl_banmus'] ?></td>
                                            <td>
                                                <?php if ($r['status'] == 4 && $r['nota'] != null && $r['pdg_nota'] != null && $r['jwb_bupati'] != null && $r['pbhs_ranperda'] != null && $r['pansus_bapemperda'] != null && $r['hsl_pembahasan'] != null && $r['lap_pembahasan'] != null && $r['pendapat_fraksi'] != null && $r['penandatangan'] != null) { ?>
                                                    <center>
                                                        <span class="badge bg-success">selesai</span>
                                                    </center>
                                                <?php } else { ?>
                                                    <center>
                                                        <span class="badge bg-warning">sedang berlangsung</span>
                                                    </center>
                                                <?php } ?>
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
</section>