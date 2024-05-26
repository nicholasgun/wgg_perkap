<!-- Sidebar Menu -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="<?= site_url('/') ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= site_url('assets/images/web-perkap-sm.png') ?>" alt="" height="28">
            </span>
            <span class="logo-lg">
                <img src="<?= site_url('assets/images/web-perkap.png') ?>" alt="" height="27">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <div id="sidebar-menu">
            <?php 
            $model = new \App\Models\PanitiaModel();
            $isAuthorized = $model->where('nrp', session('nrp'))
                ->whereIn('divisi', ['Information Technology', 'Perlengkapan', 'IT'])
                ->countAllResults() > 0;
            ?>

            <?php if ($isAuthorized) : ?>
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Tambah</li>
                <li>
                    <a href="<?= site_url('/tambahBarang')?>">
                        <i class="uil-plus-circle"></i>
                        <span>Barang</span>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('/jenisBarang')?>">
                        <i class="uil-bars"></i>
                        <span>Jenis Barang</span>
                    </a>
                </li>


                <li class="menu-title">Kelola</li>
                <li>
                    <a href="<?=site_url('/daftarBarang')?>">
                        <i class="uil-apps"></i>
                        <span>Daftar Barang</span>
                    </a>
                </li>

                <li>
                    <a href="<?= site_url('peminjaman') ?>">
                        <i class="uil-book-alt"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>

                <li>
                    <a href="<?= site_url('penukaran') ?>">
                        <i class="uil-redo"></i>
                        <span>Penukaran</span>
                    </a>
                </li>

                <li>
                    <a href="<?=site_url('pengembalian')?>">
                        <i class="uil-check-circle"></i>
                        <span>Pengembalian</span>
                    </a>
                </li>

                <li class="menu-title">Lainnya</li>
                <li>
                    <a href="<?=site_url('log')?>">
                        <i class="uil-layers-alt"></i>
                        <span>Log</span>
                    </a>
                </li>

                <?php if (in_array(session('nrp'), ['c14210025', 'c14200078', 'c14210017', 'c14210073', 'c14220210', 'c14220061'])): ?>
                    <li>
                        <a href="<?=site_url('dataPanitia')?>">
                            <i class="uil-users-alt"></i>
                            <span>Data Panitia</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="<?=site_url('logout')?>">
                        <i class="uil-sign-out-alt"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End Sidebar -->