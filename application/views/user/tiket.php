<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Wisata</title>
    <style>
        body,
        table {
            margin: 10px auto;
        }

        table {
            border-collapse: collapse;
            border: 1px solid #000;
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            width: 70%;
        }

        table tr,
        th,
        td {
            border: 1px solid #000;
            padding: 10px;
        }

        h3,
        h4 {
            text-align: center;
        }

        h4 {
            margin-top: -5px;
        }
    </style>
</head><body>
    <h3>Tiket Wisata</h3>
    <h4>Kabupaten Purwakarta Telp.081282441221</h4>
    <?php foreach ($pemesanan as $value) : ?>
        <?php endforeach; ?>

     <table border="0">
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td><?= $value['nama_member']; ?></td>
            </tr>
            <tr>
                <th>Wisata</th>
                <td>:</td>
                <td><?= $value['nama_wisata']; ?></td>
            </tr>
            <tr>
                <th>Jumlah Tiket</th>
                <td>:</td>
                <td><?= $value['lama']; ?> Tiket</td>
            </tr>
            <tr>
                <th>Pembayaran</th>
                <td>:</td>
                <td><b>LUNAS</b></td>
            </tr>

    </table>
</body></html>