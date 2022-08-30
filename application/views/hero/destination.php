<!-- Destination Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
            <h1>Explore Destination with us</h1>
        </div>
        <div class="row d-flex justify-content-center" style=" min-height: 60px;">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 mb-md-0">
                            <form class="d-flex" role="search" method="POST"
                                action="<?= base_url('hero/destination'); ?>">
                                <input class="form-control me-2" type="search" name="keyword" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($destinasi as $d) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="destination-item position-relative overflow-hidden mb-2">
                    <img width="400" height="200" src="<?= base_url('assets/destination/'.$d['gambar_w']); ?>" alt="">
                    <a class="destination-overlay text-white text-decoration-none"
                        href="<?= base_url('hero/detail_destinasi/'.$d['id_wisata']); ?>">
                        <h5 class="text-white"><?= $d['nama_wisata']; ?></h5>
                        <span><?= $d['nama_lokasi']; ?></span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Destination Start -->