<section class="vh-100" style="background-color: #0dcaf0;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">

                        <div class="col-md-4 col-lg-12 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="<?= base_url('auth/registration') ?>" method="post">

                                    <h5 class="fw-normal text-center mb-3 pb-3" style="letter-spacing: 1px;">Register your account</h5>

                                    <!-- Alert flash data -->
                                    <?= $this->session->flashdata('message'); ?>

                                    <div class="row">

                                        <div class="col-md-4 col-lg-6 form-outline mb-4">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control form-control-lg" name="first_name" value="<?= set_value('first_name'); ?>" />
                                            <?= form_error('first_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="col-md-4 col-lg-6 form-outline mb-4">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control form-control-lg" name="last_name" value="<?= set_value('last_name'); ?>" />
                                            <?= form_error('last_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control form-control-lg" name="email" value="<?= set_value('email'); ?>" />
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-lg-6 form-outline mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control form-control-lg" name="password1" />
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="col-md-4 col-lg-6 form-outline mb-4">
                                            <label class="form-label">Repeat Password</label>
                                            <input type="password" class="form-control form-control-lg" name="password2" />
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                    </div>



                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary " type="submit">Submit</button>
                                    </div>


                                    <p class="" style="color: #393f81;">Already have an account? <a href="<?= base_url('auth') ?>" style="color: #393f81;">Login here</a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>