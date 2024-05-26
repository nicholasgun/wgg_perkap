<?= $this->extend('layouts/admin_layouts') ?>

<?= $this->section('css') ?>
<link href="<?= site_url('assets/libs/bootstrap-editable/css/bootstrap-editable.css'); ?>" rel="stylesheet" type="text/css">
<!-- DataTables -->
<link href="<?= site_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= site_url('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />


<style>
    .w-10 {
        width: 10%;
    }

    .w-40 {
        width: 40%;
    }
</style>
<?= $this->endSection('css') ?>

<?= $this->Section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Log Peminjaman</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Log Peminjaman</h4>
                    <p class="card-title-desc">Log peminjaman diurutkan berdasarkan waktu pinjam dan waktu kembali paling baru (recent).</p>
                    <hr />

                    <!-- semua kode barang -->
                    <table id="datatable" class="table table-striped table-responsive mt-5">
                        <thead>
                            <th>No</th>
                            <th>ID Barang</th>
                            <th>Peminjam</th>
                            <th>Admin Peminjam</th>
                            <th>Waktu Pinjam</th>
                            <th>Admin Kembali</th>
                            <th>Waktu Kembali</th>
                        </thead>
                        <tbody>
                            <?php if (count($log) == 0) : //kalo kosong
                            ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Belum ada data
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach ($log as $i => $row) : ?>
                                <tr class="<?= !isset($row['waktu_kembali']) ? 'table-warning' : '' ?> ">
                                    <td>
                                        <?= $i + 1 ?>
                                    </td>
                                    <td><?= $row['id_barang'] ?></td>
                                    <td><?= $row['peminjam'] ?></td>
                                    <td><?= $row['admin_pinjam'] ?></td>
                                    <td><?= $row['waktu_pinjam'] ?></td>
                                    <td><?= $row['admin_kembali'] ?></td>
                                    <td><?= $row['waktu_kembali'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>


    <?= $this->section('script') ?>
        <!-- Required datatable js -->
        <script src="<?= site_url('assets/libs/datatables.net/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?= site_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
        <script>
            $(document).ready(() => {
                $('#datatable').DataTable();
            });
        </script>
    <?= $this->endSection('script') ?>