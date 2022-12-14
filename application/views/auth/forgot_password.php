<section class="vh-100" style="background-color: #0dcaf0;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-6">
                <div class="card">
                    <div class="row g-0">

                        <div class="col-md-4 col-lg-12 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="<?= base_url('auth/forgot_password') ?>" method="post">

                                    <h5 class="card-title text-center pb-0 fs-4">Forgot Password</h5>

                                    <!-- Alert flash data -->
                                    <?= $this->session->flashdata('message'); ?>



                                    <div class="form-outline mb-4">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control form-control-lg" name="email" value="<?= set_value('email'); ?>" />
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>




                                    <div class="pt-1 mb-2 ">
                                        <button class="btn btn-primary " type="submit">Submit</button>
                                    </div>


                                    <!-- <p class="" style="color: #393f81;">Already have an account? <a href="<?= base_url('auth') ?>" style="color: #393f81;">Login here</a></p> -->

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>