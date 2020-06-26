<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/header.php'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                <a href="index.html" class="logo">
                    <img src="<?= base_url() ?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
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
                                <h2 class="text-white pb-2 fw-bold">Data Kategori</h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                                <a href="#" class="btn btn-secondary btn-round">Tambah Kategori</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <!-- content -->
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