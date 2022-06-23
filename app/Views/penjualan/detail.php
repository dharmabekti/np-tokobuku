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
                    <!-- Data Detail Laporan -->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $total = 0;
                            $jml = 0;
                            foreach ($result as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['amount'] ?></td>
                                <td><?= number_to_currency($value['price'], 'IDR', 'id_ID', 2) ?></td>
                                <td><?= number_to_currency($value['total_price'], 'IDR', 'id_ID', 2) ?></td>
                            </tr>
                            <?php $total += $value['total_price'];
                                $jml += $value['amount'];
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?= $jml ?></td>
                                <td></td>
                                <td>
                                    <?= number_to_currency($total, 'IDR', 'id_ID', 2) ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <button class="btn btn-dark" onclick="window.history.back()">Kembali</button>
            <a href="/export-detail-laporan/<?= $result[0]['sale_id'] ?>" target="_blank"
                class="btn btn-warning">Cetak</a>
        </div>
    </main>
    <?= $this->endsection() ?>