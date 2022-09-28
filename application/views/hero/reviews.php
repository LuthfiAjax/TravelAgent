<!-- Contact Start -->
<div id="contact" class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Reviews</h6>
            <h1>Give us your best review</h1>
            <div class="text-uppercase">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <div id="success"></div>
                    <form method="POST" action="<?= base_url('hero/add'); ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your Profession</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="profesi"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Choose Social Media</label>
                            <select class="form-control" aria-label="Default select example" name="medsos">
                                <option selected disabled>Pilih Medsos</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Twitter">Twitter</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your Account</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="akun"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your Picture</label>
                            <input type="file" class="form-control" aria-describedby="inputGroupFileAddon01"
                                name="gambar_t">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Your Reviews</label>
                            <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message"
                                name="Message" required="required" name="pesan"
                                data-validation-required-message="Please enter your message"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Send
                                Reviews</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->