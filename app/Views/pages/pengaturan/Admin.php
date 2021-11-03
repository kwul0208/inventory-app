<div class="container-fluid">

    <a href="<?= base_url('Admin/tambahAdmin') ?>" class="btn btn-primary mb-4">Tambah Admin</a>

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
                                <td>hapus</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>