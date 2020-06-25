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
                                <h2 class="text-white pb-2 fw-bold">Ubah Password</h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="<?= site_url('admin/profil') ?>" class="btn btn-secondary btn-round">Kembali</a>
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
                                    <?= form_open('admin/ubahpassword'); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password_lama">Password Sekarang</label>
                                                <input type="password" name="password_lama" id="password_lama" class="form-control form-control-lg">
                                                <?= form_error('password_lama', '<div class="text-danger small mt-2">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password_baru">Password Baru</label>
                                                <input type="password" name="password_baru" id="password_baru" class="form-control form-control-lg" placeholder="Minimal 4 karakter">
                                                <?= form_error('password_baru', '<div class="text-danger small mt-2">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ulangi_password">Ulangi Password</label>
                                                <input type="password" name="ulangi_password" id="ulangi_password" class="form-control form-control-lg">
                                                <?= form_error('ulangi_password', '<div class="text-danger small mt-2">', '</div>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                                                <button type="reset" class="btn btn-danger btn-lg">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('templates/footer.php'); ?>
        </div>
        <!-- Custom template | don't include it in your project! -->
        <?php $this->load->view('templates/custom.php'); ?>
        <!-- End Custom template -->
    </div>
    <?php $this->load->view('templates/js.php'); ?>
</body>

</html>