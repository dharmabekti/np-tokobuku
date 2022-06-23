<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= strtoupper($title) ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengelolaan <?= $title ?></li>
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
                    List <?= $title ?>
                </div>
                <div class="card-body">
                    <a href="<?= route_to('tambah-buku') ?>" class="btn btn-primary mb-3"><i
                            class="fas fa-plus-circle"></i> Tambah Data</a>
                    <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modal-import"><i
                            class="fas fa-upload"></i> Import Data</button>
                    <table id="datatablesSimple" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kover</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_book as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="/img/<?= $value['cover'] ?>" alt="" width="100px">
                                </td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['name_category'] ?></td>
                                <td><?= $value['price'] ?></td>
                                <td>
                                    <a href="book-detail/<?= $value['slug'] ?>" class="btn btn-info text-white">
                                        <i class="fas fa-info-circle"></i>
                                        Detail</a>
                                    <a href="<?= route_to('ubah-buku', $value['slug']) ?>"
                                        class="btn btn-warning text-white"><i class="fas fa-edit"></i> Ubah</a>
                                    <form action="<?= route_to('delete-buku', $value['book_id']) ?>" method="post"
                                        class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data?')"><i
                                                class="fas fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?= $this->include('book/modal') ?>
    <?= $this->endsection() ?>