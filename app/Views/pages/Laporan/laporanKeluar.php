<div class="container-fluid">

    <!-- Page Heading -->
    <?php $session = \Config\Services::session(); ?>

    <?php if ($session->get('role_id') === '1') : ?>
        <a href="<?= base_url('Admin/printLaporanKeluar') ?>" class="btn btn-danger mb-4">print PDF</a>
    <?php elseif ($session->get('role_id') === '2') : ?>
        <a href="<?= base_url('User/printLaporanKeluar') ?>" class="btn btn-danger mb-4">print PDF</a>
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
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($barang as $b) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
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