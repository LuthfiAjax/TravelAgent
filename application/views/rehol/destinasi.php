<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-8 mt-3">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <h1 class="mt-4">Destinasi Wisata</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Kelelolah Destinasi</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add_destination"><i
                            class="fas fa-plus-square"></i> Add New
                        Destination</button><span>
                        <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#add_location"><i
                                class="fas fa-plus-square"></i> Add New
                            location</button>
                    </span>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr align="center">
                                <th>Name</th>
                                <th>Lokasi</th>
                                <th>Ganti gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr align="center">
                                <th>Name</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($destinasi as $d) : ?>
                            <tr align="center">
                                <td><?= $d['nama_wisata']; ?></td>
                                <td><?= $d['nama_lokasi']; ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#change_img<?= $d['id_wisata']; ?>"><i
                                            class="fas fa-upload"></i> Ganti
                                        Gambar</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" title="Hapus"
                                        onclick="return confirm ('Konfirmasi Hapus, yakin Hapus <?= $d['nama_wisata'];?>.?');"
                                        href="<?= base_url('condes/hapus_destinasi/'.$d['id_wisata']); ?>"><i
                                            class="fas fa-eraser"></i></a>
                                    <a class="btn btn-success btn-sm" data-bs-toggle="modal" title="Detail"
                                        data-bs-target="#datail_destination<?= $d['id_wisata']; ?>" href=""><i
                                            class="fas fa-info-circle"></i></a>
                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" title="Edit"
                                        data-bs-target="#change_destination<?= $d['id_wisata']; ?>"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Destination -->
            <div class="modal fade" id="add_destination" tabindex="-1" aria-labelledby="add_destinationLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="add_destination">Tambah Destinasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-center">
                            <form method="POST" action="<?= base_url('admin/destinasi'); ?>"
                                enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Destinasi</label>
                                    <input type="text" class="form-control" name="nama_wisata"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Destinasi</label>
                                    <textarea class="form-control" name="ket_wisata"
                                        placeholder="Masukan Deskripsi Perusahaan"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Lokasi</label>
                                    <select class="form-select" aria-label="Default select example" name="id_lokasi">
                                        <option selected disabled>--Pilih Lokasi--</option>
                                        <?php foreach($lokasi as $l) : ?>
                                        <option value="<?= $l['id_lok']; ?>"><?= $l['nama_lokasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gambar Destinasi</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar_w">
                                    <p class="text-danger">Format gambar jpg/png/gif/ dan max 5 mb
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

            <!-- Modal Lokasi -->
            <div class="modal fade" id="add_location" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Lokasi Destinasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('condes/lokasi'); ?>"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lokasi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="lokasi"
                                        aria-describedby="emailHelp" placeholder="Masukan Nama Provinsi atau Kota">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gambar Lokasi</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar_lok">
                                    <p class="text-danger">Format gambar jpg/png/gif/ dan max 5 mb
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

            <!-- Modal Ganti gambar -->
            <?php foreach($destinasi as $d) : ?>
            <div class="modal fade" id="change_img<?= $d['id_wisata']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti Gambar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="exampleInputEmail1" class="form-label">Gambar saat ini</label>
                            <div class="img-thumbnail" style="width: 18rem;">
                                <img src="<?= base_url('assets/destination/'.$d['gambar_w']); ?>" class="card-img-top">
                            </div>
                            <form method="POST" action="<?= base_url('condes/update_gambar'); ?>"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_wisata"
                                        value="<?= $d['id_wisata']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pilih Gambar Baru</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar_w">
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
            <?php endforeach; ?>

            <!-- Modal Edit Destination -->
            <?php foreach($destinasi as $d) : ?>
            <div class="modal fade" id="change_destination<?= $d['id_wisata']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Destinasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('condes/update_destinasi'); ?>">

                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_wisata"
                                        value="<?= $d['id_wisata']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Destinasi</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_wisata"
                                        value="<?= $d['nama_wisata']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Destinasi</label>
                                    <textarea class="form-control" name="ket_wisata"
                                        placeholder="Masukan Deskripsi Perusahaan"> <?= $d['ket_wisata']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Lokasi</label>
                                    <select class="form-select" aria-label="Default select example" name="id_lok">
                                        <option value="<?= $d['id_lok']; ?>"><?= $d['nama_lokasi']; ?></option>
                                        <?php foreach($lokasi as $l) : ?>
                                        <option value="<?= $l['id_lok']; ?>"><?= $l['nama_lokasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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

            <!-- Modal Detail-->
            <?php foreach($destinasi as $d) : ?>
            <div class="modal fade" id="datail_destination<?= $d['id_wisata']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Destinasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card" style="width: 20rem;">
                                            <img src="<?= base_url('assets/destination/'.$d['gambar_w']); ?>"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $d['nama_wisata']; ?></h5>
                                                <p class="card-text"><?= $d['ket_wisata']; ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Lokasi : <?= $d['nama_lokasi']; ?></li>
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
    </main>