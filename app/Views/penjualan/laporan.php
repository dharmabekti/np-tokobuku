<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= strtoupper($title) ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Laporan <?= $title ?></li>
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
                    Laporan <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Filter -->
                    <form action="/laporan/filter" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <input type="date" class="form-control" name="tgl_awal" id="tgl_awal"
                                        value="<?= $tanggal['tgl_awal'] ?>" title="Tanggal Awal">
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir"
                                        value="<?= $tanggal['tgl_akhir']  ?>" title="Tanggal Akhir">
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-secondary">Filter</button>
                                    <a onclick="exportExcel()" class="btn btn-primary"> Export Excel</a>
                                    <a onclick="exportPDF()" class="btn btn-warning">Export PDF</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <!-- Data Laporan -->
                    <table id="datatablesSimple" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sale Id</th>
                                <th>Tgl Transaksi</th>
                                <th>User</th>
                                <th>Customer</th>
                                <th>Total Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($result as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['sale_id'] ?></td>
                                <td><?= $value['tgl_transaksi'] ?></td>
                                <td><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>
                                <td><?= $value['nama_customer'] ?></td>
                                <td><?= number_to_currency($value['total'], 'IDR', 'id_ID', 2) ?></td>
                                <td>
                                    <a href="/laporan/detail/<?= $value['sale_id'] ?>" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script>
    function exportExcel() {
        let tgl1 = $('#tgl_awal').val()
        let tgl2 = $('#tgl_akhir').val()
        window.location.href = "/export-excel/" + tgl1 + "/" + tgl2
    }

    function exportPDF() {
        let tgl1 = $('#tgl_awal').val()
        let tgl2 = $('#tgl_akhir').val()
        window.location.href = "/export-pdf/" + tgl1 + "/" + tgl2
    }
    </script>
    <?= $this->endsection() ?>