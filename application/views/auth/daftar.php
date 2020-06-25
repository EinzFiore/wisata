<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Siparwa &mdash; <?= $title; ?></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/stisla/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/stisla/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-8 col-md-12 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">Sistem Informasi Pariwisata</span>
                        </h4>
                        <p class="text-muted">Daftarkan akun anda sekarang.</p>
                        <?= form_open('auth/daftar'); ?>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" value="<?= set_value('nama') ?>" class="form-control" placeholder="Masukkan nama">
                                    <?= form_error('nama', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?= form_error('gender', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" value="<?= set_value('email') ?>" class="form-control" name="email" placeholder="Email" autofocus>
                                    <?= form_error('email', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="text-muted small mt-2">Password minimal 4 karakter & Maksimal 6
                                        karakter.</span>
                                    <?= form_error('password', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status/Pekerjaan</label>
                                    <input type="text" name="status" id="status" value="<?= set_value('status') ?>" class="form-control" placeholder="Masukkan status">
                                    <?= form_error('status', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">No Telepon</label>
                                    <input id="telepon" type="text" value="<?= set_value('telepon') ?>" class="form-control" name="telepon" placeholder="telepon" autofocus>
                                    <?= form_error('telepon', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    <?= form_error('alamat', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password2" class="control-label">Ulangi Password</label>
                                    </div>
                                    <input id="password2" type="password" class="form-control" name="password2" placeholder="Password">
                                    <?= form_error('password2', '<div class="text-danger small mt-2">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg"> Daftar</button>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                        <div class="mt-5 text-center">
                            Sudah punya akun? <a href="<?= site_url('auth') ?>">Login Sekarang.</a>
                        </div>
                        <div class="text-center mt-5 text-small">
                            Copyright &copy; <?= date('Y'); ?> wisata. by Kel 5
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 order-lg-2 min-vh-100 order-1 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url(); ?>assets/img/bg.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 text-dark font-weight-bold">Selamat Datang di Pariwisata Purwakarta!</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Indonesia</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/stisla/js/stisla.js"></script>
    <!-- Template JS File -->
    <script src="<?= base_url(); ?>assets/vendor/stisla/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/stisla/js/custom.js"></script>
    <!-- Page Specific JS File -->
</body>

</html>