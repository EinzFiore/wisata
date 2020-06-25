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
                            <?php if(!empty($this->session->flashdata('error') || $this->session->flashdata('success'))) : ?>
                            <div
                                class="alert alert-<?php if($this->session->flashdata('error')) { echo "danger"; } else if($this->session->flashdata('success')) { echo "success"; } ?> alert-notify">
                                <i
                                    class="fas fa-<?php if($this->session->flashdata('error')) { echo "exclamation-triangle"; } else if($this->session->flashdata('success')) { echo "check"; } ?>"></i>
                                <?= $this->session->flashdata('error'); ?>
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover table-head-bg-primary table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Member</th>
                                                    <th>Nama wisata</th>
                                                    <th>Tanggal</th>
                                                    <th>Review</th>
                                                    <th>Bintang</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($komplain as $key =>  $komp) : ?>
                                                <tr>
                                                    <td><?= $key+1; ?></td>
                                                    <td><?= $komp['nama_member']; ?></td>
                                                    <td><?= $komp['nama_wisata']; ?></td>
                                                    <td><?= $komp['tanggal']; ?></td>
                                                    <td><?= $komp['deskripsi']; ?></td>
                                                    <td>
                                                    <?php 
                                                        $star = $komp['star'];
                                                        for($i=0; $i<$star; $i++) :
                                                        ?>
                                                            <i class="fa fa-star"></i> 
                                                    <?php endfor; ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('admin/komplain_hapus/'. $komp['id_keluhan']); ?>"
                                                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"
                                                                onclick="return confirm('Yakin Menghapus data');"></i></a>
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
        <!-- Custom template | don't include it in your project! -->
        <?php $this->load->view('templates/custom.php'); ?>
        <!-- End Custom template -->
    </div>
    <?php $this->load->view('templates/js.php'); ?>
</body>

</html>