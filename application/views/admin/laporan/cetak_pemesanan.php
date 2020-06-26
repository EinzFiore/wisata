<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pemesanan wisata</title>
    <style>
        body,
        table {
            margin: 20px auto;
        }

        table {
            border-collapse: collapse;
            border: 1px solid #333;
            font-family: 'Arial', sans-serif;
            font-size: 12px;
        }

        table tr,
        th,
        td {
            border: 1px solid #000;
            padding: 5px;
        }

        h1,
        h4 {
            text-align: center;
        }

        h4 {
            margin-top: -10px;
        }
    </style>
</head><body>
    <h1>Laporan Data Pemesanan wisata.</h1>
    <h4>Pariwisata Kabupaten Purwakarta Telp.081282441221</h4>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>wisata</th>
            <th>Harga</th>
            <th>Jumlah Tiket</th>
            <th>Total Pembayaran</th>
            <th>Tanggal Pembayaran</th>
            <th>Status Pembayaran</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
        </tr>
        <?php foreach ($pemesanan as $key => $value) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value['nama_member']; ?></td>
                <td><?= $value['nama_wisata']; ?></td>
                <td>Rp. <?= number_format($value['harga'], 0, ',', '.'); ?></td>
                <td><?= $value['lama']; ?></td>
                <td>Rp. <?= number_format($value['harga'] * $value['lama'], 0, ',', '.'); ?></td>
                <td><?= tgl_indo($value['tgl_bayar']); ?></td>
                <td>
                    <?php if ($value['status_pembayaran'] == "1") : ?>
                        <span>Lunas</span>
                    <?php else : ?>
                        <span>Tidak Lunas</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php $date = date('Y-m-d', $value['tgl_konfirmasi']); ?>
                    <?= tgl_indo($date); ?>
                </td>
                <td>
                    <?php $tanggal = date('Y-m-d', strtotime(+$value['lama'] . 'months', $value['tgl_konfirmasi']));  ?>
                    <?= tgl_indo($tanggal); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>