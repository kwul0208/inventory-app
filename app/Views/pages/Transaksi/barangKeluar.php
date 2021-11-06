<?php $session = \Config\Services::session();
?>


<div class="container-fluid">
    <?= $session->getFlashdata('sukses'); ?>

    <a href="<?= base_url('Admin/tambahBarangKeluar') ?>" class="btn btn-primary mb-5">Tambah Barang Keluar</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
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
                                <td><?= $b['tanggal'] ?></td>
                                <td><?= $b['nama_barang'] ?></td>
                                <td><?= $b['jenis_barang'] ?></td>
                                <td><?= $b['stok'] ?></td>
                                <td><?= $b['satuan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>