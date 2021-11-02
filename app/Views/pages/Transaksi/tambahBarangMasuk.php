<?php $validation = \Config\Services::validation(); ?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                        </div>
                        <form class="user" action="<?= base_url('Admin/savebarangMasuk') ?>" method="post">
                            <div class="input-group mb-3">
                                <select class=" custom-select" id="nama" name='nama'>
                                    <?php foreach ($barang as $b) : ?>
                                        <option value="<?= $b['nama_barang'] ?>" selected><?= $b['nama_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="stok">Jumblah</label>
                                <input type="text" class="form-control" id="stok" name='stok' placeholder="Jumblah Barang Masuk">
                                <?= $validation->getError('stok') ?>
                            </div>

                            <label for="satuan">Jenis Barang</label>
                            <div class="input-group mb-3">
                                <select class=" custom-select" id="jenis" name='jenis'>
                                    <?php foreach ($jenisBarang as $jB) : ?>
                                        <option value="<?= $jB['jenis'] ?>" selected><?= $jB['jenis'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <label for="satuan">Satuan</label>
                            <div class="input-group mb-3">
                                <select class=" custom-select" id="satuan" name='satuan'>
                                    <?php foreach ($satuanBarang as $sB) : ?>
                                        <option value="<?= $sB['satuan'] ?>" selected><?= $sB['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button class="btn btn-primary btn-user btn-block">
                                <?= $title ?>
                            </button>
                            <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>