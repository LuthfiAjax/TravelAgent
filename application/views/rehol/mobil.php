<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="col-lg-8 mt-3">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <h1 class="mt-4">Sewa Mobil</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Kelelolah Rental Mobil</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add_destination"><i
                            class="fas fa-plus-square"></i> Add New
                        Mobil</button><span>
                    </span>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr align="center">
                                <th>Name Mobil</th>
                                <th>Kapasitas</th>
                                <th>Harga</th>
                                <th>Ganti Sampul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr align="center">
                                <th>Name Paket</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ganti Sampul</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($mobil as $m) : ?>
                            <tr align="center">
                                <td><?= $m['nama_mobil']; ?></td>
                                <td><?= $m['kapasitas']; ?> orang</td>
                                <td><?= rupiah($m['harga'])  ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" title="Edit Gambar"
                                        data-bs-target="#change_img<?= $m['id_mobil']; ?>" href=""><i
                                            class="fas fa-upload"></i> Ganti
                                        Gambar</a>
                                </td>
                                <td>
                                    <a onclick="return confirm ('Konfirmasi Hapus, yakin Hapus <?= $m['nama_mobil'];?>.?');"
                                        class="btn btn-danger btn-sm" title="Hapus"
                                        href="<?= base_url('conmo/hapus_mobil/'.$m['id_mobil']); ?>"><i
                                            class="fas fa-eraser"></i></a>

                                    <a class="btn btn-success btn-sm" data-bs-toggle="modal" title="Detail"
                                        data-bs-target="#datail<?= $m['id_mobil']; ?>"><i
                                            class="fas fa-info-circle"></i></a>

                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" title="Edit"
                                        data-bs-target="#change_mobil<?= $m['id_mobil']; ?>"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal add -->
            <div class="modal fade" id="add_destination" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('admin/mobil'); ?>" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama / Merk</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_mobil"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kapasitas orang</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        name="kapasitas_orang" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pemakaian</label>
                                    <select class="form-select" aria-label="Default select example" name="pemakaian">
                                        <option selected disabled>--Pilih Pemakaian--</option>

                                        <option value="Dalam kota jogja">Dalam kota jogja</option>
                                        <option value="Luar kota jogja">Luar kota jogja</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Destinasi</label>
                                    <textarea class="form-control" name="deskripsi"
                                        placeholder="Masukan Deskripsi Perusahaan"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gambar Mobil</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar_m">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Harga Harian</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="harga"
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

            <!-- Modal Ganti gambar -->
            <?php foreach($mobil as $m) : ?>
            <div class="modal fade" id="change_img<?= $m['id_mobil']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ganti Gambar Mobil <?= $m['nama_mobil']; ?>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('conmo/update_gambar'); ?>"
                                enctype="multipart/form-data">
                                <label for="exampleInputEmail1" class="form-label">Gambar saat ini</label>
                                <div class="img-thumbnail" style="width: 18rem;">
                                    <img src="<?= base_url('assets/mobil/'.$m['gambar_m']); ?>" class="card-img-top">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_mobil"
                                        value="<?= $m['id_mobil']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Gambar Baru</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar_m">
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

            <!-- Modal Edit  -->
            <?php foreach($mobil as $m) : ?>
            <div class="modal fade" id="change_mobil<?= $m['id_mobil']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Mobil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('conmo/update_mobil'); ?>">

                                <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_mobil"
                                    value="<?= $m['id_mobil']; ?>" aria-describedby="emailHelp">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama / Merk</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_mobil"
                                        value="<?= $m['nama_mobil']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kapasitas orang</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        value="<?= $m['kapasitas']; ?>" name="kapasitas_orang"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pemakaian</label>
                                    <select class="form-select" aria-label="Default select example" name="pemakaian">

                                        <option value="<?= $m['pemakaian']; ?>"><?= $m['pemakaian']; ?></option>
                                        <option value="Dalam kota jogja">Dalam kota jogja</option>
                                        <option value="Luar kota jogja">Luar kota jogja</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Destinasi</label>
                                    <textarea class="form-control" name="deskripsi"
                                        placeholder="Masukan Deskripsi Perusahaan"><?= $m['ket_mobil']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Harga Harian</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="harga"
                                        value="<?= $m['harga']; ?>" aria-describedby="emailHelp">
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
            <?php foreach($mobil as $m) : ?>
            <div class="modal fade" id="datail<?= $m['id_mobil']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Mobil <?= $m['nama_mobil']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card" style="width: 22rem;">
                                            <img src="<?= base_url('assets/mobil/'.$m['gambar_m']); ?>"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Harga : <?= rupiah($m['harga'])  ?></h5>
                                                <p class="card-text"><?= $m['ket_mobil']; ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Kapasita Orang : <?= $m['kapasitas']; ?>
                                                </li>
                                                <li class="list-group-item">Pemakaian : <?= $m['pemakaian']; ?></li>
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