<?= $this->extend('layouts/admin_layouts') ?>


<?= $this->Section('css') ?>
<style>
    .form-control:disabled {
        background: #f2f2f2
    }
</style>
<?= $this->endSection() ?>


<?= $this->Section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Penukaran Barang</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Form Penukaran</h4>
                    <p class="card-title-desc">Barang bisa ditukar jika sudah melakukan peminjaman.</p>
                    
                    
                    <?= form_open(site_url('/penukaran')) ?>
                    
                    
                        <?php if (session()->has('success')): ?>

                            <?=$this->Section('script')?>
                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    $(function() {
                                        Swal.fire({
                                            icon: 'success',
                                            title: '<?=session()->get('success')?>',
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
                                    });
                                </script>
                            <?=$this->endSection()?>

                        <?php endif;
                        
                        if (session()->has('error')): ?>

                            <?=$this->Section('script')?>
                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    $(function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: '<?=session()->get('error')?>',
                                            showConfirmButton: false,
                                            timer: 2000
                                        });
                                    });
                                </script>
                            <?=$this->endSection()?>

                        <?php endif ?>


                        <!-- Form Penukaran -->
                        <div class="mb-3 row">
                        
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="nrp_penukar" class="form-label">NRP Penukar</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control<?= array_key_exists('nrp_penukar', $validasi) ? ' is-invalid' : ''?>" name="nrp_penukar" id="nrp_penukar"
                                        placeholder="NRP Penukar" value="<?= old('nrp_penukar') ?>" autofocus>

                                    <div class="invalid-feedback">
                                        <?= array_key_exists('nrp_penukar', $validasi) ? $validasi['nrp_penukar'] : '' ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="barang_lama" class="form-label">ID Barang Lama</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control<?= array_key_exists('barang_lama', $validasi) ? ' is-invalid' : ''?>" name="barang_lama" id="barang_lama"
                                        placeholder="ID Barang Lama" value="<?= old('barang_lama') ?>">

                                    <div class="invalid-feedback">
                                        <?= array_key_exists('barang_lama', $validasi) ? $validasi['barang_lama'] : '' ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="barang_baru" class="form-label">ID Barang Baru</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control<?= array_key_exists('barang_baru', $validasi) ? ' is-invalid' : ''?>" name="barang_baru" id="barang_baru"
                                        placeholder="ID Barang Baru" value="<?= old('barang_baru') ?>">

                                    <div class="invalid-feedback">
                                        <?= array_key_exists('barang_baru', $validasi) ? $validasi['barang_baru'] : '' ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" name="submit"
                                            value="lihat">Lihat Ketersediaan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End form -->

                        <?php if (!session()->has('error') && session()->has('kirim_data')):
                            $get_kirimData = session()->get('kirim_data'); ?>

                            <?php if ($get_kirimData['cek_ketersediaan']): ?>
                                <hr style="border-color: #dcdcdc"/>

                                <?php if ($fetch_baranglama->peminjam != ''): ?>
                                    <!-- Output Ketersediaan -->
                                    <div class="row">
                                        <div class="col-lg-6 mt-3">
                                            <div class="text-center">
                                                <b>Barang Lama</b>
                                            </div>
                                            <table class="table table-bordered table-striped table-responsive mt-3">
                                                <thead>
                                                    <th>ID Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>NRP Peminjam</th>
                                                    <th>Nama Peminjam</th>
                                                </thead>
                                                <tbody>
                                                    <?php if ($barang_lama_rows == 0): ?>

                                                        <td>Tidak ditemukan</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>

                                                    <?php else: ?>

                                                        <td><?=htmlspecialchars($fetch_baranglama->id)?></td>
                                                        <td><?=htmlspecialchars($fetch_baranglama->nama_barang)?></td>
                                                        <td><?=htmlspecialchars($fetch_baranglama->peminjam)?></td>
                                                        <td><?= htmlspecialchars($fetch_baranglama->nama_peminjam) ?></td>

                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="col-lg-6 mt-3">
                                            <div class="text-center">
                                                <b>Ditukar Dengan</b>
                                            </div>

                                            <table class="table table-bordered table-striped table-responsive mt-3">
                                                <thead>
                                                    <th>ID Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>NRP Penukar</th>
                                                    <th>Nama Penukar</th>
                                                </thead>
                                                <tbody>
                                                    <?php if ($barang_baru_rows == 0): ?>

                                                        <td>Tidak ditemukan</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        
                                                    <?php else: ?>

                                                        <td><?=htmlspecialchars($fetch_barangbaru->id)?></td>
                                                        <td><?=htmlspecialchars($fetch_barangbaru->nama_barang)?></td>
                                                        <td><?=old('nrp_penukar')?></td>
                                                        <td><?= htmlspecialchars($nama_penukar) ?></td>

                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Output -->

                                    <div style="margin: 0 auto;max-width: 400px">

                                        <?php if ($fetch_barangbaru->peminjam != ''): ?>

                                            <div class="alert alert-danger m-2">
                                                Barang yang ingin ditukar belum dikembalikan.<br/>
                                                Pastikan barang sudah tersedia dan dikembalikan.
                                            </div>

                                        <?php else: ?>
                                            <div class="m-2">
                                                <div class="text-center">
                                                    <button class="btn btn-success" name="submit" value="tukar">Tukar Barang</button>
                                                </div>
                                            </div>
                                        <?php endif ?>

                                    </div>
                                <?php else: ?>

                                    <div class="alert alert-danger">
                                        Barang dengan ID <b><?=old('barang_lama')?></b> belum dipinjam. Silakan gunakan menu peminjaman.
                                    </div>

                                <?php endif ?>

                            <?php endif ?>

                        <?php endif ?>
                        

                    <?= form_close() ?>

                </div>
            </div>
        </div>
        <?= $this->endSection() ?>