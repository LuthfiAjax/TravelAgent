<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <a class="text-decoration-none" href="<?= base_url('admin/destinasi'); ?>">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4>Jumlah Destinasi</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="text-white">
                                    <?= $jumdestinasi; ?> Destinasi
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6">
                    <a class="text-decoration-none" href="<?= base_url('admin/paket'); ?>">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <h4>Jumlah Paket</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="text-white"><?= $jumpaket; ?> Paket</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6">
                    <a class="text-decoration-none" href="<?= base_url('admin/mobil'); ?>">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body">
                                <h4>Jumlah Mobil</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="text-white"><?= $jummobil; ?> Mobil</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-md-6">
                    <a class="text-decoration-none" href="<?= base_url('tampilan/testimoni'); ?>">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h4>Jumlah Testimoni</h4>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="text-white"><?= $jumtestimoni; ?> Testimoni</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Kritik dan saran
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Pesan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($pesan as $p) : ?>
                            <tr>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['email']; ?></td>
                                <td><?= $p['subject']; ?></td>
                                <td><?= $p['pesan']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>