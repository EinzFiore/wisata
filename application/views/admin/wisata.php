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
                                <a href="<?= site_url('wisata'); ?>" class="btn btn-white btn-sm btn-round mr-2"><i class="fas fa-history"></i></a>
                                <a href="<?= site_url('wisata/tambah_wisata'); ?>" class="btn btn-secondary btn-round">Tambah
                                    wisata</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
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
                                                    <th>Jam Buka</th>
                                                    <th>Jam Tutup</th>
                                                    <th>Harga</th>
                                                    <th>Gambar</th>
                                                    <th width="15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($wisataan as $key =>  $wisata) : ?>
                                                <tr>
                                                    <td><?= $key + 1; ?></td>
                                                    <td><?= $wisata['nama']; ?></td>
                                                    <td><?= $wisata['jenis_wisata']; ?></td>
                                                    <td><?= $wisata['status']; ?></td>
                                                    <td><?= $wisata['jam_buka']; ?></td>
                                                    <td><?= $wisata['jam_tutup']; ?></td>
                                                    <td>Rp. <?= number_format($wisata['harga'], 0, ',', '.'); ?></td>
                                                    <td>
                                                        <img src="<?= base_url('assets/upload/wisata/' . $wisata['gambar']); ?>"
                                                            alt="Gambar wisata" width="100" class="img-thumbnail">
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('wisata/edit_wisata/' . $wisata['id']); ?>"
                                                            class="btn btn-primary btn-sm"><i
                                                                class="fas fa-pen-square"></i></a>
                                                        <a href="<?= site_url('wisata/hapus_wisata/' . $wisata['id']); ?>"
                                                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"
                                                                onclick="return confirm('Yakin menghapus');"></i></a>
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
    <!-- <script>
        $('#table1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('wisata/get_ajax') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                    "targets": [5, 6, -1],
                    "orderable": false,
                },
                {
                    "targets": [-1],
                    "className": "text-center",
                },
            ]
        }); -->
    </script>
</body>

</html>