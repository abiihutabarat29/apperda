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
            $('body').delay(450).css({
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
        // Add Row 1
        $('#add-row-one').DataTable({
            "pageLength": 10,
        });
        // Add Row 2
        $('#add-row-two').DataTable({
            "pageLength": 10,
        });
        // Add Row 3
        $('#add-row-three').DataTable({
            "pageLength": 10,
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

    // api data bagian
    $('#idbagian').on('change', (event) => {
        getBagian(event.target.value).then(nmbagian => {
            $('#namabagian').val(nmbagian.nama_bagian);
        });
    });
    async function getBagian(id) {
        let response = await fetch('/api/data-bagian/' + id)
        let data = await response.json();
        return data;
    }

    // api data kode kegiatan
    // $('#kodekeg').on('change', (event) => {
    //     getKode(event.target.value).then(kode => {
    //         $('#namakegiatan').val(kode.nama_kegiatan);
    //         $('#kodekegiatan').val(kode.kode_kegiatan);
    //     });
    // });
    // async function getKode(id) {
    //     let response = await fetch('/api/data-kegiatan/' + id)
    //     let data = await response.json();
    //     return data;
    // }

    // api data kode kegiatan 2
    $('#id-kegiatan').on('change', (event) => {
        getKode(event.target.value).then(kode => {
            $('#kodekegiatan').val(kode.kode_kegiatan);
            $('#namakegiatan').val(kode.nama_kegiatan);
        });
    });
    async function getKode(id) {
        let response = await fetch('/api/data-kegiatan/' + id)
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

    //api data kegiatan search
    // function dataKegiatan() {
    //     $('#kode').select2({
    //         minimumInputLength: 0,
    //         allowClear: true,
    //         theme: "bootstrap-5",
    //         placeholder: '.::Pilih Kode Kegiatan::.',
    //         ajax: {
    //             dataType: 'json',
    //             url: "<?= base_url('sppd/kegiatan') ?>",
    //             delay: 150,
    //             data: function(params) {
    //                 return {
    //                     search: params.term
    //                 }
    //             },
    //             processResults: function(data, page) {
    //                 return {
    //                     results: data
    //                 }
    //             }
    //         }
    //     });
    //     $(document).ready(function() {
    //         $("#kode").change(function() {
    //             var url = "<?= base_url('sppd/subkegiatan'); ?>/" + $(this).val();
    //             $('#kodesub').load(url);
    //             $('#kodesub').select2({
    //                 theme: "bootstrap-5"
    //             });
    //             return false;
    //         })
    //     });
    // }
    // $(document).ready(function() {
    //     dataKegiatan();
    // });

    // api data rekening
    $('#koderek').on('change', (event) => {
        getRekening(event.target.value).then(kode => {
            $('#koderekening').val(kode.kode_rek);
            $('#namarek').val(kode.nama_rek);
            $('#reksimda').val(kode.kode_rek_simda);
        });
    });
    async function getRekening(id) {
        let response = await fetch('/api/data-rekening/' + id)
        let data = await response.json();
        return data;
    }

    //API data kegiatan fect sub kegiatan
    // $('#kodekeg').on('change', function() {
    //     var idKegiatan = $(this).val();
    //     var url = "<?= base_url('sppd/fetch-subkegiatan'); ?>/" + idKegiatan;
    //     $('.subnama').load(url);
    //     $('.subnama').select2({
    //         theme: "bootstrap-5"
    //     });
    //     return false;
    // })

    // api data sub kegiatan
    $('#id-sub').on('change', (event) => {
        getIdSub(event.target.value).then(idsub => {
            $('#kodesubkeg').val(idsub.kode_sub);
            $('#namasubkeg').val(idsub.nama_sub);
        });
    });
    async function getIdSub(id) {
        let response = await fetch('/api/data-sub-kegiatan/' + id)
        let data = await response.json();
        return data;
    }

    //Add more
    // $(document).ready(function() {
    //     var i = 1;
    //     $('#add_field').click(function() {
    //         i++;
    //         $('#dynamic_field_append').append(
    //             '<div class="col-md-12"  id="row_remove' + i + '" >' +
    //             '<div class="row">' +
    //             '<div class="col-md-8">' +
    //             '<div class="form-group">' +
    //             '<label>Nama Sub Kegiatan ' + i + ' <span class="text-danger">*</span></label>' +
    //             '<select class="form-control subnama namasubm" id="' + i + '" name="namasub" style="width: 100%"></select>' +
    //             '</div>' +
    //             '<input type="text" class="form-control" id="kodesubkegm' + i + '" name="kodesubkeg[]">' +
    //             '<input type="text" class="form-control" id="namasubkegm' + i + '" name="namasubkeg[]">' +
    //             '</div>' +
    //             '<div class="form-group">' +
    //             '</br>' +
    //             '<div class="col-md-4 mt-2">' +
    //             '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove"><i class="fas fa-plus"></i> Hapus Sub</button>' +
    //             '</div>' +
    //             '</div>' +
    //             '</div>' +
    //             '</div>'
    //         );
    //     });
    //     $(document).on('click', '.btn_remove', function() {
    //         var button_id = $(this).attr("id");
    //         $('#row_remove' + button_id + '').remove();
    //     });
    //     // api data sub kegiatan more
    //     $(document).on('change', '.namasubm', (event) => {
    //         var select_id = $(".namasubm").attr("id");
    //         console.log(select_id);
    //         getIdSub(event.target.value).then(idsub => {
    //             $('#kodesubkegm' + select_id + '').val(idsub.kode_sub);
    //             $('#namasubkegm' + select_id + '').val(idsub.nama_sub);
    //         });
    //     });
    //     async function getIdSub(id) {
    //         let response = await fetch('/api/data-sub-kegiatan/' + id)
    //         let data = await response.json();
    //         return data;
    //     }
    // });
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