<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<!-- About Start -->
<div id="about" class="container-fluid py-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute" style="max-width: 40rem;"
                        src="<?= base_url('assets/mobil/mobil.webp'); ?>" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Detail Mobil</h6>

                    <?php foreach($mobil as $m) : ?>
                    <h1 class="mb-3"><?= $m['nama_mobil']; ?></h1>
                    <div class="card mb-4" style="width: 16rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kapasita Orang : <?= $m['kapasitas']; ?></li>
                            <li class="list-group-item">Pemakaian : <?= $m['pemakaian']; ?></li>
                            <li class="list-group-item">Harga : <?= rupiah($m['harga']); ?></li>
                        </ul>
                    </div>
                    <p class="text-justify"><?= $m['ket_mobil']; ?></p>
                    <div class="row mb-4">
                        <div class="col-6">
                            <img class="img-fluid" src="<?= base_url('assets/mobil/'.$m['gambar_m']); ?>" alt="">
                        </div>
                    </div>
                    <?php 
                    $pesan = "*Hallo admin REHOLTransport*,
                    Saya tertarik untuk menyewa Mobil ".$m['nama_mobil'];
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