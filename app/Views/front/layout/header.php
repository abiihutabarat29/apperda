  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">
          <div class="logo">
              <!-- <h1 class="text-light"><a href="index.html"><span>Shuffle</span></a></h1> -->
              <!-- Uncomment below if you prefer to use an image logo -->
              <a href="<?= base_url('/') ?>">
                  <img src="/frontend/assets/img/web-logo.png">
              </a>
          </div>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a class="nav-link scrollto active" href="<?= base_url('/') ?>">Beranda</a></li>
                  <li><a class="nav-link scrollto" href="<?= base_url('jadwal') ?>">Jadwal</a></li>
                  <li><a class="nav-link scrollto" href="<?= base_url('site-admin') ?>">Login</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
      </div>
  </header>
  <!-- End Header -->