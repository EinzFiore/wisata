<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Member wisata</title>
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
    <h1>Laporan Data Member</h1>
    <h4>Pariwisata Kabupaten Purwakarta Telp.081282441221</h4>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telepon</th>
        </tr>
        <?php foreach ($member as $key => $value) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['gender']; ?></td>
                <td><?= $value['alamat']; ?></td>
                <td><?= $value['email']; ?></td>
                <td><?= $value['telepon']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>