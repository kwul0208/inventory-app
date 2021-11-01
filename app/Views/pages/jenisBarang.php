<div class="container-fluid">

    <a href="<?= base_url('Admin/tambahSatuan') ?>" class="btn btn-primary mb-5">Tambah Jenis Baru</a>

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
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($jenisBarang as $jb) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $jb['jenis'] ?></td>
                                <td>Hapus</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>