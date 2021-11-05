<?php $session = \Config\Services::session(); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if ($session->get('role_id') === '1') : ?>
        <a href="<?= base_url('Admin/printStokBarang') ?>" class="btn btn-danger mb-4">print PDF</a>
    <?php elseif ($session->get('role_id') === '2') : ?>
        <a href="<?= base_url('User/printStokBarang') ?>" class="btn btn-danger mb-4">print PDF</a>
    <?php endif; ?>


    <!-- DataTales Example -->
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
            </div>
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
        </div>
    </div>
</div>