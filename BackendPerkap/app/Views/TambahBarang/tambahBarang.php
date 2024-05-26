<?= $this->extend('layouts/admin_layouts') ?>

<?= $this->Section('CSS') ?>
    <style>
        
    </style>
<?= $this->endSection('CSS') ?>

<?= $this->Section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Tambah Barang</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Tambah Barang</h4>
                    <p class="card-title-desc">Mohon input Jenis barang terlebih dahulu!!</p>
                    <hr/>
                    <?= form_open("",array('id' => 'formInput'))?>
                    <div class="row mb-3">
                        <div class="col-2 pt-2">
                            <label for="inputBarang" id="labelInput">Input ID Barang</label>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="inputBarang" id="inputBarang" autofocus>
                        </div>
                        <button class="hidden" type="submit" name="submit" value="insert">Daftar</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <?php if(session()->getFlashdata('success')):?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert" id="alertSukses">
                <i class="uil uil-user-circle me-2"></i>
                <?= session()->getFlashdata('success')?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                endif;
                if(session()->getFlashdata('error')):
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertGagal">
                <i class="uil uil-user-circle me-2"></i>
                <?php 
                    echo session()->getFlashdata('error')['inputBarang'];
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->Section('script') ?>
<?= $this->endSection('script') ?>