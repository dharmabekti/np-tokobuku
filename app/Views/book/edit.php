<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= strtoupper($title) ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengelolaan <?= $title ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Ubah <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Form Data -->
                    <form action="<?= route_to('update-buku', $result['book_id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" value="<?= $result['slug'] ?>" name="slug_lama">
                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" name="title" value="<?= old('title', $result['title']) ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('title') ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="author" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="author" value="<?= old('author', $result['author']) ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="book_category_id" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="book_category_id">
                                    <?php foreach ($book_category as $value) : ?>
                                        <option value="<?= $value['book_category_id'] ?>" <?= old('book_category_id', $result['book_category_id']) == $value['book_category_id'] ? 'selected' : '' ?>>
                                            <?= $value['name_category'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="release_year" class="col-sm-2 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="release_year" value="<?= old('release_year', $result['release_year']) ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="price" value="<?= old('price', $result['price']) ?>">
                            </div>
                            <label for="discount" class="col-sm-2 col-form-label">Diskon</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="discount" value="<?= old('discount', $result['discount']) ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="cover" class="col-sm-2 col-form-label">Kover</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control <?= $validation->hasError('cover') ? 'is-invalid' : '' ?>" name="cover" id="cover" value="<?= old('cover') ?>" onchange="previewImage()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('cover') ?>
                                </div>
                                <div class="col-md-6">
                                    <img src="/img/<?= $result['cover'] != null ? $result['cover'] : 'default.png' ?>" alt="" class="img-preview img-thumbnail">
                                </div>
                            </div>
                            <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="stock" value="<?= old('stock', $result['stock']) ?>">
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                    </form>
                    <!--  -->
                </div>
            </div>
        </div>
    </main>
    <?= $this->endsection() ?>