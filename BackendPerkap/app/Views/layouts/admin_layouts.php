<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        <?=(isset($title) && $title != '' ? $title . ' | ' : '') ?> Web Perkap WGG 2023
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Web Perkap untuk mengelola data peminjaman, penukaran, dan pengembalian barang pada perkap WGG 2023" name="description" />
    <meta content="Perkap WGG 2023" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="<?= site_url('assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= site_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= site_url('assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        body[data-sidebar-size=sm] {
            min-height: auto;
        }
    </style>
    <?= $this->renderSection('css') ?>
</head>
<body>
    
    <div id="layout-wrapper">

        <?=$this->include('layouts/header_admin.php')?>
        <?=$this->include('layouts/sidebar_admin.php')?>

        <div class="main-content">
            <div class="page-content">
                <?=$this->renderSection('content')?>
            </div>

            <?=$this->include('layouts/footer_admin.php')?>
        </div>
    </div>

    <script src="<?=site_url('assets/libs/jquery/jquery.min.js')?>"></script>
    <script src="<?=site_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=site_url('assets/libs/metismenu/metisMenu.min.js')?>"></script>
    <script src="<?=site_url('assets/libs/simplebar/simplebar.min.js')?>"></script>
    <script src="<?=site_url('assets/libs/node-waves/waves.min.js')?>"></script>
    <script src="<?=site_url('assets/libs/waypoints/lib/jquery.waypoints.min.js')?>"></script>
    <script src="<?=site_url('assets/libs/jquery.counterup/jquery.counterup.min.js')?>"></script>
    <?= $this->renderSection('script') ?>

    <script src="<?=site_url('assets/js/app.js')?>"></script>
</body>
</html>