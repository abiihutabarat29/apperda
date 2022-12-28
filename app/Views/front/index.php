<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <?php foreach ($slideshow as $key => $value) { ?>
                    <div class="carousel-item active" style="background-image: url(<?= base_url() ?>/media/slideshow/<?= $value['gambar']; ?>">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">SIPENBARA</span></h2>
                                <h2 class="animate__animated animate__fadeInDown"></h2>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</section>
<main id="main">
    <section id="services" class="services counts">
        <div class="container">
            <div class="bg-color">
                <div class="row justify-content-evenly">
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="icon-box count-box text-center">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title">Instansi</h4>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $instansi ?>" data-purecounter-duration="1" class="purecounter mb-3"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="icon-box count-box text-center">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title">Propemperda</a></h4>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $perdap ?>" data-purecounter-duration="1" class="purecounter mb-3"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="icon-box count-box text-center">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title">Non-Propemperda</h4>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $perdanp ?>" data-purecounter-duration="1" class="purecounter mb-3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="cta">
        <div class="container">
            <div class="text-center">
                <h3>JADWAL</h3>
                <p>Informasi Jadwal Rapat Paripurna</p>
                <a class="cta-btn" href="<?= base_url('jadwal') ?>">LIHAT</a>
            </div>
        </div>
    </section>
    <section id="team" class="team">
        <div class="container">
            <div class="section-title">
                <h2>Anggota</h2>
            </div>
            <div class="row slider">
                <?php foreach ($anggota as $key => $value) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="member">
                            <img src="<?= base_url() ?>/media/fotoanggota/<?= $value['foto']; ?>" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4><?= $value['nama'] ?></h4>
                                    <span>Anggota Bapemperda</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>