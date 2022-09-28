<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Paket Wisata</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Kelelolah Paket Wisata</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add_destination"><i
                            class="fas fa-plus-square"></i> Add New
                        Paket wisata</button><span>
                        <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#add_location"><i
                                class="fas fa-plus-square"></i> Add New
                            Kategori Paket</button>
                    </span>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr align="center">
                                <th style="width:20%">Name Paket</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ganti Sampul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr align="center">
                                <th style="width:20%">Name Paket</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ganti Sampul</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($paket as $p) : ?>
                            <tr align="center">
                                <td style="width:20%"><?= $p['nama_paket']; ?></td>
                                <td><?= $p['nama_kategori']; ?></td>
                                <td><?= rupiah($p['harga'])  ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#change_img<?= $p['id_paket']; ?>" href=""><i
                                            class="fas fa-upload"></i> Ganti
                                        Gambar</a>
                                </td>
                                <td>
                                    <a onclick="return confirm ('Konfirmasi Hapus, yakin Hapus <?= $p['nama_paket'];?>.?');"
                                        title="Hapus" class="btn btn-danger btn-sm"
                                        href="<?= base_url('conpak/hapus_paket/'.$p['id_paket']); ?>"><i
                                            class="fas fa-eraser"></i></a>
                                    <a class="btn btn-success btn-sm" data-bs-toggle="modal" title="Detail"
                                        data-bs-target="#detail_paket<?= $p['id_paket']; ?>"><i
                                            class="fas fa-info-circle"></i></a>
                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" title="Edit"
                                        data-bs-target="#edit<?= $p['id_paket']; ?>" href=""><i
                                            class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Add -->
            <div class="modal fade" id="add_destination" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Paket Wisata</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('admin/paket'); ?>" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Paket</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_paket"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Destinasi</label>
                                    <textarea class="form-control" name="deskripsi"
                                        placeholder="Masukan Deskripsi Perusahaan"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kategori Paket</label>
                                    <select class="form-select" aria-label="Default select example" name="id_kategori">
                                        <option selected disabled>--Pilih Kategori Paket--</option>
                                        <?php foreach($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gambar Sampul Paket
                                        Wisata</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar_paket">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Harga Paket</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="harga"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Durasi Hari</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="durasi"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jumlah Orang</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="orang"
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

            <!-- Modal Kategori -->
            <div class="modal fade" id="add_location" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Paket</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('conpak/kategori'); ?>"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Ketegori Paket</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_kategori"
                                        aria-describedby="emailHelp" placeholder="Kategori Paket">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sampul Kategori</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="gambar_kat"
                                        aria-describedby="emailHelp" placeholder="Kategori Paket">
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
            <?php foreach($paket as $p) : ?>
            <div class="modal fade" id="change_img<?= $p['id_paket']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti Sampul</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('conpak/update_gambar'); ?>"
                                enctype="multipart/form-data">
                                <input class="form-control" type="hidden" id="formFile" name="id_paket"
                                    value="<?= $p['id_paket']; ?>">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sampul Paket Sekarang</label>
                                    <img src="<?= base_url('assets/paket/'.$p['gambar_p']); ?>" class="card-img-top"
                                        alt="...">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sampul Paket Baru</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar_p">
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

            <!-- Modal Edit Paket -->
            <?php foreach($paket as $p) : ?>
            <div class="modal fade" id="edit<?= $p['id_paket']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Paket Wisata</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('Conpak/editPaket'); ?>">

                                <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_paket"
                                    value="<?= $p['id_paket']; ?>" aria-describedby="emailHelp">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Paket</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_paket"
                                        value="<?= $p['nama_paket']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Destinasi</label>
                                    <textarea class="form-control" name="deskripsi"
                                        placeholder="Masukan Deskripsi Perusahaan"><?=  str_replace('<br />', '', $p['ket_paket']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kategori Paket</label>
                                    <select class="form-select" aria-label="Default select example" name="id_kategori">
                                        <option value="<?= $p['id_kategori']; ?>"><?= $p['nama_kategori']; ?></option>

                                        <?php foreach($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Harga Paket</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="harga"
                                        value="<?= $p['harga']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Durasi Hari</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="durasi"
                                        value="<?= $p['durasi']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jumlah Orang</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="orang"
                                        value="<?= $p['orang']; ?>" aria-describedby="emailHelp">
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

            <!-- Modal Detail-->
            <?php foreach($paket as $p) : ?>
            <div class="modal fade" id="detail_paket<?= $p['id_paket']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Paket Wisata</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card" style="width: 20rem;">
                                            <img src="<?= base_url('assets/paket/'.$p['gambar_p']); ?>"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $p['nama_paket']; ?></h5>
                                                <p class="card-text">Kategori :<?= $p['nama_kategori']; ?></p>
                                                <p class="card-text"><?= $p['ket_paket']; ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Harga : <?= rupiah($p['harga'])  ?></li>
                                                <li class="list-group-item">Durasi : <?= $p['durasi']; ?> Hari</li>
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