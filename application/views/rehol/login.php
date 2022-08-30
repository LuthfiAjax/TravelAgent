<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('rehol/'); ?>">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" name="email" type="email"
                                placeholder="Masukan Email" value="<?= set_value('email'); ?>" />
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small><br>'); ?>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputPassword" name="password" type="password"
                                placeholder="Password" />
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small><br>'); ?>
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button type="submit" class="btn btn-primary"> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>