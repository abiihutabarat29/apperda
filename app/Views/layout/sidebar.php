<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar <?= session()->get('status') == 1 ? 'avatar-online' : 'avatar-offline' ?>">
                    <?php if (session()->get('foto') == null) { ?>
                        <img src="<?= base_url('/media/fotouser/' . 'blank.png') ?>" alt="image profile" class="avatar-img rounded-circle">
                    <?php } else { ?>
                        <img src="<?= base_url('/media/fotouser/' . session()->get('foto')) ?>" alt="image profile" class="avatar-img rounded-circle">
                    <?php } ?>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= session()->get('nama'); ?>
                            <span class="user-level">
                                <?php if (session()->get('level') == '1') {
                                    echo "Admin Setwan";
                                } elseif (session()->get('level') == '2') {
                                    echo "Admin OPD";
                                } elseif (session()->get('level') == '3') {
                                    echo "Admin Hukum";
                                } elseif (session()->get('level') == '4') {
                                    echo "Admin Bapemperda";
                                }
                                ?>
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="<?= base_url('my-profil') ?>">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <!-- Service uri -->
                <?php $request = \Config\Services::request(); ?>
                <!-- =========== -->
                <li class="nav-item <?= ($request->uri->getSegment(1) == 'home') ? 'active' : ""; ?>">
                    <a href="<?= base_url('/home') ?>">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <?php if (session()->get('level') == '1') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'verifikasi-perda') ? 'active' : ""; ?>">
                        <a href="<?= base_url('verifikasi-perda') ?>">
                            <i class="fas fa-clipboard-check"></i>
                            <p>VERIFIKASI PERDA</p>
                        </a>
                    </li>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'data-user' or
                                            $request->uri->getSegment(1) == 'data-instansi') ? 'active' : ""; ?>">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Master Data</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?= base_url('data-user') ?>">
                                        <span class="sub-item">User</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-instansi') ?>">
                                        <span class="sub-item">Instansi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
                <?php if (session()->get('level') == '1') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'slideshow' or
                                            $request->uri->getSegment(1) == 'data-anggota') ? 'active' : ""; ?>">
                        <a data-toggle="collapse" href="#setting">
                            <i class="fa fa-cog"></i>
                            <p>App Setting</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="setting">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="<?= base_url('slideshow') ?>">
                                        <span class="sub-item">Slideshow</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('data-anggota') ?>">
                                        <span class="sub-item">Keangotaan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
                <?php if (session()->get('level') == '2') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'perda') ? 'active' : ""; ?>">
                        <a href="<?= base_url('perda') ?>">
                            <i class="fas fa-copy"></i>
                            <p>PERDA</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if (session()->get('level') == '3') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'pengajuan-perda') ? 'active' : ""; ?>">
                        <a href="<?= base_url('pengajuan-perda') ?>">
                            <i class="fas fa-copy"></i>
                            <p>PENGAJUAN PERDA</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if (session()->get('level') == '4') { ?>
                    <li class="nav-item <?= ($request->uri->getSegment(1) == 'perda-terverifikasi') ? 'active' : ""; ?>">
                        <a href="<?= base_url('perda-terverifikasi') ?>">
                            <i class="fas fa-copy"></i>
                            <p>PERDA TERVERIFIKASI</p>
                        </a>
                    </li>
                <?php } ?>
                <hr>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<div class="main-panel">
    <div class="content">
        <!-- Mulai isi content -->