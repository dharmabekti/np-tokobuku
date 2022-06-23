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
                    List <?= $title ?>
                </div>
                <div class="card-body">
                    <!-- Grocery CRUD -->
                    <div style="padding: 10px">
                        <?php echo $result->output; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?= $this->endsection() ?>