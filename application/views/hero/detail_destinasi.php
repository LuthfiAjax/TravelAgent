<!-- About Start -->
<div id="about" class="container-fluid py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <?php foreach($destinasi as $d) : ?>
                    <img class="position-absolute w-100 h-100"
                        src="<?= base_url('assets/destination/'.$d->gambar_lok); ?>" style="object-fit: cover;">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Detail Destinasi</h6>
                    <?php foreach($destinasi as $d) : ?>
                    <h1 class="mb-3"><?= $d->nama_wisata; ?></h1>
                    <p class="text-justify">Lokasi : <?= $d->nama_lokasi; ?></p>
                    <p class="text-justify"><?= $d->ket_wisata; ?></p>
                    <div class="row mb-4">
                        <div class="col-6">
                            <img class="img-fluid" src="<?= base_url('assets/destination/'.$d->gambar_w); ?>" alt="">
                        </div>
                    </div>
                    <?php 
                    $pesan = "*Hallo Admin REHOLTransport*,
                    Saya tertarik ke destinasi wisata  $d->nama_wisata"
                    ?>

                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=62811255661&text=
                        <?= urlencode($pesan); ?>" class="btn btn-primary mt-1"><i class="fab fa-whatsapp"></i>
                        Info
                        Selengkapnya!</a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->