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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-5 offset-xl-1 m-xl-auto">
                        <?php if (!empty($this->session->flashdata('error'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('error')  ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login Administrator</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?= site_url('login/admin') ?>">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>" placeholder="username" autofocus>
                                        <?= form_error('username', '<div class="text-danger small">', '</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<div class="text-danger small">', '</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; <?= date('Y'); ?> wisata by Kel 5
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