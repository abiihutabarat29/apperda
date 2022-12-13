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
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header">
                            <div class="card-title fw-mediumbold"><?= $data['judul_perda']; ?></div>
                        </div>
                        <div class="card-body">
                            <div class="card-list">
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Penyampaian Nota</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pandangan Fraksi atas nota Ranperda</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Jawaban Bupati atas pandangan Fraksi</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pembahasan Ranperda</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pansus / Bapemperda</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Hasil Pembahasan Ranperda</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Laporan Pembahasan Ranperda</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Pendapat Akhir Fraksi</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="icon-big text-center">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="info-user ml-3">
                                        <h6 class="text-uppercase fw-bold mb-1">Penandatangan Persetujuan Bersama</h6>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <div class="card-title fw-mediumbold">Syarat & Ketentuan</div>
                        </div>
                        <div class="card-body">
                            <div class="card-list">
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <span class="text-muted">1. Ekstensi File yang diupload wajib pdf.</span>
                                    </div>
                                    <button class="btn btn-icon btn-success btn-round btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                                <div class="item-list">
                                    <div class="info-user ml-3">
                                        <span class="text-muted">2. Ukuran File yang diupload maksimal 5MB.</span>
                                    </div>
                                    <button class="btn btn-icon btn-success btn-round btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a href="<?= base_url('admin/verifikasi-perda') ?>" class="btn btn-dark btn-sm"><i class="fas fa-undo-alt"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>