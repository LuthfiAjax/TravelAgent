<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?= $this->session->flashdata('message'); ?>
            <h1 class="mt-4">PROFIL PERUSAHAAN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Profil</li>
            </ol>
            <div class="row">
                <div class="col-sm-4">
                    <?php foreach($profil as $p) : ?>
                    <div class="card" style="width: 21rem;">
                        <img src="<?= base_url('assets/profil/destinasi3.webp'); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p['judul']; ?></h5>
                            <p class="card-text"><?= $p['tentang']; ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $p['email']; ?></li>
                            <li class="list-group-item"><?= $p['no_hp']; ?></li>
                            <li class="list-group-item"><?= $p['alamat']; ?></li>
                        </ul>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#profil<?= $p['id_profil']; ?>">
                                Edit Profil
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- reset password -->
                <div class="col-sm-4 mt-3">
                    <div class="card" style="width: 21rem;">
                        <div class="card-body">
                            <h5 class="card-title">Hai, <?= $user['nama_admin']; ?></h5>
                            <p class="card-text">anda dapat merubah password akun disini..!</p>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ubahpassword<?= $user['id_admin']; ?>">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ADD Akun -->
                <div class="col-sm-4 mt-3">
                    <div class="card" style="width: 21rem;">
                        <div class="card-body">
                            <h5 class="card-title">Hai, <?= $user['nama_admin']; ?></h5>
                            <p class="card-text">anda dapat Menambahkan Akun untuk Admin Lain Disini..!</p>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addakun">
                                Add akun
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Profil -->
            <?php foreach($profil as $p) : ?>
            <div class="modal fade" id="profil<?= $p['id_profil']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Profil Perusahaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('admin/update_profil'); ?>">

                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_profil"
                                        value="<?= $p['id_profil']; ?>" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Slogan Perusahaan</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="judul"
                                        value="<?= $p['judul']; ?>" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tentang Perusahaan</label>
                                    <textarea class="form-control" name="tentang"
                                        placeholder="Masukan Deskripsi Perusahaan"><?= $p['tentang']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        value="<?= $p['email']; ?>" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telphone</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="no_hp"
                                        value="<?= $p['no_hp']; ?>" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Alamat Perusahaan</label>
                                    <textarea class="form-control" name="alamat"
                                        placeholder="Masukan Alamat Perusahaan"><?= $p['alamat']; ?></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Profil</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>



            <!-- Modal password-->
            <div class="modal fade" id="ubahpassword<?= $user['id_admin']; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('admin/ubahpassword'); ?>">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_admin"
                                        value="<?= $user['id_admin']; ?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" name="password1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ulangi Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" name="password2"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal add akun-->
            <div class="modal fade" id="addakun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= base_url('rehol/tambah'); ?>">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text"
                                                value="<?= set_value('nama'); ?>" name="nama"
                                                placeholder="Enter your full name" />
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small><br>'); ?>
                                            <label for="inputFirstName">Full name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email" name="email"
                                        value="<?= set_value('email'); ?>" placeholder="name@example.com" />
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small><br>'); ?>
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" type="password"
                                                name="password1" placeholder="Create a password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPasswordConfirm" name="password2"
                                                type="password" placeholder="Confirm password" />
                                            <label for="inputPasswordConfirm">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>