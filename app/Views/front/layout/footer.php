<footer id="footer">
    <div class="footer-top">
        <div class="landing-single-bg">
            <div class="container">
                <?php foreach ($profil as $key => $r) { ?>
                    <div class="row">
                        <div class="col-lg-2">
                            <a href="<?= base_url('/') ?>">
                                <img src="<?= base_url('/media/icon/' . $r['icon']) ?>" class="mb-0 mt-2" alt="" width="120px">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 footer-info">
                            <h3><?= $r['nama_app'] ?></h3>
                            <h5><?= $r['deskripsi_app'] ?></h5>
                            <p>
                                <strong>Phone:</strong> <?= $r['nohp'] ?><br>
                                <strong>Email:</strong> <?= $r['email'] ?><br>
                                <strong>Alamat:</strong> <?= $r['alamat'] ?><br>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Sekretariat Dewan Kabupaten Batu Bara</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<script src="<?= base_url(); ?>/frontend/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url(); ?>/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url(); ?>/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url(); ?>/frontend/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?= base_url(); ?>/frontend/assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url(); ?>/frontend/assets/js/main.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script> -->

<!-- DataTables -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>