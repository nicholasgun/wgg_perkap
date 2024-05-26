<?= $this->extend('layouts/admin_layouts') ?>

<?= $this->section('css') ?>
<link href="<?= site_url('assets/libs/bootstrap-editable/css/bootstrap-editable.css'); ?>" rel="stylesheet" type="text/css">

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
                <h4 class="mb-0">Jenis Barang</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Form Jenis Barang</h4>
                    <p class="card-title-desc">Jenis Barang ditentukan dari 2 karakter awal kode barang.</p>
                    <hr />

                    <!-- form input kode barang baru -->
                    <?= form_open() ?>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="kodeBarang" class="form-label">Kode Barang (2-5 Huruf)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control <?= ($validasi && array_key_exists('kodeBarang', $validasi)) ? 'is-invalid' : '' ?>" name="kodeBarang" id="kodeBarang" placeholder="Kode Barang" value="<?= old('kodeBarang') ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= ($validasi && array_key_exists('kodeBarang', $validasi)) ? $validasi['kodeBarang'] : '' ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="namaBarang" class="form-label">Nama Barang</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control <?= ($validasi && array_key_exists('namaBarang', $validasi)) ? 'is-invalid' : '' ?>" name="namaBarang" id="namaBarang" placeholder="Nama Barang" value="<?= old('namaBarang') ?>">
                            <div class="invalid-feedback">
                                <?= ($validasi && array_key_exists('namaBarang', $validasi)) ? $validasi['namaBarang'] : '' ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success" name="submit" value="tambah">TAMBAH</button>
                                <?php if (session()->getFlashdata('success')) : ?>
                                    <!-- Kalo sukses nambah data -->
                                    <div class="alert alert-success alert-dismissible mt-3" role="alert">
                                        <?= session()->getFlashdata('success') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <!-- Kalo gagal tambah data -->
                                    <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?= form_close() ?>


                    <!-- semua kode barang -->
                    <table class="table table-striped table-responsive mt-5">
                        <thead>
                            <th class="w-10">No</th>
                            <th class="w-25">Kode</th>
                            <th class="w-50">Nama</th>
                            <th class="w-10">Delete</th>
                        </thead>
                        <tbody>
                            <?php if (count($jenisBarang) == 0) : //kalo kosong
                            ?>
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Belum ada data
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach ($jenisBarang as $i => $row) : ?>
                                <tr>
                                    <td>
                                        <?= $i + 1 ?>
                                    </td>
                                    <td>
                                        <a href="#" id="<?= $row['id'] ?>" data-type="text" data-pk="<?= $row['id'] ?>" data-url="<?= site_url('/jenisBarang/' . $row['id']) ?>" data-placeholder="Kode Barang"><?= $row['id'] ?></a>
                                    </td>
                                    <td>
                                        <a href="#" id="<?= $row['id'] . "-nama" ?>" data-type="text" data-pk="<?= $row['id'] ?>" data-url="<?= site_url('/jenisBarang/' . $row['id']) ?>" data-placeholder="Nama Barang"><?= $row['nama'] ?></a>
                                    </td>
                                    <td>
                                        <?= form_open("/jenisBarang/" . $row['id']) ?>
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="btn btn-danger btn-delete" type="button"><span class="fas fa-trash"></span></button>
                                        <?= form_close(); ?>
                                    </td>
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

    <!-- Xeditable -->
    <script src=<?= site_url('assets/libs/bootstrap-editable/js/index.js') ?>></script>
    <script src=<?= site_url('assets/libs/moment/min/moment.min.js') ?>></script>
    <script src=<?= site_url('assets/js/pages/form-xeditable.init.js') ?>></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        csrf_name = '<?= csrf_token() ?>';
        csrf_hash = $("input[name=<?= csrf_token() ?>]").val();

        $(document).ready(() => {
            //init Xeditable
            $.fn.editable.defaults.mode = 'inline';

            <?php //Update fieldnya pake ajax disetting lewat sini 
            ?>
            <?php foreach ($jenisBarang as $i => $row) : ?>
                //kode barang
                $('#<?= $row['id'] ?>').editable({
                    validate: function(value) {
                        if ($.trim(value) == '') {
                            return 'This field is required';
                        }
                        if (value.length != 2) {
                            return 'Kode Barang Harus 2 karakter';
                        }
                    },
                    params: function(params) {
                        params[csrf_name] = $("input[name=<?= csrf_token() ?>]").val();
                        params._method = "PUT";
                        params.newKode = true;
                        return params
                    },
                    success: function(response, newValue) {
                        <?php //update csrf token 
                        ?>
                        responseObj = JSON.parse(response);
                        $("input[name=<?= csrf_token() ?>]").val(responseObj.new_hash);

                        if (!responseObj.success) {
                            return responseObj.msg.value;
                        } else {
                            window.location.reload();
                        }
                    }
                });

                //nama barang
                $('#<?= $row['id'] . "-nama" ?>').editable({
                    validate: function(value) {
                        if ($.trim(value) == '') {
                            return 'This field is required';
                        }
                    },
                    params: function(params) {
                        params[csrf_name] = $("input[name=<?= csrf_token() ?>]").val();
                        params._method = "PUT";
                        params.newNama = true;
                        return params
                    },
                    success: function(response, newValue) {
                        <?php //update csrf token 
                        ?>
                        responseObj = JSON.parse(response)
                        $("input[name=<?= csrf_token() ?>]").val(responseObj.new_hash);

                        if (!responseObj.success) return responseObj.msg.value;
                    }
                });
            <?php endforeach; ?>

            //confirm delete jenisBarang
            $(".btn-delete").click(function(e) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'

                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent().submit();
                    }
                });
            })
        });
    </script>

    <?= $this->endSection('script') ?>