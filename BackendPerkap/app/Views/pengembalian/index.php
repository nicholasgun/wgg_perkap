<?= $this->extend('layouts/admin_layouts') ?>


<?= $this->section('css') ?>

<!-- css tambahan taruh sini -->


<?= $this->endSection('css') ?>


<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0"><?= $title; ?></h4>
            </div>
        </div>
    </div>


    <!-- Isi Disini Content nya -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Form Pengembalian Barang</h4>
                    <p class="card-title-desc"></p>

                    <!-- alert succes/fail -->
                    <div id="resultMessage"></div>

                    <!-- form input kode barang baru -->
                    <?= form_open('', ["id" => "kembalikanBarang"]) ?>

                    <div class="row mb-3 mt-5">

                        <div class="col-md-2">
                            <label for="barcodeBarang" class="form-label">Barcode Barang</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="barcodeBarang" id="barcodeBarang" placeholder="Scan Disini" autocomplete="off" maxlength="11" autofocus>
                            <!-- label invalid feedback -->
                            <div class="invalid-feedback"></div>
                        </div>

                        <?= form_close() ?>


                        <!-- semua kode barang -->
                        <table class="table table-striped table-responsive mt-5">
                            <thead>
                                <th>Barcode Barang</th>
                                <th>NRP Peminjam</th>
                                <th>Nama Peminjam</th>
                                <th>Divisi</th>
                            </thead>
                            <tbody>
                                <td id="kodeTabel"></td>
                                <td id="nrpTabel"></td>
                                <td id="peminjamTabel"></td>
                                <td id="divisiTabel"></td>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>


    <?= $this->section('script') ?>

    <!-- script tambahan taruh sini -->
    <script>
        let csrf_token = '<?= csrf_token(); ?>';
        let csrf_hash = '<?= csrf_hash(); ?>';
        let kodeTabel = $("#kodeTabel");
        let nrpTabel = $("#nrpTabel");
        let peminjamTabel = $("#peminjamTabel");
        let divisiTabel = $("#divisiTabel")


        $(document).ready(function() {
            csrf_name = '<?= csrf_token() ?>';
            csrf_hash = $("input[name=<?= csrf_token() ?>]").val();

            // open ajax tabel
            $("#barcodeBarang").on('input', function() {
                $.ajax({
                        method: "POST",
                        url: "<?= site_url('/pengembalian/ajaxTabel'); ?>",
                        dataType: 'json',
                        data: {
                            [csrf_name]: $("input[name=<?= csrf_token() ?>]").val(),
                            idBarang: $("#barcodeBarang").val()
                        }
                    })
                    .done(function(data) {
                        $("input[name=<?= csrf_token() ?>]").val(data.new_hash);

                        // update html table
                        kodeTabel.html(data.id);
                        nrpTabel.html(data.peminjam);
                        peminjamTabel.html(data.nama_peminjam);
                        divisiTabel.html(data.divisi);
                    });
            });
            // close ajax

            // open ajax kembalikan barang
            $("#kembalikanBarang").submit(function(event) {
                event.preventDefault();
                $.ajax({
                        method: "POST",
                        url: "<?= site_url('/pengembalian/kembali'); ?>",
                        dataType: 'json',
                        data: {
                            [csrf_name]: $("input[name=<?= csrf_token() ?>]").val(),
                            idBarang: $("#barcodeBarang").val()
                        }
                    })
                    .done(function(data) {
                        // default gak is invalid
                        $(".invalid-feedback").html('');
                        $("#barcodeBarang").removeClass("is-invalid");

                        // isi alert 
                        if (data.success == true) {
                            $("#resultMessage").html('<div class="alert alert-success alert-dismissible text-center" role="alert">' + data.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        } 
                        // add class invalid input
                        else if(data.validation == true){
                            $("#barcodeBarang").addClass("is-invalid");
                            $(".invalid-feedback").html(data.message);
                        }
                        // alert gagal kembaliin barang
                        else {
                            $("#resultMessage").html('<div class="alert alert-danger alert-dismissible text-center" role="alert">' + data.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        }

                        // empty input
                        $("#barcodeBarang").val("");

                        // update csrf
                        $("input[name=<?= csrf_token() ?>]").val(data.new_hash);
                    });
            });
            // close ajax

        });
    </script>

    <?= $this->endSection('script') ?>