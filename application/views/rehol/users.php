<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-lg-8 mt-3">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <h1 class="mt-4">Pendataan Pelanggan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Pelanggan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add"><i
                            class="fas fa-plus-square"></i> Pelanggan</button><span></span>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                                <th>Email</th>
                                <th>Jumlah Rombongan</th>
                                <th>Biaya</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                                <th>Email</th>
                                <th>Jumlah Rombongan</th>
                                <th>Biaya</th>
                                <th>Proses</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($pelanggan as $p) : ?>
                            <tr>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['nomorhp']; ?></td>
                                <td><?= $p['email']; ?></td>
                                <td><?= $p['jumlah']; ?></td>
                                <td><?= rupiah($p['biaya']); ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" title="Hapus"
                                        onclick="return confirm ('Konfirmasi Hapus, yakin Hapus data <?= $p['nama']; ?>...?');"
                                        href="<?= base_url('tampilan/hapususer/'.$p['id_user']); ?>"><i
                                            class="fas fa-eraser"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Modal Add -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add_destinationLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_destination">Tambah Data Pelanggan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?= base_url('tampilan/users'); ?>"
                                    enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                                        <input type="text" class="form-control" name="nama"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nomor Pelanggan</label>
                                        <input type="number" class="form-control" name="nomorhp"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email Pelanggan</label>
                                        <input type="email" class="form-control" name="email"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Jumlah Rombongan</label>
                                        <input type="number" class="form-control" name="jumlah"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Jumlah Biaya</label>
                                        <input type="number" class="form-control" name="biaya"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>