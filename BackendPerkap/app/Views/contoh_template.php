<?= $this->extend('layouts/admin_layouts') ?>


<?= $this->section('css') ?>

<!-- css tambahan taruh sini -->


<?= $this->endSection('css') ?>


<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Judul Templates</h4>
            </div>
        </div>
    </div>

    
    <!-- Isi Disini Content nya -->    
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>

<!-- script tambahan taruh sini -->
<script>
    $(document).ready(() => {
        console.log('hello world');
    });
</script>

<?= $this->endSection('script') ?>