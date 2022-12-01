<!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($slideshow as $key => $value) { ?>
            <div class="carousel-item active">
                <img src="<?= base_url() ?>/media/slideshow/<?= $value['gambar']; ?>" class="d-block w-100" alt="...">
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> -->

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <?php foreach ($slideshow as $key => $value) { ?>
                    <div class="carousel-item active" style="background-image: url(<?= base_url() ?>/media/slideshow/<?= $value['gambar']; ?>">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Selamat <span>Datang</span></h2>
                                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
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
</section><!-- End Hero -->


<main id="main">
    <!-- ======= Counts Section ======= -->
    <!-- <section class="counts section-bg">
        <div class="container">

            <div class="row no-gutters">

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Happy Clients</strong> consequuntur quae qui deca rode</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext"></i>
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Projects</strong> adipisci atque cum quia aut numquam delectus</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-headset"></i>
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Hours Of Support</strong> aut commodi quaerat. Aliquam ratione</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                    <div class="count-box">
                        <i class="bi bi-people"></i>
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                        <p><strong>Hard Workers</strong> rerum asperiores dolor molestiae doloribu</p>
                        <a href="#">Find out more &raquo;</a>
                    </div>
                </div>

            </div>

        </div>
    </section>-->
    <!-- ======= End Counts Section ======= -->

    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class="bg-color">
                <div class="row justify-content-evenly">
                    <div class="col-md-3 col-lg-3 mb-5 mb-lg-0">
                        <div class="icon-box text-center">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Propemperda</a></h4>
                            <h4 class="title"><a href="">0</a></h4>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3  mb-5 mb-lg-0">
                        <div class="icon-box text-center">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Non Propemperda</a></h4>
                            <h4 class="title"><a href="">0</a></h4>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="icon-box text-center">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <h4 class="title"><a href="">0</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="services" class="cta">
        <div class="container">
            <div class="text-center">
                <h3>Call To Action</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a class="cta-btn" href="#">Call To Action</a>
            </div>
        </div>
    </section>
    <!-- End Cta Section -->


    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
        <div class="container">

            <div class="section-title">
                <h2>Anggota</h2>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member">
                        <img src="/frontend/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member">
                        <img src="/frontend/assets/img/team/team-2.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member">
                        <img src="/frontend/assets/img/team/team-3.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="member">
                        <img src="/frontend/assets/img/team/team-4.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Our Team Section -->
</main><!-- End #main -->