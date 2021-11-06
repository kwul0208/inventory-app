<?php $session = \Config\Services::session();
?>


<div class="container-fluid">
    <?= $session->getFlashdata('sukses'); ?>

    <a href="<?= base_url('Admin/tambahUser') ?>" class="btn btn-primary mb-4">Tambah User</a>

    <!-- Page Heading -->

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
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($pengguna as $p) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['email'] ?></td>
                                <td>
                                    <a href="hapusUser/<?= $p['id'] ?>" class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>