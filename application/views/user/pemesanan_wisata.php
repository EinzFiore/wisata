<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/user/header.php'); ?>
    <style>
        #carouselId img {
            height: 600px;
            width: 100%;
        }

        .nav-item span.daftar {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="wrapper overlay-sidebar">
        <div class="main-header">
            <?php $this->load->view('templates/user/logo-header.php'); ?>
            <?php $this->load->view('templates/user/nav.php'); ?>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Pemesanan Tiket Wisata <?= $wisata['nama']; ?></div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?= base_url('assets/upload/wisata/' . $wisata['gambar']); ?>" alt="gambar wisata" height="300" class="card-img rounded animated zoomIn slow">
                                            <p class="text-muted mt-3"><?= $wisata['deskripsi'] ?></p>
                                        </div>
                                        <div class="col-md-8">
                                            <?= form_open('pemesanan/tambah/' . $wisata['id']); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <input type="text" value="<?= $member['nama']; ?>" name="nama" id="nama" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" value="<?= $member['email']; ?>" name="email" id="email" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal Pemesanan</label>
                                                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                                                        <?= form_error('tanggal', '<div class="text-danger small">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="harga">Harga Tiket Wisata</label>
                                                        <input type="text" name="harga" id="harga" value="Rp. <?= number_format($wisata['harga']); ?> / tiket" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lama">Jumlah Tiket</label>
                                                        <input type="text" name="lama" id="lama" class="form-control" placeholder="tiket">
                                                        <?= form_error('lama', '<div class="text-danger small">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-lg"> Pesan
                                                            Sekarang</button>
                                                        <a href="<?= site_url('home/info') ?>" class="btn btn-primary btn-lg">
                                                            Kembali Ke Home</a>
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
            <?php $this->load->view('templates/user/footer.php'); ?> ?>
        </div>
    </div>
    <?php $this->load->view('templates/user/js.php'); ?>
</body>

</html>