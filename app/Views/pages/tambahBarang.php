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
                        <form class="user" action="<?= base_url('Admin/saveBarang') ?>" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name='nama' placeholder="Nama Barang">
                                <?= $validation->getError('nama') ?>
                            </div>

                            <label for="satuan">Jenis Barang</label>
                            <div class="input-group mb-3">
                                <select class=" custom-select" id="jenis" name='jenis'>
                                    <option value="Baner" selected>Brosur</option>
                                    <option value="Stiker">Stiker</option>
                                    <option value="Banner">Stater Pack Banner</option>
                                </select>
                            </div>

                            <label for="satuan">Satuan</label>
                            <div class="input-group mb-3">
                                <select class=" custom-select" id="satuan" name='satuan'>
                                    <option value="Meter" selected>Meter</option>
                                    <option value="Liter">Liter</option>
                                    <option value="Box">Box</option>
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