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
                    <?php if (!empty($this->session->flashdata('error') || $this->session->flashdata('success'))) : ?>
                        <div class="alert alert-<?php if ($this->session->flashdata('error')) {
                                                    echo "danger";
                                                } else if ($this->session->flashdata('success')) {
                                                    echo "success";
                                                } ?> alert-notify">
                            <i class="fas fa-<?php if ($this->session->flashdata('error')) {
                                                    echo "exclamation-triangle";
                                                } else if ($this->session->flashdata('success')) {
                                                    echo "check";
                                                } ?>"></i>
                            <?= $this->session->flashdata('error'); ?>
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <?php foreach ($wisataan as $wisata) : ?>
                            <div class="col-md-6">
                                <div class="card full-height">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <img src="<?= base_url('assets/upload/wisata/' . $wisata['gambar']); ?>" class="card-img animated zoomIn slow" height="250px" alt="">
                                            </div>
                                            <div class="col-lg-5">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <?= word_limiter($wisata['deskripsi'], 3); ?>
                                                        <?php if (str_word_count($wisata['deskripsi']) > 3) : ?>
                                                            <a href="#" data-toggle="modal" data-target="#modelId"><span><i class="fas fa-arrow-right"></i></span></a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li class="list-group-item"><?= $wisata['status']; ?></li>
                                                    <li class="list-group-item">Rp.<?= number_format($wisata['harga']); ?>
                                                    </li>
                                                    <?php if (!$this->session->userdata('email')) : ?>
                                                        <li class="list-group-item">
                                                            <a href="<?= site_url('auth/daftar'); ?>" class="btn btn-primary btn-block btn-lg"><i class="fas fa-save"></i> Pesan</a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <a href="<?= site_url('home/detail/' . $wisata['id']); ?>" class="btn btn-info btn-block"><i class="fas fa-eye"></i>
                                                                Detail</a>
                                                        </li>
                                                    <?php else : ?>
                                                        <li class="list-group-item">
                                                            <a href="<?= site_url('home/detail/' . $wisata['id']); ?>" class="btn btn-info btn-block"><i class="fas fa-eye"></i>
                                                                Detail</a>
                                                        </li>
                                                        <?php if ($wisata['status'] == "Tidak Tersedia") : ?>
                                                            <li class="list-group-item list-group-flush">
                                                                <button type="button" class=" btn btn-danger btn-block"><i class="fas fa-exclamation-triangle"></i>
                                                                    Tidak Tersedia</button>
                                                            </li>
                                                        <?php else : ?>
                                                            <li class="list-group-item list-group-flush">
                                                                <a href="<?= site_url('pemesanan/tambah/' . $wisata['id']); ?>" class="btn btn-primary btn-block"><i class="fas fa-save"></i>
                                                                    Pesan</a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                <h5 class="modal-title">Deskripsi Lanjutan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $wisata['deskripsi']; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>