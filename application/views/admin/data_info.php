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
                                <a href="<?= site_url('admin/tambah_post'); ?>" class="btn btn-secondary btn-round">Tambah
                                    Post</a>
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
                                                    <th>Judul</th>
                                                    <th>Cover</th>
                                                    <th>Post</th>
                                                    <th>Tanggal Post</th>
                                                    <th>Jam Post</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                foreach ($informasi as $info) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $info['judul']; ?></td>
                                                    <td><img src="<?= base_url('assets/upload/blog/cover/') . $info['cover'] ?>"
                                                         width="100" class="img-thumbnail"></td>
                                                    <td><?= substr($info['post'], 0, 50) . '...' ?></td>
                                                    <td><?= $info['tanggal_post']; ?></td>
                                                    <td><?= $info['jam_post']; ?></td>
                                                    <td>
                                                    <a href="<?= base_url('admin/edit_post/') . $info['id_info'] ?>"
                                                            class="btn btn-primary btn-sm mt-2"><i
                                                                class="fas fa-pen-square"></i></a>

                                                        <a href="<?= site_url('admin/post_hapus/'. $info['id_info']); ?>"
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