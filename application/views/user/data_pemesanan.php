<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/user/header.php'); ?>
    <style>
        .nav-item span.daftar {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="wrapper overlay-sidebar">
        <div class="main-header">
            <?php $this->load->view('templates/user/logo-header.php'); ?>
            <?php $this->load->view('templates/user/nav.php'); ?>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 offset-md-1 offset-lg-1 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Pemesanan Tiket Wisata</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pemesan</th>
                                                    <th>Wisata</th>
                                                    <th>Jenis Wisata</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah Tiket</th>
                                                    <th>Transaksi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pemesanan as $key => $value) : ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?></td>
                                                        <td><?= $value['nama_member']; ?></td>
                                                        <td><?= $value['nama_wisata']; ?></td>
                                                        <td><?= $value['jenis_wisata']; ?></td>
                                                        <td><?= $value['harga']; ?></td>
                                                        <td><?= $value['lama']; ?></td>
                                                        <td>
                                                            <?php if (empty($value['bukti_pembayaran'])) : ?>
                                                                <a href="<?= site_url('pemesanan/bayar/' . $value['id']); ?>" class="btn btn-success btn-sm"> Bayar Sekarang</a>
                                                            <?php else : ?>
                                                                <a href="<?= site_url('pemesanan/bayar/' . $value['id']); ?>" class="btn btn-success btn-sm">Cek Pembayaran</a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (empty($value['bukti_pembayaran'])) : ?>
                                                                <a href="<?= site_url('pemesanan/batal_pesan/' . $value['id']); ?>" class="btn btn-danger btn-sm btn-reset">
                                                                    Batalkan</a>
                                                            <?php else : ?>
                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId">
                                                                    <i class="fas fa-times"></i> Batalkan
                                                                </button>
                                                            <?php endif; ?>
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
            </div>
            <?php $this->load->view('templates/user/footer.php'); ?> ?>
        </div>
        <!-- End Custom template -->
    </div>
    <?php $this->load->view('templates/user/js.php'); ?>
    <script>
        $('.btn-reset').on('click', function(e) {
            e.preventDefault();
            const target = $(this).attr('href');
            swal({
                title: 'Batalkan Pemesanan',
                text: 'Klik Ok untuk membatalkan!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            }).then((value) => {
                if (value == true) {
                    swal("Pemesanan berhasil dibatalkan!", {
                        icon: 'success',
                        timer: 3000,
                    });
                    document.location.href = target;
                } else {
                    swal("Pemesanan tidak dibatalkan", {
                        icon: 'info',
                    });
                }
            });
        });
    </script>
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informasi Pembatalan Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Maaf, Anda sudah melakukan upload bukti pembayaran, Tidak dapat membatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>