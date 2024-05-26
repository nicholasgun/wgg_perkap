<?= $this->extend('layouts/admin_layouts') ?>


<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
<style>
    table tr:first-child th {
        border-top: none;
    }
</style>
<?= $this->endSection('css') ?>


<?= $this->section('content') ?>
<main class="container">
    <div class="d-flex gap-3 mb-4">
        <?php if (session()->has('response')) : ?>
            <?php $response = session()->getFlashdata('response'); ?>
            <div class="alert alert-<?= ($response['isSuccess']) ? 'success' : 'danger' ?> flex-grow-1 text-center mb-0 py-2 mx-5"><?= $response['message'] ?></div>
        <?php else : ?>
            <div class="flex-grow-1 text-center mb-0 py-2 mx-5"></div>
        <?php endif ?>
        <?= form_open('dataPanitia/syncCommittees', ['method' => 'POST']) ?>
        <button type="submit" class="btn btn-primary">SYNC Panitia</button>
        <?= form_close() ?>
    </div>

    <table id="dataPanitia">
        <thead>
            <th>id</th>
            <th>nama</th>
            <th>nrp</th>
            <th>divisi</th>
        </thead>
        <tbody>
            <?php foreach ($panitia as $p) : ?>
                <tr>
                    <td><?= $p['row_num'] ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['nrp'] ?></td>
                    <td><?= $p['divisi'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(() => {
        $('#dataPanitia').DataTable();
    });
</script>
<?= $this->endSection('script') ?>