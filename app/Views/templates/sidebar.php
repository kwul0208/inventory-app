<!-- load session -->
<?php $session = \Config\Services::session(); ?>

<?php if ($session->get('role_id') === '1') : ?>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
            <div class="sidebar-brand-icon">
                <i class="fas fa-warehouse"></i>
            </div>
            <div class="sidebar-brand-text mx-3">My Gudang</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('Admin') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->

        <!-- role for user -->
        <div class="sidebar-heading">
            Menu Utama
        </div>

        <!-- Nav Item - Data Master Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-database"></i>
                <span>Data Master</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Data: </h6>
                    <a class="collapse-item" href="<?= base_url('Admin/dataBarang') ?>">Data Barang</a>
                    <a class="collapse-item" href="<?= base_url('Admin/jenisBarang') ?>">Jenis Barang</a>
                    <a class="collapse-item" href="<?= base_url('Admin/satuanBarang') ?>">Satuan</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Transaksi Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-funnel-dollar"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Transaksi:</h6>
                    <a class="collapse-item" href="<?= base_url('Admin/barangMasuk') ?>">Barang Masuk</a>
                    <a class="collapse-item" href="<?= base_url('Admin/barangKeluar') ?>">Barang Keluar</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Laporan Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                <i class="fas fa-book"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Laporan:</h6>
                    <a class="collapse-item" href="<?= base_url('Admin/laporanStok') ?>">Stok Barang</a>
                    <a class="collapse-item" href="<?= base_url('Admin/laporanStokMasuk') ?>">Barang Masuk</a>
                    <a class="collapse-item" href="<?= base_url('Admin/laporanStokKeluar') ?>">Barang Keluar</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Lainnya
        </div>

        <!-- Nav Item - Pengaturan Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola User:</h6>
                    <a class="collapse-item" href="<?= base_url('Admin/dataAdmin') ?>">Admin</a>
                    <a class="collapse-item" href="<?= base_url('Admin/dataUser') ?>">User</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Auth/logOut') ?>">
                <i class="fas fa-sign-out-alt fa-flip-horizontal"></i>
                <span>Log Out</span>
            </a>
        </li>

        <!-- togle hide -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

<?php elseif ($session->get('role_id') === '2') : ?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
            <div class="sidebar-brand-icon">
                <i class="fas fa-warehouse"></i>
            </div>
            <div class="sidebar-brand-text mx-3">My Gudang</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('User') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <div class="sidebar-heading">
            Menu Utama
        </div>


        <!-- Nav Item - Laporan Menu -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                <i class="fas fa-book"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Laporan:</h6>
                    <a class="collapse-item" href="<?= base_url('User/laporanStok') ?>">Stok Barang</a>
                    <a class="collapse-item" href="<?= base_url('User/laporanStokMasuk') ?>">Barang Masuk</a>
                    <a class="collapse-item" href="<?= base_url('User/laporanStokKeluar') ?>">Barang Keluar</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Lainnya
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Auth/logOut') ?>">
                <i class="fas fa-sign-out-alt fa-flip-horizontal"></i>
                <span>Log Out</span>
            </a>
        </li>

        <!-- togle hide -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

<?php endif; ?>