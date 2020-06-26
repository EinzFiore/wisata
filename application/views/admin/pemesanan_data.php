<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/header.php'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <?php $this->load->view('templates/logo-header.php'); ?>
            <!-- Navbar Header -->
            <?php $this->load->view('templates/nav.php'); ?>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <?php $this->load->view('templates/sidebar.php'); ?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(!empty($this->session->flashdata('error') || $this->session->flashdata('success'))) : ?>
                            <div
                                class="alert alert-<?php if($this->session->flashdata('error')) { echo "danger"; } else if($this->session->flashdata('success')) { echo "success"; } ?> alert-notify">
                                <i
                                    class="fas fa-<?php if($this->session->flashdata('error')) { echo "exclamation-triangle"; } else if($this->session->flashdata('success')) { echo "check"; } ?>"></i>
                                <?= $this->session->flashdata('error'); ?>
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover table-head-bg-primary table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama wisata</th>
                                                    <th>Nama Pemesan</th>
                                                    <th>Email</th>
                                                    <th>Tanggal Pemesanan</th>
                                                    <th>Jumlah Tiket</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th>Bukti Pembayaran</th>
                                                    <th>Status Pembayaran</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pemesanan as $key =>  $pesan) : ?>
                                                <tr>
                                                    <td><?= $key+1; ?></td>
                                                    <td><?= $pesan['nama_wisata']; ?></td>
                                                    <td><?= $pesan['nama_member']; ?></td>
                                                    <td><?= $pesan['email']; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($pesan['tanggal'])); ?></td>
                                                    <td><?= $pesan['lama'] ?></td>
                                                    <td><?= date('d-m-Y', strtotime($pesan['tgl_bayar'])); ?></td>
                                                    <td>
                                                        <?php if($pesan['bukti_pembayaran'] == null ) : ?>
                                                        <span class="btn btn-danger btn-sm"><i
                                                                class="fas fa-times"></i></span>
                                                        <?php else: ?>
                                                        <a href="<?= site_url('pemesanan/download_bukti/'. $pesan['id']); ?>"
                                                            class="btn btn-info btn-sm mb-2"><i
                                                                class="fas fa-file-download"
                                                                title="Download bukti pembayaran"></i> Download</a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($pesan['status_pembayaran'] == "0" ) : ?>
                                                        <span class="badge badge-danger badge-pill">Belum Lunas</span>
                                                        <?php else: ?>
                                                        <span class="badge badge-success badge-pill">Lunas</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($pesan['status_pembayaran'] == "1") : ?>
                                                        <button type="button" class="btn btn-success btn-sm mb-1 mt-1">
                                                            <i class="fas fa-check-double"></i>
                                                            Selesai
                                                        </button>
                                                        <?php else: ?>
                                                        <a href="<?= site_url('pemesanan/konfirmasi_pemesanan/'.$pesan['id']); ?>"
                                                            class="btn btn-success btn-sm mb-1 mt-1"><i
                                                                class="fas fa-check"></i>
                                                            Confirm
                                                        </a>
                                                        <?php endif; ?>
                                                        <?php if($pesan['status_pembayaran'] == "0"): ?>
                                                        <a href="<?= site_url('pemesanan/pemesanan_batal/'. $pesan['id']); ?>"
                                                            class="btn btn-danger btn-sm button-delete"><i
                                                                class="fas fa-trash-alt"></i> Batalkan
                                                        </a>
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
            <?php $this->load->view('templates/footer.php'); ?>
        </div>
        <?php $this->load->view('templates/custom.php'); ?>
    </div>
    <?php $this->load->view('templates/js.php'); ?>

</body>

</html>