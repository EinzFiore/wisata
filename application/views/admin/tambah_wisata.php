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
                                    <?= form_open_multipart('wisata/tambah_wisata'); ?>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                                                <div class="alert alert-danger alert-notify">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label for="nama">Nama wisata</label>
                                                <input type="text" name="nama" id="nama" value="<?= set_value('nama'); ?>" class="form-control" placeholder="Nama wisata">
                                                <?= form_error('nama', '<div class="text-danger small">', '</div>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="jenis_wisata">Jenis wisata</label>
                                                <select name="jenis_wisata" id="jenis_wisata" class="form-control">
                                                    <option value="">-- Pilih Jenis --</option>
                                                    <option value="Gratis">Gratis</option>
                                                    <option value="HTM">HTM</option>
                                                </select>
                                                <?= form_error('jenis_wisata', '<div class="text-danger small">', '</div>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <input type="file" name="gambar" id="gambar" class="form-control">
                                                <div class="text-dark small">Format file <b>(jpg/jpeg/png/svg)</b>
                                                    maksimal 2MB.</div>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Deskripsi"></textarea>
                                                <?= form_error('deskripsi', '<div class="text-danger small">', '</div>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status wisata</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="Buka">Buka</option>
                                                    <option value="Tutup">Tutup</option>
                                                </select>
                                                <?= form_error('status', '<div class="text-danger small">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="harga">Harga wisata</label>
                                                <input type="text" name="harga" id="harga" value="<?= set_value('harga'); ?>" class="form-control" placeholder="Harga wisata">
                                                <?= form_error('harga', '<div class="text-danger small">', '</div>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="ruangtamu">Jam Buka</label>
                                                <input type="time" name="jam_buka" size="30" class="form-control">
                                                <?= form_error('jam_buka') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="ruangtamu">Jam Tutup</label>
                                                <input type="time" name="jam_tutup" size="30" class="form-control">
                                                <?= form_error('jam_tutup') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="kamar_mandi">Lokasi</label>
                                                <input type="text" name="lokasi" class="form-control" placeholder="Nama Lokasi">
                                                <?= form_error('lokasi') ?>
                                            </div>
                                            <!-- // Untuk link map insert bagian href nya aja, gk perlu semua tag di copy !! -->
                                            <div class="form-group">
                                                <label for="map">Map</label>
                                                <input type="text" name="link_map" class="form-control" placeholder="Link Map">
                                                <?= form_error('link_map') ?>
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