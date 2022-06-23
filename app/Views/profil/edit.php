<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= strtoupper($title) ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><?= $title ?> Pengguna</li>
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
                    <i class="fas fa-table me-1"></i> <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Form Data -->
                    <form action="/profil/<?= user_id() ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-for  m-label">Nama Depan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="firstname" value="<?= $result['firstname'] ?>">
                            </div>
                            <label for="name" class="col-sm-2 col-for  m-label">Nama Belakang</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="lastname" value="<?= $result['lastname'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="username" value="<?= $result['username'] ?>">
                            </div>
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="email" value="<?= $result['email'] ?>">
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