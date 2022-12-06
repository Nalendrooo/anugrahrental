<section class="vh-100" style="background-color: #0dcaf0;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card justify-content-center align-items-center p-4" style="width: 30rem; border-radius: 1rem;">

                <img src="<?= base_url('assets/img/landing/') ?>mail.jpg" alt="..." width="50%">

                <div class="card-body">
                    <h3 class="card-text text-primary fw-bold text-center">
                        <?= $type == 'create' ? 'Akun berhasil dibuat!' : 'Email verifikasi berhasil dikirim!' ?>
                    </h3>
                    <p class="card-text  text-center">
                        <span>
                            Silakan cek kontak masuk / spam <b><?= $email; ?></b>
                            <?= $type == 'create' ? 'untuk aktivasi akun!' : 'untuk reset password!' ?>
                        </span>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>