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
                    Tambah <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Form Data -->
                    <form action="/create-users" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-for  m-label">Nama Depan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="firstname">
                            </div>
                            <label for="name" class="col-sm-2 col-for  m-label">Nama Belakang</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="username">
                            </div>
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="role">
                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Admin">Admin</option>
                                </select>
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