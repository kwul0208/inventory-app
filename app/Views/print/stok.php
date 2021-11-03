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

        .pil {
            width: 40px;
            height: 50px;
            border-radius: 10px;
            margin-left: 10px;
            margin-right: 10px;
        }


        .max {
            background-color: rgb(191, 255, 191);
        }

        .avrg {
            background-color: rgb(252, 252, 155);
        }

        .min {
            background-color: rgb(255, 170, 170);
        }

        .row {
            display: flex;
            width: 200px;
        }
    </style>

</head>

<body>
    <h1 style="color: red; text-align:center">Stok Seluruh Barang</h1>

    <table cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($barang as $b) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $b['id'] ?></td>
                    <td><?= $b['nama_barang'] ?></td>
                    <td><?= $b['jenis_barang'] ?></td>
                    <?php if ($b['stok'] >= 10) :  ?>
                        <td class="max"><?= $b['stok'] ?></td>
                    <?php elseif ($b['stok'] <= 9 && $b['stok'] >= 1) :  ?>
                        <td class="avrg"><?= $b['stok'] ?></td>
                    <?php elseif ($b['stok'] = 0) :  ?>
                        <td class="min"><?= $b['stok'] ?></td>
                    <?php endif; ?>
                    <td><?= $b['satuan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="row">
        <div class="pil max">
        </div>
        Stok Optimal
    </div>
    <div class="row">
        <div class="pil avrg">
        </div>
        Stok Menipis
    </div>
    <div class="row">
        <div class="pil min">
        </div>
        Stok Habis
    </div>
</body>

</html>