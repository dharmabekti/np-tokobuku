<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Beranda
                </a>

                <div class="sb-sidenav-menu-heading">TRANSAKSI</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Penjualan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/jual">Transaksi</a>
                        <a class="nav-link" href="/laporan">Laporan</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">DATA MASTER</div>
                <?php if (has_permission('data-buku')) : ?>
                    <a class="nav-link" href="/book">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Data Buku
                    </a>
                <?php endif; ?>


                <?php if (has_permission('data-galeri')) : ?>
                    <a class="nav-link" href="/galeri">
                        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                        Data Galeri
                    </a>
                <?php endif; ?>

                <?php if (has_permission('data-supplier')) : ?>
                    <a class="nav-link" href="/supplier">
                        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                        Data Supplier
                    </a>

                <?php endif; ?>

                <?php if (has_permission('data-customer')) : ?>
                    <a class="nav-link" href="/customer">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data Customer
                    </a>
                <?php endif; ?>

                <?php if (has_permission('data-users')) : ?>
                    <a class="nav-link" href="/users">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        Data Users
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?= user()->firstname ?> <?= user()->lastname ?>
        </div>
    </nav>
</div>