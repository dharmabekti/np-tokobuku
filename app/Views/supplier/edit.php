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
                    <form action="/edit-supplier/<?= $result->supplier_id ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-for  m-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?= $result->name ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" value="<?= $result->address ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" value="<?= $result->email ?>">
                            </div>
                            <label for="phone" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="phone" value="<?= $result->phone ?>">
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                    </form>
                    <!--  -->
                </div>
            </div>
        </div>
    </main>
    <?= $this->endsection() ?>