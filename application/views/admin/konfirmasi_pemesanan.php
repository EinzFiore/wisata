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
                                <a href="<?= site_url('pemesanan') ?>" class="btn btn-secondary btn-round"><i class="fas fa-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="card">
                        <div class="card-body">
                            <?= form_open('pemesanan/konfirmasi_pemesanan/' . $pemesanan['id']); ?>
                            <div class="form-group">
                                <label for="status_pembayaran">Status Pembayaran</label>
                                <input type="hidden" name="id" value="<?= $pemesanan['id']; ?>" class="form-control">
                                <select class="form-control" name="status_pembayaran" id="status_pembayaran">
                                    <option value="1" <?php if ($pemesanan['status_pembayaran'] == "1") {
                                                            echo "selected";
                                                        } ?>>Lunas
                                    </option>
                                    <option value="0" <?php if ($pemesanan['status_pembayaran'] == "0") {
                                                            echo "selected";
                                                        } ?>>Tidak
                                        Lunas</option>
                                </select>
                                <label class="mt-3">Kirim Notifikasi ?</label>
                                <input type="text" name="email" placeholder="Masukan email pengguna" class="form-control">
                                <?= form_error('status_pembayaran', '<div class="text-danger small">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                <button type="button" class="btn btn-secondary">Batal</button>
                            </div>
                            <?= form_close(); ?>
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