<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-lg-8 mt-3">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <h1 class="mt-4">Testimoni Pelanggan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Testimoni Pelanggan</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add"><i
                            class="fas fa-plus-square"></i> New Testimoni</button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Profesi</th>
                                <th>Media Sosial</th>
                                <th>Nama akun</th>
                                <th>Status</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Profesi</th>
                                <th>Media Sosial</th>
                                <th>Nama akun</th>
                                <th>Status</th>
                                <th>Proses</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($testimoni as $t) : ?>
                            <tr>
                                <td><?= $t['nama']; ?></td>
                                <td><?= $t['profesi']; ?></td>
                                <td><?= $t['medsos']; ?></td>
                                <td><?= $t['akun']; ?></td>
                                <td><?= $t['status']; ?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" title="Hapus"
                                        onclick="return confirm ('Konfirmasi Hapus, yakin Hapus Testimoni dari <?= $t['nama']; ?>...?');"
                                        href="<?= base_url('tampilan/hapusTesti/'.$t['id_testimoni']); ?>"><i
                                            class="fas fa-eraser"></i></a>

                                    <a class="btn btn-success btn-sm" data-bs-toggle="modal" title="Detail"
                                        data-bs-target="#detail<?= $t['id_testimoni']; ?>" href=""><i
                                            class="fas fa-info-circle"></i></a>

                                    <a class="btn btn-info btn-sm" title="Tampilkan"
                                        onclick="return confirm ('Tampilkan Testimoni dari <?= $t['nama']; ?>...?');"
                                        href="<?= base_url('tampilan/aktif/'.$t['id_testimoni']); ?>"><i
                                            class="fas fa-arrow-up"></i></a>

                                    <a class="btn btn-warning btn-sm" title="Turunkan"
                                        onclick="return confirm ('Turunkan Testimoni dari <?= $t['nama']; ?>...?');"
                                        href="<?= base_url('tampilan/nonAktif/'.$t['id_testimoni']); ?>"><i
                                            class="fas fa-arrow-down"></i></a>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Modal Destination -->
                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add_destinationLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_destination">Masukan Testimoni Dari Pelanggan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex justify-content-center">
                                <form method="POST" action="<?= base_url('tampilan/testimoni'); ?>"
                                    enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Pelanggan</label>
                                        <input type="text" class="form-control" name="nama"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Profesi</label>
                                        <input type="text" class="form-control" name="profesi"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pesan</label>
                                        <textarea class="form-control" name="pesan"
                                            placeholder="Masukan Deskripsi Perusahaan"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Media Sosial</label>
                                        <select class="form-select" aria-label="Default select example" name="medsos">
                                            <option selected disabled>--Pilih Medsos--</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Twitter">Twitter</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama akun</label>
                                        <input type="text" class="form-control" name="akun"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                                        <input class="form-control" type="file" id="formFile" name="gambar_t">
                                        <p class="text-danger fst-italic">Format Foto hanya jpg/png/gif/ dan max 5 mb
                                        </p>
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

                <!-- modal detail -->
                <?php foreach($testimoni as $t) : ?>
                <div class="modal fade" id="detail<?= $t['id_testimoni']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Destinasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card" style="width: 20rem;">
                                                <img src="<?= base_url('assets/testimoni/'.$t['gambar_t']); ?>"
                                                    class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $t['nama']; ?></h5>
                                                    <p class="card-text"><?= $t['pesan']; ?></p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Medsos : <?= $t['medsos']; ?></li>
                                                    <li class="list-group-item">Name Akun : <?= $t['akun']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>