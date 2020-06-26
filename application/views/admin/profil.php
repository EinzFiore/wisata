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
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 col-md-2">
                                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons"
                                                id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active show" href="#">
                                                    <i class="flaticon-user"></i>
                                                    Profil Saya
                                                </a>
                                                <a class="nav-link" href="<?= site_url('admin/edit_profil'); ?>">
                                                    <i class="flaticon-pen"></i>
                                                    Ubah Profil
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-10">
                                            <div class="tab-content" id="v-pills-with-icon-tabContent">
                                                <div class="tab-pane fade active show" id="v-pills-home-icons"
                                                    role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                                    <!-- profil -->
                                                    <div class="row">
                                                        <div
                                                            class="col-md-6 d-flex justify-content-center align-items-center">
                                                            <img src="<?= base_url('assets/upload/'. $admin['image']); ?>"
                                                                alt="image profile" class="rounded-circle" width="200">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="text-left text-primary mb-3">Nama</div>
                                                            <div class="alert alert-primary mb-2" role="alert">
                                                                <i class="fas fa-user"></i>
                                                                <?= ucwords($admin['nama']); ?>
                                                            </div>
                                                            <div class="text-left text-primary mb-3">Email</div>
                                                            <div class="alert alert-primary" role="alert">
                                                                <i class="fas fa-envelope-open"></i>
                                                                <?= $admin['username']; ?>
                                                            </div>
                                                            <div class="text-left text-primary mb-3">No Telepon</div>
                                                            <div class="alert alert-primary" role="alert">
                                                                <i class="fas fa-phone"></i>
                                                                <?= $admin['telepon']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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