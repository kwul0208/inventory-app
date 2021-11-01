<?php $validation = \Config\Services::validation() ?>
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-3">
        <div class="card-body p-0">
            <div class="p-5">

                <div class="form-group">
                    <form action="<?= base_url('Admin/saveJenis') ?>" method="POST">
                        <label for="jenis">Masukan Jenis Barang</label>
                        <input type="text" class="form-control form-control-user mt-3" id="jenis" name='jenis' placeholder="Jenis Barang">
                        <?= $validation->getError('jenis') ?>
                        <br />
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>