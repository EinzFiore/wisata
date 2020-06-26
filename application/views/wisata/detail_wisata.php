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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Informasi Tiket Wisata</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['gambar']); ?>" class="card-img rounded" alt="gambar">
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <ul class="list-group">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Nama wisata
                                                            <span><?= $wisata['nama']; ?></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Jenis
                                                            <span><?= $wisata['jenis_wisata']; ?></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Status
                                                            <span><?= $wisata['status']; ?></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Harga
                                                            <span>Rp.
                                                                <?= number_format($wisata['harga'], 0, ',', '.'); ?>/Bulan</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Deskripsi
                                                            <span>
                                                                <?= word_limiter($wisata['deskripsi'], 3); ?>
                                                                <?php if (str_word_count($wisata['deskripsi']) > 3) :  ?>
                                                                    <a href="#" data-toggle="modal" title="Lihat Selengkapnya" data-target="#modelId">
                                                                        <i class="fas fa-angle-double-right"></i>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <ul class="list-group">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Jumlah Tiket
                                                            <span><?= $wisata['tiket']; ?></span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Jam Operasional
                                                            <?php if ($wisata['ruangtamu'] == "1") : ?>
                                                                <span>Tersedia</span>
                                                            <?php else : ?>
                                                                <span>Tidak Tersedia</span>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Lokasi
                                                            <?php if ($wisata['kamar_mandi'] == "1") : ?>
                                                                <span>Tersedia</span>
                                                            <?php else : ?>
                                                                <span>Tidak Tersedia</span>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            Fasilitas
                                                            <?php if ($wisata['ac'] == "1") : ?>
                                                                <span>Tersedia</span>
                                                            <?php else : ?>
                                                                <span>Tidak Tersedia</span>
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="text-right mt-3">
                                                <a href="<?= site_url('home/info'); ?>" class="btn btn-info btn-lg">Kembali
                                                </a>
                                                <?php if (!$this->session->userdata('email')) : ?>
                                                    <?php if ($wisata['status'] == "Tersedia") : ?>
                                                        <a href="<?= site_url('auth/daftar'); ?>" class="btn btn-primary btn-lg">Pesan
                                                            Sekarang</a>
                                                    <?php else : ?>
                                                        <button type="button" class="btn btn-danger btn-lg">
                                                            Tidak Tersedia
                                                        </button>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <?php if ($wisata['status'] == "Tidak Tersedia") : ?>
                                                        <button type="button" class="btn btn-danger btn-lg">
                                                            Tidak Tersedia</button>
                                                    <?php else : ?>
                                                        <a href="<?= site_url('pemesanan/tambah/' . $wisata['id']); ?>" class="btn btn-primary btn-lg">Pesan
                                                            Sekarang</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('templates/user/footer.php'); ?> ?>
        </div>
    </div>
    <?php $this->load->view('templates/user/js.php'); ?>
    <script>
        $('.btn-danger').on('click', function() {
            swal({
                title: 'Peringatan',
                text: 'wisata tidak tersedia saat ini!',
                icon: 'error',
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
                <h5 class="modal-title">Deskripsi wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?= $wisata['deskripsi']; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>