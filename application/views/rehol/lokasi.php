<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Mengelolah Lokasi Destinasi</h3>
            <div class="col-lg-8 mt-3">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lokasi Destinasi Wisata
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($lokasi as $l) : ?>
                            <tr>
                                <td><?= $l['nama_lokasi']; ?></td>
                                <td>
                                    <a onclick="return confirm ('Jika menghapus lokasi destinasi maka data destinasi yang lokasinya <?= $l['nama_lokasi'];?> akan ikut terhapus!!, Konfirmasi Hapus, yakin Hapus <?= $l['nama_lokasi'];?>.?');"
                                        title="Hapus" class="btn btn-danger btn-sm"
                                        href="<?= base_url('Category/hapus_lokasi/'.$l['id_lok']); ?>"><i
                                            class="fas fa-eraser"></i> Hapus</a>
                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" title="Edit"
                                        onclick="return confirm ('Jika Merubah lokasi destinasi maka akan mempengaruhi data destinasi wisata, Konfirmasi Edit, yakin Edit <?= $l['nama_lokasi'];?>.?');"
                                        data-bs-target="#edit<?= $l['id_lok']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php foreach($lokasi as $l) : ?>
                <div class="modal fade" id="edit<?= $l['id_lok']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Lokasi Destinasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?= base_url('Category/edit_lokasi') ?>"
                                    enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_lok"
                                            value="<?= $l['id_lok']; ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Lokasi</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            name="nama_lokasi" value="<?= $l['nama_lokasi']; ?>"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-3">Gambar Lokasi</label>
                                        <img src="<?= base_url('assets/destination/'.$l['gambar_lok']); ?>"
                                            class="img-fluid img-thumbnail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Ganti Gambar
                                            (Optional)</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1"
                                            name="gambar_lok" aria-describedby="emailHelp">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </main>