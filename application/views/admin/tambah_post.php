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
                                <a href="<?= site_url('wisata') ?>" class="btn btn-secondary btn-round"><i class="fas fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <?= form_open_multipart('admin/tambah_post'); ?>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                                                <div class="alert alert-danger alert-notify">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="nama">Judul Post</label>
                                                <input type="text" name="judul" id="nama" value="<?= set_value('nama'); ?>" class="form-control" placeholder="Judul Post">
                                                <?= form_error('judul', '<div class="text-danger small">', '</div>'); ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="jenis_wisata">Penulis</label>
                                                <input type="hidden" value="<?= $post['id']; ?>" name="id">
                                                <input name="penulis" value="<?= $post['nama']; ?>" type="text" id="penulis" class="form-control">
                                                </input>
                                                <?= form_error('penulis', '<div class="text-danger small">', '</div>'); ?>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <input type="file" name="gambar" id="gambar" class="form-control">
                                                <div class="text-dark small">Format file <b>(jpg/jpeg/png/svg)</b>
                                                    maksimal 2MB.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="deskripsi">Isi Post</label>
                                                <textarea name="post" id="post" class="form-control" rows="4" placeholder="Deskripsi"></textarea>
                                                <?= form_error('post', '<div class="text-danger small">', '</div>'); ?>
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
        <?php $this->load->view('templates/custom.php'); ?>
    </div>
    <?php $this->load->view('templates/js.php'); ?>
</body>

</html>