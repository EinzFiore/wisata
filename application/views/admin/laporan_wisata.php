<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/header.php'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <?php $this->load->view('templates/logo-header.php'); ?>
            <?php $this->load->view('templates/nav.php'); ?>
        </div>
        <?php $this->load->view('templates/sidebar.php'); ?>
        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?= site_url('admin/cetak_laporan_wisata') ?>" target="_blank" class="btn btn-danger mb-2"><i class="fas fa-print"></i> Cetak Pdf</a>
                            <a href="<?= site_url('admin/laporan_wisata') ?>" class="btn btn-light mb-2"><i class="fa fa-history"></i></a>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-head-bg-primary table-bordered" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jenis</th>
                                                    <th>Status</th>
                                                    <th>Harga</th>
                                                    <th>Jam Operasional</th>
                                                    <th>Lokasi</th>
                                                    <th>gambar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($wisata as $key =>  $w) : ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?></td>
                                                        <td><?= $w['nama']; ?></td>
                                                        <td><?= $w['jenis_wisata']; ?></td>
                                                        <td><?= $w['status']; ?></td>
                                                        <td>Rp. <?= number_format($w['harga'], 0, ',', '.'); ?></td>
                                                        <td><?= $w['jam_buka'] . ' - ' . $w['jam_tutup'] ?></td>
                                                        <td><?= $w['lokasi']; ?></td>
                                                        <td>
                                                        <img class="img-thumbnail" width="100" src="<?= base_url('assets/upload/wisata/') . $w['gambar'] ?>" alt="">
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