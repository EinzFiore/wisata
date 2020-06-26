<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/user/header.php'); ?>
    <style>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pembayaran Tiket Wisata</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                    <?php if (!empty($this->session->flashdata('success'))) : ?>
                                        <div class="alert alert-success alert-notify" role="alert">
                                            <?= $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php endif; ?>
                                            <?php foreach ($pemesanan as $value) : ?>
                                                <?php endforeach; ?>
                                    <div class="table-responsive">
                                        <table class="table">
                                                <tr>
                                                    <th>Nama Pemesan</th>
                                                    <td width="1%">:</td>
                                                    <td><?= $value['nama_member']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Wisata</th>
                                                    <td>:</td>
                                                    <td><?= $value['nama_wisata']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Wisata</th>
                                                    <td>:</td>
                                                    <td><?= $value['jenis_wisata']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Harga Tiket</th>
                                                    <td>:</td>
                                                    <td>Rp. <?= number_format($value['harga'], 0, ',', '.'); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jumlah Tiket</th>
                                                    <td>:</td>
                                                    <td><?= $value['lama']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Pembayaran</th>
                                                    <td>:</td>
                                                    <th class="text-primary">Rp.
                                                        <?= number_format($value['harga'] * $value['lama'], 0, ',', '.'); ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="<?= base_url('assets/img/qrcode/') . $value['qr_code'] ?>" alt="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><a href="<?= site_url('pemesanan/cetak_invoice/' . $value['id']); ?>" target="_blank" class="btn btn-danger"><i class="fas fa-print"></i> Cetak
                                                            Pdf</a>
                                                        <a href="<?= site_url('pemesanan/data_transaksi'); ?>" class="btn btn-info"><i class="fas fa-reply"></i>
                                                            Kembali</a>
                                                    </td>
                                                </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                    <div class="card">
                                    <?php if($value['jenis_wisata'] == "HTM") : ?>
                                        <?php if($value['status_pembayaran'] == "0") : ?>
                                        <div class="card-header">
                                            <h4 class="card-title">Informasi Pembayaran</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Silahkan melakukan transfer melalui ke nomor rekening yang
                                                tertera dibawah ini.</p>
                                            <ul class="list-group mb-3">
                                                <li class="list-group-item d-flex justify-content-between align-items-center border-top-0">
                                                    BRI
                                                    <span>3219210281999</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center border-top-0 border-bottom-0">
                                                    BCA
                                                    <span>5233203290320</span>
                                                </li>
                                            </ul>
                                            <?php endif; ?>
                                            <?php if($value['status_pembayaran'] == "1")  : ?>
                                        <div class="card-header">
                                            <h4 class="card-title">Informasi Pembayaran </h4>
                                        </div>
                                        <div class="card-body"
                                            <p>Pembayaran telah berhasil dikonfirmasi, selanjutnya anda dapat mencetak tiket dan bukti pembayaran</p>
                                        <?php endif; ?>

                                            <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?= form_open_multipart('pemesanan/upload_pembayaran'); ?>
                                            <?php if ($value['bukti_pembayaran'] == null) : ?>
                                                <div class="form-group">
                                                    <label for="tgl_bayar">Tanggal Pembayaran</label>
                                                    <input type="hidden" name="id" value="<?= $value['id']; ?>" class="form-control">
                                                    <input type="date" name="tgl_bayar" id="tgl_bayar" value="<?= date("Y-m-d"); ?>" class="form-control">
                                                    <?= form_error('tgl_bayar', '<div class="text-danger small">', '</div>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                                                    <span>Format file <i><strong>(jpeg/jpg/png/pdf)</strong></i> ukuran
                                                        maksimal 1MB!</span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <?php if (empty($value['bukti_pembayaran'])) { ?>
                                                    <button type="submit" style="width:100%;" class="btn btn-primary"><i class="fas fa-file-upload"></i> Upload Bukti
                                                        Pembayaran</button>
                                                <?php } elseif ($value['status_pembayaran'] == "0") { ?>
                                                    <button type="button" style="width:100%;" class="btn btn-primary btn-confirm"><i class="fas fa-user-clock"></i>
                                                        Menunggu Konfirmasi</button>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('pemesanan/cetak_tiket/'). $value['id']; ?>" style="width:100%;" class="btn btn-primary btn-check"><i class="fas fa-file-upload"></i>
                                                        Cetak Tiket</a>
                                                    <a href="<?= base_url('pemesanan/cetak_bukti/'). $value['id']; ?>" style="width:100%;" class="btn btn-warning btn-check mt-2"><i class="fas fa-file-upload"></i>
                                                        Bukti Pembayaran</a>
                                                <?php } ?>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($value['jenis_wisata'] == "Gratis") : ?>
                                                <div class="card-header">
                                            <h4 class="card-title">Informasi Pembayaran </h4>
                                        </div>
                                        <div class="card-body"
                                            <p>Wisata ini termasuk kategori <b>GRATIS</b> selanjutnya anda dapat Cetak Tiket</p>
                                            <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?= form_open_multipart('pemesanan/upload_pembayaran'); ?>
                                                <div class="form-group">
                                                    <label for="tgl_bayar">Tanggal Pemesanan</label>
                                                    <input type="hidden" name="id" value="<?= $value['id']; ?>" class="form-control">
                                                    <input type="date" name="tgl_bayar" id="tgl_bayar" value="<?= date("Y-m-d"); ?>" class="form-control">
                                                    <?= form_error('tgl_bayar', '<div class="text-danger small">', '</div>'); ?>
                                                </div>
                                            <div class="form-group">
                                                    <a href="<?= base_url('pemesanan/cetak_tiket/'). $value['id']; ?>" style="width:100%;" class="btn btn-primary btn-check"><i class="fas fa-file-upload"></i>
                                                        Cetak Tiket</a>
                                            </div>
                                            <?php endif; ?>
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
    <script>
        $('.btn-confirm').on('click', function() {
            swal({
                title: 'Info Konfirmasi Pembayaran',
                text: 'Pemesanan anda sedang di cek, Silahkan Menunggu konfirmasi.',
                icon: 'info',
                closeOnClickOutside: false,
            });
        });
        $('.btn-check').on('click', function() {
            swal({
                title: 'Info Konfirmasi Pembayaran',
                text: 'Pemesanan anda berhasil, Terimakasih Sudah Berlanggan Dengan Kami.',
                icon: 'info',
                closeOnClickOutside: false,
            });
        });
    </script>
</body>

</html>