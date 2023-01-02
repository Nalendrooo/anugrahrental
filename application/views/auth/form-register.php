<section style="background-color: #0dcaf0;" class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
                        <span class="d-none d-lg-block">Anugrah Jaya</span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                            <p class="text-center small">Enter your personal details to create account</p>
                        </div>

                        <!-- Alert flash data -->
                        <?= $this->session->flashdata('message'); ?>

                        <form class="row g-3 needs-validation" novalidate action="<?= base_url('auth/registration') ?>" method="post">

                            <div class="col-6">
                                <label for="yourName" class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="yourName" value="<?= set_value('first_name'); ?>" required>
                                <?= form_error('first_name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-6">
                                <label for="yourEmail" class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="yourEmail" value="<?= set_value('last_name'); ?>" required>
                                <?= form_error('last_name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" name="email" class="form-control" id="yourUsername" value="<?= set_value('email'); ?>" required>
                                </div>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-6">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password1" class="form-control" id="yourPassword" required>
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-6">
                                <label for="yourPassword" class="form-label">Repeat Password</label>
                                <input type="password" name="password2" class="form-control" id="yourPassword" required>
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                    <label class="form-check-label" for="acceptTerms">Saya menyetujui <a href="#">syarat dan ketentuan</a></label>
                                    <div class="invalid-feedback">Check setujui untuk melanjutkan.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Create Account</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">Already have an account? <a href="<?= base_url('auth') ?>">Log in</a></p>
                            </div>
                        </form>

                    </div>
                </div>



            </div>
        </div>
    </div>

</section>