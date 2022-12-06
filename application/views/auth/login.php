<section class="vh-150" style="background-color: #0dcaf0;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="<?= base_url('assets/img/landing/') ?>picture-login.webp" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action=" <?= base_url('auth') ?>" method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">

                                        <img src="<?= base_url('assets/img/landing/') ?>logo-black.png" alt="" style="width: 65% ;">
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <!-- Alert flash data -->
                                    <?= $this->session->flashdata('message'); ?>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Email address</label>
                                        <input type="text" class="form-control form-control-lg" name="email" value="<?= set_value('email'); ?>" />
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-lg" name="password" />
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary " type="submit">Login</button>
                                    </div>

                                    <a class="small text-muted" href="<?= base_url('auth/forgot_password') ?>">Forgot password?</a>
                                    <p class="mb-5" style="color: #393f81;">Don't have an account? <a href="<?= base_url('auth/registration') ?>" style="color: #393f81;">Register here</a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>