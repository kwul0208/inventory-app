<?php $session = \Config\Services::session();
?>


<div class="container-fluid">
    <?= $session->getFlashdata('sukses'); ?>

    <a href="<?= base_url('Admin/tambahSatuan') ?>" class="btn btn-primary mb-5">Tambah Satuan Barang</a>

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
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($satuanBarang as $sb) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $sb['satuan'] ?></td>
                                <td> <a href="hapusSatuanBarang/<?= $sb['id'] ?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>