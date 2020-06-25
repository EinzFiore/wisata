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
                            <a href="<?= site_url('admin/cetak_laporan_member') ?>" target="_blank" class="btn btn-danger mb-2"><i class="fas fa-print"></i> Cetak Pdf</a>
                            <a href="<?= site_url('admin/member') ?>" class="btn btn-light mb-2"><i class="fa fa-history"></i></a>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-head-bg-primary table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>No Telepon</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <?php foreach ($member as $key =>  $user) : ?>
                                                <tr>
                                                    <td><?= $key + 1; ?></td>
                                                    <td><?= $user['nama']; ?></td>
                                                    <td><?= $user['gender']; ?></td>
                                                    <td><?= $user['status']; ?></td>
                                                    <td><?= $user['email']; ?></td>
                                                    <td><?= $user['telepon']; ?></td>
                                                    <td><?= $user['alamat']; ?></td>
                                                    <td>
                                                        <a href="<?= site_url('admin/member_hapus/' . $user['id']); ?>"
                                                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus');"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?> -->
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
    <script>
        $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [6, -1],
                "orderable": false
            }]
        });
    </script>
</body>

</html>