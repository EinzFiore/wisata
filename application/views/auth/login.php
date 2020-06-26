<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Siparwa &mdash; <?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/stisla/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/stisla/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash-error'); ?>"></div>
            <?php if ($this->session->flashdata('flash-error')) : ?>
            <?php endif; ?>
            <div class="d-flex flex-wrap align-items-stretch bg-white">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">Sistem Informasi Pariwisata</span>
                        </h4>
                        <p class="text-muted">Before you get started, you must login or register if you don't already
                            have an account.</p>
                        <?php if (!empty($this->session->flashdata('error') || $this->session->flashdata('success'))) : ?>
                            <div class="alert alert-<?php if ($this->session->flashdata('error')) {
                                                        echo "danger";
                                                    } else if ($this->session->flashdata('success')) {
                                                        echo "success";
                                                    } ?> alert-notify" role="alert">
                                <?= $this->session->flashdata('error'); ?>
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?= form_open(site_url('auth')); ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" value="<?= set_value('email'); ?>" class="form-control" name="email" placeholder="Email" autofocus>
                            <?= form_error('email', '<div class="text-danger small mt-2">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                            <?= form_error('password', '<div class="text-danger small mt-2">', '</div>'); ?>
                        </div>
                        <div class=" form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block btn-icon icon-right" tabindex="4">
                                Login
                            </button>
                        </div>
                        <div class="mt-5 text-center">
                            Belum punya akun? <a href="<?= site_url('auth/daftar') ?>">Daftar Sekarang.</a>
                        </div>
                        <?= form_close(); ?>
                        <div class="text-center mt-5 text-small">
                            Copyright &copy; <?= date('Y'); ?> wisata. by Kel 5
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-1 mt-5 pr-2 ml-5">
                    <img src="<?= base_url('assets/img/cover.svg') ?>" width="80%">
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>assets/js/myscript.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/stisla/js/stisla.js"></script>
    <!-- Template JS File -->
    <script src="<?= base_url(); ?>assets/vendor/stisla/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/stisla/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('.alert-notify').alert().delay(5000).slideUp('slow');
        });
    </script>
</body>

</html>