<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Wisata</title>
    <style>
        body,
        table {
            margin: 30px auto;
        }

        table {
            border-collapse: collapse;
            border: 1px solid #000;
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
    <h1>Laporan Data Wisata</h1>
    <h4>Pariwisata Kabupaten Purwakarta Telp.081282441221</h4>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Harga</th>
            <th>Jam Operasional</th>
            <th>Lokasi</th>
        </tr>
        <?php foreach ($wisata as $key => $value) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['jenis_wisata']; ?></td>
                <td><?= $value['status']; ?></td>
                <td>Rp. <?= number_format($value['harga'], 0, ',', '.'); ?></td>
                <td><?= $value['jam_buka'] . ' - ' . $value['jam_tutup'] ?></td>
                <td><?= $value['lokasi']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>