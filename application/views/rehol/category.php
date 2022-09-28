<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <h3 class="mt-4">Mengelolah Kategori Wisata</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Lokasi Destinasi Wisata
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $a=1; ?>
                            <?php foreach($kategori as $k) : ?>
                            <tr>
                                <td><?= $a++; ?></td>
                                <td><?= $k['nama_kategori']; ?></td>
                                <td>
                                    <a title="Hapus" class="btn btn-danger btn-sm"
                                        onclick="return confirm ('Menghapus Kategori Wisata dapat menghapus seluruh data wisata yang berkait, lanjut? untuk hapus <?= $k['nama_kategori']; ?>.?');"
                                        href="<?= base_url('Category/hapus_kategori/'.$k['id_kategori']); ?>"> <i
                                            class="fas fa-eraser"></i> Delete</a>
                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" title="Edit"
                                        data-bs-target="#change<?= $k['id_kategori']; ?>" href=""><i
                                            class="fas fa-edit"></i> Update</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php foreach($kategori as $k) : ?>
                <div class="modal fade" id="change<?= $k['id_kategori']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Wisata</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?= base_url('Category/edit_kategori') ?>"
                                    enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" id="exampleInputEmail1"
                                            name="id_kategori" value="<?= $k['id_kategori']; ?>"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            name="nama_kategori" value="<?= $k['nama_kategori']; ?>"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-3">Gambar Kategori</label>
                                        <img src="<?= base_url('assets/paket/'.$k['gambar_kat']); ?>"
                                            class="img-fluid img-thumbnail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Ganti Gambar
                                            (Optional)</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1"
                                            name="gambar_kat" aria-describedby="emailHelp">
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