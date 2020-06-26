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
                            <?php if (!empty($this->session->flashdata('success'))) : ?>
                                <div class="alert alert-success alert-notify">
                                    <i class="fa fa-bell"></i>
                                    <?= $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 col-md-2">
                                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active show" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-profile-icons" role="tab" aria-controls="v-pills-profile-icons" aria-selected="true">
                                                    <i class="flaticon-user-4"></i>
                                                    Ubah Profil
                                                </a>
                                                <a href="#" class="mt-3">
                                                    <img src="<?= base_url('assets/upload/' . $admin['image']) ?>" width="150" class="rounded-circle" alt="Profil">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-10">
                                            <div class="tab-content" id="v-pills-with-icon-tabContent">
                                                <div class="tab-pane fade active show" id="v-pills-profile-icons" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                                    <?= form_open_multipart('admin/edit_profil'); ?>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input type="text" name="nama" id="nama" class="form-control form-control-lg" placeholder="Nama" value="<?= $admin['nama']; ?>" autofocus>
                                                                <?= form_error('nama', '<div class="text-danger small mt-2">', '</div>'); ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Username</label>
                                                                <input type="text" name="username" id="username" value="<?= $admin['username']; ?>" class="form-control form-control-lg" placeholder="Username" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-12">
                                                            <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                                                                <div class="alert alert-danger alert-notify">
                                                                    <i class="fas fa-exclamation-triangle"></i>
                                                                    <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="form-group">
                                                                <label for="telepon">Telepon</label>
                                                                <input type="text" name="telepon" id="telepon" value="<?= $admin['telepon']; ?>" class="form-control form-control-lg" placeholder="Telepon">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="image">Image</label>
                                                                <input type="file" name="image" id="image" class="form-control">
                                                                <span class="text-warning">Format file
                                                                    <b><i>(jpg/jpeg/png/svg)</i></b> max <strong>2
                                                                        MB.</strong></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                                                                <a href="<?= site_url('admin/profil') ?>" class="btn btn-danger btn-lg">
                                                                    Batal</a>
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