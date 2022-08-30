<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<!-- Packages Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
            <h1>Top Tour Packages</h1>
        </div>
        <div class="row d-flex justify-content-center" style=" min-height: 60px;">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 mb-md-0">
                            <form class="d-flex" role="search" method="POST" action="<?= base_url('hero/paket'); ?>">
                                <select class="form-control me-2" aria-label="Default select example" name="keyword">
                                    <option value="">-- Cari Paket --</option>
                                    <?php foreach($kategori as $k) : ?>
                                    <option value="<?= $k['nama_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($paket as $p) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="package-item bg-white mb-2">
                    <a class="h5 text-decoration-none" href="<?= base_url('conpak/detail_paket/'.$p['id_paket']); ?>">
                        <img style="height: 200px; width: 350px;" class="img-fluid"
                            src="<?= base_url('assets/paket/'.$p['gambar_p']) ?>" alt="">
                    </a>
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <small class="m-0"><i
                                    class="fas fa-book-reader text-primary mr-2"></i><?= $p['nama_kategori']; ?></small>

                            <small class="m-0"><i class="fa fa-user text-primary mr-2"></i><?= $p['orang']; ?>
                                Person</small>
                        </div>
                        <a class="h5 text-decoration-none"
                            href="<?= base_url('conpak/detail_paket/'.$p['id_paket']); ?>"><?= $p['nama_paket']; ?></a><br>
                        <div class="border-top mt-4 pt-4">
                            <small class="mt-3"><i class="fa fa-calendar-alt text-primary mr-2"></i><?= $p['durasi']; ?>
                                days</small>
                            <div class="d-flex justify-content-between">
                                <h5 class="m-0"><?= rupiah($p['harga']); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Packages End -->