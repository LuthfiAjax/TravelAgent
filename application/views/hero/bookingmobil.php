<!-- Boking Mobil Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Sewa Mobil</h6>
            <h1>Tentukan Mobil Pilihan Kalian</h1>
        </div>
        <div class="row d-flex justify-content-center" style=" min-height: 60px;">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 mb-md-0">
                            <form class="d-flex" role="search" method="POST"
                                action="<?= base_url('hero/bookingmobil'); ?>">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                    name="keyword">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($mobil as $m) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img width="400" height="200" src="<?= base_url('assets/mobil/'.$m['gambar_m']) ?>" alt="">
                    <a class="destination-overlay text-white text-decoration-none"
                        href="<?= base_url('sewa-mobil/'.$m['id_mobil'].'/'.$m['slug']); ?>">
                        <h5 class="text-white"><?= $m['nama_mobil']; ?></h5>
                        <span><?= $m['kapasitas']; ?> Orang</span>
                        <!-- sewa-mobil/' -->
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Boking Mobil End -->