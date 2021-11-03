<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url() ?>/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

</head>

<body>
    <h1 style="color: red; text-align:center">Riwayat Transaksi Keluar</h1>

    <table cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>Tanggal Pesanan</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($barang as $b) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $b['id'] ?></td>
                    <td><?= $b['tanggal'] ?></td>
                    <td><?= $b['nama_barang'] ?></td>
                    <td><?= $b['jenis_barang'] ?></td>
                    <td><?= $b['satuan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>