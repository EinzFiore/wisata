<?php
$countMember    = $this->db->count_all_results('member');
$countWisata    = $this->db->count_all_results('wisata');
$countOrder     = $this->db->count_all_results('pemesanan');
$query          = $this->db->query("SELECT * FROM wisata WHERE status='Tidak Tersedia'");
$qty            = $query->num_rows();
$sql            = $this->db->query("SELECT * FROM wisata WHERE status='Tersedia'");
$qtyAvailable   = $sql->num_rows();
$user           = $this->session->userdata('id');
?>
<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    $('.button-delete').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        swal({
            title: 'Batalkan Pemesanan?',
            // text: 'Klik Ok untuk membatalkan!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((value) => {
            if (value) {
                document.location.href = href;
                swal("Pemesanan berhasil dibatalkan", {
                    icon: 'success',
                });
            } else {
                swal("Pemesanan tidak dibatalkan", {
                    icon: 'info',
                });
            }
        });
    });

    $('#btn-logout').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        swal({
            title: 'Anda ingin keluar?',
            text: 'Klik Ok untuk keluar!',
            icon: 'info',
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        }).then((value) => {
            if (value) {
                document.location.href = href;
            } else {
                swal("Batal keluar", {
                    icon: 'info',
                    timer: 1500,
                });
            }
        });
    });

    const flashError = $('.flash-data').data('flashdata');
    if (flashError) {
        swal({
            title: 'Oopss..',
            text: flashError,
            icon: 'error',
        });
    }
</script>
<script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/js/setting-demo.js"></script>
<script src="<?= base_url() ?>assets/js/demo.js"></script>
<script>
        CKEDITOR.replace( 'post' );
</script>
 
<script>
    const countMember = <?= json_encode($countMember); ?>;
    const countWisata = <?= json_encode($countWisata); ?>;
    const countOrder = <?= json_encode($countOrder); ?>;
    const qtyNotAvailable = <?= json_encode($qty); ?>;
    const qtyAvailable = <?= json_encode($qtyAvailable); ?>;
    const user = <?= json_encode($user); ?>;
    console.log(qtyNotAvailable);
    Circles.create({
        id: 'circles-1',
        radius: 45,
        value: countMember,
        maxValue: 100,
        width: 7,
        text: countMember,
        colors: ['#f1f1f1', '#FF9E27'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-2',
        radius: 45,
        value: countWisata,
        maxValue: 100,
        width: 7,
        text: countWisata,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-3',
        radius: 45,
        value: countOrder,
        maxValue: 100,
        width: 7,
        text: countOrder,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-4',
        radius: 45,
        value: countWisata,
        maxValue: 100,
        width: 7,
        text: qtyNotAvailable,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-5',
        radius: 45,
        value: countWisata,
        maxValue: 100,
        width: 7,
        text: qtyAvailable,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-6',
        radius: 45,
        value: 100,
        maxValue: 100,
        width: 7,
        text: user,
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })
</script>
<script type="text/javascript">
    $('.alert-notify').alert().delay(3500).slideUp('slow');
</script>