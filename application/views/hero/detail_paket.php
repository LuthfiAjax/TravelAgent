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
            <div class="col-lg-6">
                <div class="position-relative">
                    <?php foreach($paket as $p) : ?>
                    <img class="img-fluid position-relative" src="<?= base_url('assets/paket/'.$p->gambar_kat); ?>"
                        style="object-fit: cover;">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Detail Paket Wisata</h6>
                    <?php foreach($paket as $p) : ?>
                    <h1 class="mb-3"><?= $p->nama_paket; ?></h1>
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Kategori : <?= $p->nama_kategori; ?></li>
                        <li class="list-group-item">Jumlah orang : <?= $p->orang; ?></li>
                        <li class="list-group-item">Durasi : <?= $p->durasi; ?> Hari</li>
                        <li class="list-group-item">Harga : <?= rupiah($p->harga); ?></li>
                    </ul>
                    <p class="text-justify mt-4">
                        <?= $p->ket_paket; ?>
                    </p>
                    <div class="row mb-4">
                        <div class="col-12">
                            <img class="img-fluid " src="<?= base_url('assets/paket/'.$p->gambar_p); ?>" alt="">
                        </div>
                    </div>
                    <?php 
                    $pesan = "*Hallo Admin REHOLTransport*,
Saya tertarik dengan paket wisata  *$p->nama_paket* 
dari kategori *$p->nama_kategori*"
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