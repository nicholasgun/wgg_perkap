<?= $this->extend('layouts/admin_layouts') ?>

<?= $this->Section('css') ?>
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= site_url('assets/images/favicon.ico')?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables -->
    <link href="<?= site_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= site_url('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= site_url('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" /> 

    <!-- Bootstrap Css -->
    <link href="<?= site_url('assets/css/bootstrap.min.css')?>" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="<?= site_url('assets/css/icons.min.css')?>" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="<?= site_url('assets/css/app.min.css')?>" id="app-style" rel="stylesheet" type="text/css" />

<?= $this->endSection('css') ?>

<?= $this->Section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Daftar Barang</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card pt-3">
                <div class='col-12 px-4'>
                    <div class="row mt-2 px-3">
                        <?= form_open('/daftarBarang',['id'=>'formFilter']); ?>
                            <input type="hidden" name="_method" value="POST" />
                            <input type="hidden" name="filter" id="filter" value="semua" />
                        <?= form_close() ?>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnSemua" value="semua" autocomplete="off" <?php if($filter == 'semua') echo "checked" ?>>
                            <label class="btn btn-light" for="btnSemua">Semua barang</label>
                            
                            <input type="radio" class="btn-check" name="btnradio" id="btnPinjam" value="pinjam" autocomplete="off" <?php if($filter == 'pinjam') echo "checked" ?>>
                            <label class="btn btn-light" for="btnPinjam">Sedang dipinjam</label>
                            
                            <input type="radio" class="btn-check" name="btnradio" id="btnTidak" value="tidak" autocomplete="off" <?php if($filter == 'tidak') echo "checked" ?>>
                            <label class="btn btn-light" for="btnTidak">Belum Dipinjam</label>
                        </div>
                    </div>
                    <div class="col-12 p-3 table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id Barang</th>
                                    <th>Nama barang</th>
                                    <th>Peminjam</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($daftarBarang) == 0): //kalo kosong?>
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Belum ada data
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php 
                                $co = 1;
                                foreach($daftarBarang as $db): ?>
                                    <tr>
                                        <td><?= $co ?></td>
                                        <td><?= $db['id'] ?></td>
                                        <td><?= $db['nama']?></td>
                                        <td><?= $db['peminjam']?></td>
                                        <td>
                                            <?= form_open('/daftarBarang/'. $db['id']) ?>
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button class="btn btn-danger btn-delete" type="button"><span class="fas fa-trash"></span></button>
                                            <?= form_close(); ?>
                                        </td>
                                    </tr>
                                <?php 
                                    $co += 1;
                                    endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->Section('script') ?>

    <!-- JAVASCRIPT -->
    <script src="<?= site_url('assets/libs/jquery/jquery.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/metismenu/metisMenu.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/simplebar/simplebar.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/node-waves/waves.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/waypoints/lib/jquery.waypoints.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/jquery.counterup/jquery.counterup.min.js')?>"></script>

    <!-- Required datatable js -->
    <script src="<?= site_url('assets/libs/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>"></script>

    <!-- Buttons examples -->
    <script src="<?= site_url('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/jszip/jszip.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/pdfmake/build/pdfmake.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/pdfmake/build/vfs_fonts.js')?>"></script>
    <script src="<?= site_url('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/datatables.net-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')?>"></script>

    <!-- Responsive examples -->
    <script src="<?= site_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= site_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')?>"></script>
    
    <!-- App js -->
    <script src="<?= site_url('assets/js/app.js')?>"></script>

    <!-- Datatable init js -->
    <script src="<?= site_url('assets/js/pages/datatables.init.js')?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         $(document).ready(function() {
            // $("#datatable").DataTable();
            $(document).on('click','.btn-delete',function (e) {
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
            $(".btn-check").on("click",function(){
                let filter = $('input[name="btnradio"]:checked').val();
                $('#filter').val(filter);
                $('#formFilter').submit();
            })
            });
    </script>
<?= $this->endSection('script') ?>