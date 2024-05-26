<?= $this->extend('layouts/admin_layouts') ?>


<?= $this->section('css') ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= site_url('assets/libs/sweetalert2/sweetalert2.min.css') ?>">
<style>
    :root {
        --bs-light-rgb: 150, 150, 150;
    }

    #listBarang_wrapper {
        position: relative;
    }

    #listBarang_wrapper .top button.dt-button {
        border-radius: 4px;
    }

    #listBarang tr td:not(:last-child) {
        vertical-align: middle;
    }

    .custom-tooltip {
        --bs-tooltip-bg: var(--bs-primary);
    }

    @media (min-width: 640px) {
        #listBarang_wrapper .top {
            display: flex;
            justify-content: flex-end;
        }
    }
</style>

<?= $this->endSection('css') ?>


<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Peminjaman Barang</h4>
            </div>
        </div>
    </div>


    <main>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Form Peminjaman</h4>

                <?= form_open(site_url('peminjaman/pinjam'), ['id' => 'formPinjamBarang']) ?>
                <div class="row mb-3">
                    <div class="col-xxl-4 col-lg-5 col-12 mb-xl-0 mb-4 pt-lg-3">
                        <div class="form-inputs position-relative">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control form-control-lg" name="nrp" id="floatingNrpInput" placeholder="Masukkan NRP" maxlength="9" autofocus autocomplete="off" tabindex="1">
                                <label for="floatingNrpInput">NRP</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-lg" id="floatingBarcodeInput" placeholder="Enter Barcode" maxlength="11" autocomplete="off" tabindex="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Klik enter bila input manual" data-bs-container=".form-inputs">
                                <label for="floatingBarcodeInput">Barcode</label>
                            </div>
                        </div>
                        <!-- toast -->
                        <div class="toast-container position-static my-4 mx-auto">
                            <div class="toast text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                                <div class="toast-body d-flex justify-content-between">
                                    <span class="toast-content"></span>
                                    <button type="button" class="btn btn-close my-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="submit" name="pinjam" value="true" id="submitPinjamBarang" class="btn btn-lg btn-primary waves-effect waves-light w-md" style="letter-spacing: .08rem;" tabindex="3">PINJAM</button>
                        </div>
                    </div>
                    <div class="col-xxl-8 col-lg-7 col-12">
                        <div class="w-100 h-100 table-responsive">
                            <table class="table table-hover table-bordered w-100 pt-2" id="listBarang">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <th scope="row" colspan="2">Total</th>
                                    <th class="item-count"><span>0</span> item</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>


                <?= form_close() ?>

            </div>
        </div>
    </main>
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script src="<?= site_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="<?= site_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

<script>
    const CART = {
        KEY: 'cartPinjamBarang',
        contents: [],
        init() {
            let _contents = localStorage.getItem(CART.KEY);
            if (_contents) {
                CART.contents = JSON.parse(_contents);
                return
            }
            CART.contents = [];
            CART.sync();

        },
        sync() {
            if (CART.contents.length === 0) {
                localStorage.removeItem(CART.KEY);
                return
            }
            let _cart = JSON.stringify(CART.contents);
            localStorage.setItem(CART.KEY, _cart);
        },
        find(code) {
            let match = CART.contents.filter(item => item == code);
            if (match && match[0])
                return match[0];
        },
        add(code) {
            if (CART.find(code)) {
                showToast(`Barang dengan kode ${code} sudah pernah ditambahkan`);
                return;
            }
            if (code === '') {
                showToast('Silahkan scan barcode!');
                return;
            }
            CART.contents.push(code);
            CART.sync();
        },
        remove(code) {
            CART.contents = CART.contents.filter(item => item !== code);
            CART.sync();
        },
        empty() {
            CART.contents = [];
            CART.sync();
        },
        logContents(prefix) {
            console.log(prefix, CART.contents);
        },
        isEmpty() {
            return CART.contents.length == 0;
        }
    };

    $(document).ready(() => {
        CART.init();
        $('.item-count span').text(CART.contents.length);

        // $('#listBarang thead tr')
        //     .clone(true)
        //     .addClass('filters')
        //     .appendTo('#listBarang thead');

        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';

        let i = 1;
        const tableListBarang = $('#listBarang').DataTable({
            data: CART.contents.map(d => [i++, d]),
            lengthChange: false,
            paging: false,
            columns: [{
                data: 0,
                width: '15px'
            }, {
                data: 1,
                render: data => `<input type="text" name="codes[]" value="${data}" class="border-0 bg-transparent" readonly>`,
                orderable: false
            }, {
                data: 1,
                width: '80px',
                render: data => `<button type="button" class="btn btn-warning delete" data-code="${data}">Delete</button>`
            }],
            dom: '<"top"lB>rt<"bottom"p>',
            buttons: [{
                text: 'CLEAR',
                className: 'btn btn-danger clear',
                action: function() {
                    Swal.fire({
                        title: "Are you sure?",
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#34c38f",
                        cancelButtonColor: "#f46a6a",
                        confirmButtonText: "Yes, clear it!"
                    }).then(function(result) {
                        if (!result.isConfirmed)
                            return;
                        CART.empty();
                        updateTable(tableListBarang);
                    });
                }
            }],
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: 2
            }],
            order: [
                [0, 'desc']
            ],
            // bFilter: false,
            orderCellsTop: true,
            initComplete: function() {
                var api = this.api();
                // For each column
                // api
                //     .columns()
                //     .eq(0)
                //     .each(function(colIdx) {

                //         // Set the header cell to contain the input element
                //         var cell = $('.filters th').eq(
                //             $(api.column(colIdx).header()).index()
                //         );
                //         var title = $(cell).text();
                //         if (colIdx !== 1) {
                //             $(cell).html('');
                //             return;
                //         }
                //         $(cell).html('<input type="text" class="form-control" placeholder="' + title + '" />');

                //         // On every keypress in this input
                //         $('input',
                //                 $('.filters th').eq($(api.column(colIdx).header()).index())
                //             )
                //             .off('keyup change')
                //             .on('change', function(e) {
                //                 // Get the search value
                //                 $(this).attr('title', $(this).val());
                //                 var regexr = '({search})'; //$(this).parents('th').find('select').val();

                //                 var cursorPosition = this.selectionStart;
                //                 // Search the column for that value
                //                 api
                //                     .column(colIdx)
                //                     .search(
                //                         this.value != '' ?
                //                         regexr.replace('{search}', '(((' + `<input type="text" name="codes[]" value="${this.value}" class="border-0 bg-transparent" readonly>` + ')))') :
                //                         '',
                //                         this.value != '',
                //                         this.value == ''
                //                     )
                //                     .draw();
                //             })
                //             .on('keyup', function(e) {
                //                 e.stopPropagation();

                //                 $(this).trigger('change');
                //                 $(this)
                //                     .focus()[0]
                //                     .setSelectionRange(cursorPosition, cursorPosition);
                //             });
                //     });
            },
        });

        $('#listBarang').on('click', '.delete', function() {
            const codeBarang = $(this).data('code');
            CART.remove(codeBarang);
            updateTable(tableListBarang);
        });

        $('#formPinjamBarang').submit(event => {
            const currentActiveElementID = $(document.activeElement).attr('id');
            if (currentActiveElementID === 'submitPinjamBarang')
                return;

            event.preventDefault();
            if (currentActiveElementID === 'floatingNrpInput')
                return;

            const codeBarang = $('#' + currentActiveElementID).val();
            if (codeBarang === '') {
                showToast('Silahkan scan barcode!');
                return;
            }

            if (CART.find(codeBarang)) {
                showToast('Barang sudah ada di tabel!');
                $(`#${currentActiveElementID}`).val('');
                return;
            }

            $.ajax({
                url: '<?= site_url('peminjaman/check_item_availability') ?>',
                method: 'GET',
                data: {
                    code: codeBarang
                }
            }).done((data, textStatus, jqXHR) => {
                CART.add(codeBarang);
                updateTable(tableListBarang);
            }).fail((jqXHR, textStatus, errorThrown) => {
                showToast(jqXHR.responseJSON.error_message);
            }).always(() => {
                $('#' + currentActiveElementID).val('');
            });
        });

        function updateTable(table) {
            let i = 1;
            table.clear();
            table.rows.add(CART.contents.map(d => [i++, d]));
            table.draw();
            $('.item-count span').text(table.rows().count());
        }

        function showToast(msg) {
            $('.toast-content').text(msg);
            $('.toast').toast('show');
        }
    });
</script>

<?php if (session()->getFlashdata('errorMessage')) : ?>
    <?php
    $errorMessage = session()->getFlashdata('errorMessage');
    $html = "<div class='px-2 text-start'><ul>";
    if ($errorMessage['nrp'] != '') {
        $html .= '<li>' . $errorMessage['nrp'] . '</li>';
    }
    if ($errorMessage['codes'] != '') {
        $html .= '<li>' . $errorMessage['codes'] . '</li>';
    }
    $html .= "</ul></div>";
    ?>

    <script>
        Swal.fire({
            title: 'Error!!',
            icon: 'error',
            html: `<?= $html ?>`
        });
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <?php
    $successData = session()->getFlashdata('success');
    $successMessage = $successData['peminjam'] . ' berhasil meminjam ' . $successData['banyak_barang_dipinjam'] . ' barang';
    ?>
    <script>
        Swal.fire(
            'Berhasil!',
            '<?= $successMessage ?>',
            'success'
        );
        CART.empty();
        <?php foreach ($successData['barang_gagal_dipinjam'] as $code) : ?>
            CART.add('<?= $code ?>')
        <?php endforeach; ?>
        updateTable(tableListBarang);
    </script>
<?php endif; ?>

<?= $this->endSection('script') ?>