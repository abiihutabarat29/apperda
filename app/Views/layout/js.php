<!--   Core JS Files   -->
<script src="<?= base_url(); ?>/template/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/core/popper.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Chart JS -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Notify -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- Sweet Alert -->
<script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url(); ?>/template/assets/js/plugin/sweetalert/sweetscript.js"></script>
<!-- Atlantis JS -->
<script src="<?= base_url(); ?>/template/assets/js/atlantis.min.js"></script>
<!-- Select 2 -->
<script src="<?= base_url(); ?>/vendor/select2/dist/js/select2.min.js"></script>
<!-- Select Picker -->
<script src="<?= base_url(); ?>/vendor/selectpicker/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
    (function($) {
        "use strict"
        //Proloader
        $(window).on('load', function() {
            $('#preloader-active').delay(450).fadeOut('slow');
            $('.wrapper').delay(450).css({
                'overflow': 'visible'
            });
        });
    })(jQuery);
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});

        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<br><select class="form-control"><option value="" selected disabled>::.Filter Kelas::.</option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });

    // api data instansi
    $('#idinstansi').on('change', (event) => {
        getInstansi(event.target.value).then(nminstansi => {
            $('#namainstansi').val(nminstansi.instansi);
        });
    });
    async function getInstansi(id) {
        let response = await fetch('/api/data-instansi/' + id)
        let data = await response.json();
        return data;
    }


    $(".js-example-language").select2({
        theme: "bootstrap-5",
    });

    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ':' + m + ':' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }
    async function getIdSub(id) {
        let response = await fetch('/api/data-sub-kegiatan/' + id)
        let data = await response.json();
        return data;
    }

    function previewImg() {
        const foto = document.querySelector('#foto');
        const img = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            img.src = e.target.result;
        }
    }

    function previewImg2() {
        const foto = document.querySelector('#foto-kep');
        const img = document.querySelector('.img-preview-kep');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            img.src = e.target.result;
        }
    }
</script>

<script>
    function readURL(input, id) {
        id = id || '#show';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id)
                    .attr('src', e.target.result)
                    .height(250)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>