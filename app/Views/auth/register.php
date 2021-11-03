<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/sb-admin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
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
                            <form class="user" action="<?= base_url('Auth/newUser') ?>" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama" name='nama' placeholder="Nama">

                                    <?php if ($validation->getError('nama')) : ?>
                                        <?= $validation->getError('nama') ?>
                                    <?php endif; ?>

                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name='email' placeholder="Alamat Email">

                                    <?php if ($validation->getError('email')) : ?>
                                        <?= $validation->getError('email') ?>
                                    <?php endif; ?>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password 1">
                                        <?php if ($validation->getError('password1')) : ?>
                                            <?= $validation->getError('password1') ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                        <?php if ($validation->getError('password2')) : ?>
                                            <?= $validation->getError('password2') ?>
                                        <?php endif; ?>
                                    </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/sb-admin/js/sb-admin-2.min.js"></script>

</body>

</html>