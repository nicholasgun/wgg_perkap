<!-- Header Section -->
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="<?=site_url('/')?>" class="logo logo-dark">
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

            <?=form_open(site_url('/'), ['method' => 'get', 'class' => 'app-search d-none d-lg-block'])?>
                <div class="position-relative">
                    <input type="text" name="barang" class="form-control" placeholder="Cari barang ...">
                    <span class="uil-search"></span>
                </div>
            <?=form_close()?>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <a href="" title="Keluar">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="uil-sign-out-alt"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- End Header Section -->