<?= $this->extend('layouts/admin_layouts') ?>

<?= $this->section('css') ?>

<?= $this->endSection('css') ?>

<?= $this->Section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Welcome, <?= session()->get('nama'); ?></h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Selamat Datang di Web Perkap</h4>

                    <?php 
                    $model = new \App\Models\PanitiaModel();
                    $isAuthorized = $model->where('nrp', session('nrp'))
                        ->whereIn('divisi', ['Information Technology', 'Perlengkapan', 'IT'])
                        ->countAllResults() > 0;
                    ?>
                    <?php if ($isAuthorized) : ?>
                        <p class="card-title-desc">Web yang didedikasikan untuk kamu, iyaa... kamu</p>
                    <?php else : ?>
                        <p class="card-title-desc">Maaf website ini bukan didedikasikan untuk kamu</p>
                    <?php endif ?>
                    <hr />

                    <div class="row mb-3">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>


    <?= $this->section('script') ?>

    <?= $this->endSection('script') ?>