<section class="vh-100" style="background-color: #0dcaf0;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-6">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">

                        <div class="col-md-4 col-lg-12 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="<?= base_url('auth/changePassword') ?>" method="post">

                                    <h5 class="fw-normal text-center mb-3 pb-3" style="letter-spacing: 1px;">Change password</h5>

                                    <!-- Alert flash data -->
                                    <?= $this->session->flashdata('message'); ?>

                                    <div class="col-md-4 col-lg-12 form-outline mb-4">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control form-control-lg" name="password1" />
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="col-md-4 col-lg-12 form-outline mb-4">
                                        <label class="form-label">Repeat New Password</label>
                                        <input type="password" class="form-control form-control-lg" name="password2" />
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="pt-1 mb-2 ">
                                        <button class="btn btn-primary " type="submit">Submit</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>