<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= strtoupper($title) ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Transaksi <?= $title ?></li>
            </ol>
            <!-- Alert -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('warning')) : ?>
                <div class="alert alert-warning" role="alert">
                    <?= session()->getFlashdata('warning') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <!--  -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Transaksi <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Halaman POS -->
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Tanggal:</label>
                                <input type="date" value="<?= date('Y-m-d') ?>" disabled>
                            </div>
                            <div class="col">
                                <label class="col-form-label">User:</label>
                                <input type="text" value="<?= user()->username ?>" disabled>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Customer:</label>
                                <input type="text" id="nama-customer" disabled>
                                <input type="hidden" id="id-customer">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-book">Pilih Produk</button>
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-customer">Pilih Customer</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Diskon</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detail_cart">
                            <tr>
                                <td colspan="7">Belum ada transaksi</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label class="col-form-label">Total Bayar</label>
                                <h1><span id="spanTotal">Rp 0,-</span></h1>
                            </div>
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label">Nominal</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="nominal" autocomplete="off">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-4 col-form-label">Kembalian</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="kembalian" disabled>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-success" onclick="bayar()">Proses Bayar</button>
                                    <button class="btn btn-secondary" onclick="location.reload()">Transaksi Baru</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?= $this->include('penjualan/modal-book') ?>
    <?= $this->include('penjualan/modal-customer') ?>

    <script>
        function load() {
            $('#detail_cart').load('load-cart-jual')
            $('#spanTotal').load('load-total-jual')
        }

        $(this).keydown(function(e) {
            if (e.keyCode === 40) {
                e.preventDefault()
                $('#modal-book').modal('show');
                $('#modal-customer').modal('hide');
                var table = $('#datatablesSimple').DataTable();

                table.on('draw', function() {
                    alert('Table redrawn');
                });
                // var table = $('#datatablesSimple').DataTable();
                // $('div.dataTables_search input', table.table().container()).focus();
                // $("#datatablesSimple [type='search']").focus();
                // $('div.dataTables_filter input').focus();
            }
            if (e.keyCode === 38) {
                e.preventDefault()
                $('#modal-customer').modal('show');
                $('#modal-book').modal('hide');
            }
            if (e.keyCode === 27) {
                e.preventDefault()
                location.reload()
            }
            if (e.keyCode === 121) {
                e.preventDefault()
                $('#nominal').focus()
            }
            if (e.keyCode === 13) {
                e.preventDefault()
                bayar()
            }
        })

        $(document).on('click', '.hapus_cart', function() {
            var rowid = $(this).attr('id')
            $.ajax({
                url: "/delete-cart-jual/" + rowid,
                method: "delete",
                success: function(data) {
                    load()
                }
            });
        });

        $(document).on('click', '.edit_cart', function() {
            var rowid = $(this).attr('id')
            var qty = $(this).attr('qty')
            $('#rowid').val(rowid)
            $('#qty').val(qty)
            $('#modal-update-book').modal('show');
        });

        // Pembayaran
        function bayar() {
            var nominal = $('#nominal').val()
            var customer = $('#id-customer').val()

            $.ajax({
                url: '/pembayaran',
                method: 'post',
                data: {
                    'nominal': nominal,
                    'customer': customer
                },
                success: function(response) {
                    var result = JSON.parse(response)
                    // alert(result.msg)
                    swal({
                        title: result.msg,
                        icon: result.status == true ? 'success' : 'warning'
                    });

                    if (result.status) {
                        load()
                        $('#kembalian').val(result.kembalian);
                        $('#nominal').val('')
                        $('#nama-customer').val('')
                        $('#id-customner').val('')
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    </script>
    <?= $this->endsection() ?>