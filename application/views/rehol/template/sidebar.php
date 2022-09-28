<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('admin'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Produk</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#service"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-reader"></i></div>
                        Service
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="service" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('admin/destinasi'); ?>">Destinasi Wisata</a>
                            <a class="nav-link" href="<?= base_url('admin/paket'); ?>">Paket Wisata</a>
                            <a class="nav-link" href="<?= base_url('admin/mobil'); ?>">Sewa Mobil</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Pembeli</div>
                    <a class="nav-link" href="<?= base_url('tampilan/testimoni'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                        Testimoni
                    </a>
                    <a class="nav-link" href="<?= base_url('tampilan/users'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Catatan Pembeli
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Category"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                        Category
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Category" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('Category'); ?>">Kategori Wisata</a>
                            <a class="nav-link" href="<?= base_url('Category/lokasi'); ?>">Lokasi Destinasi</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">internal</div>
                    <a class="nav-link" href="<?= base_url('admin/profil'); ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                        informasi perusahaan
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">

            </div>
        </nav>
    </div>