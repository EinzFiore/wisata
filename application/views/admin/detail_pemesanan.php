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
                                <h2 class="text-white pb-2 fw-bold">Detail Pemesanan Selesai</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <a href="<?= site_url('admin/cetak_laporan_pemesanan') ?>" target="_blank" class="btn btn-danger mb-2"><i class="fas fa-print"></i> Cetak Pdf</a>
                    <a href="<?= site_url('pemesanan/detail_pemesanan') ?>" class="btn btn-light mb-2"><i class="fa fa-history"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-head-bg-primary" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>wisata</th>
                                    <th>Harga</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Total Bayar</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pemesanan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama_member']; ?></td>
                                        <td><?= $value['nama_wisata']; ?></td>
                                        <td>Rp. <?= number_format($value['harga'], 0, ',', '.'); ?></td>
                                        <td><?= $value['lama']; ?></td>
                                        <td>
                                            Rp. <?= number_format($value['harga'] * $value['lama'], 0, ',', '.'); ?>
                                        </td>
                                        <td><?= tgl_indo($value['tgl_bayar']); ?></td>
                                        <td>
                                            <?php if ($value['status_pembayaran'] == "1") : ?>
                                                <span class="badge badge-success badge-pill">Lunas</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger badge-pill">Belum Lunas</span>
                                            <?php endif; ?>
                                        </td>
                                        <?php $tgl = date('Y-m-d', $value['tgl_konfirmasi']) ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php $this->load->view('templates/footer.php'); ?>
        </div>
        <?php $this->load->view('templates/custom.php'); ?>
    </div>
    <?php $this->load->view('templates/js.php'); ?>
    <script>
        $('#table1').DataTable({
            "language": {
                "lengthMenu": "Tampilan _MENU_ baris per halaman",
                "zeroRecords": "Maaf - Data tidak ada yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ ke _PAGES_",
                "infoEmpty": "Data tidak tersedia",
                "infoFiltered": "(tersaring dari _MAX_ total baris)"
            },
            "columnDefs": [{
                    "targets": [2, 5, 6, 8, -1],
                    "orderable": false
                },
                {
                    "targets": [3, 5],
                    "className": "text-right"
                },
                {
                    "targets": [2, 7],
                    "className": "text-center"
                }
            ]
        });
    </script>
</body>

</html>