<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Customer</li>
                <li class="breadcrumb-item">Deposit</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section>
        <div class="card">
            <div class="card-body p-4">
                <h3 class=" text-center fw-bold">Silakan Melakukan Pembayaran Deposit Sebesar :</h3>
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    <h1 class="text-center fw-bold ">Rp. 500.000,-</h1>
                </div>
                <span class="text-sm"><i>* Uang deposit dapat ditarik saat kamu sudah mengembalikan mobil.</i></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pilih Metode Pembayaran</h5>

                        <?= form_error('jenis_pembayaran_deposit', '<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'); ?>


                        <form action="<?= base_url('customer/form_pembayaran_deposit') ?>" method="post">

                            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

                            <div class="accordion">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                                            <div class="row">
                                                <div class="col-1">
                                                    <input class="form-check-input" type="radio" name="jenis_pembayaran_deposit" value="BNI">
                                                </div>
                                                <div class="col-6">
                                                    <img src="<?= base_url('assets/img/logo-bni.png') ?>" style="width: 20%;" alt="">
                                                </div>
                                            </div>

                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>Bagaimana cara melakukan pembayaran transfer dari bank BNI?</strong>
                                            <ol>
                                                <li>Akses BNI Mobile Banking melalui handphone</li>
                                                <li>Masukkan User ID dan Password</li>
                                                <li>Pilih menu “Transfer“, lalu pilih “Antar Rekening BNI“, pilih “Input Rekening Baru”</li>
                                                <li> Masukkan nomor Virtual Account</li>
                                                <li>Di halaman konfirmasi, pastikan data transaksi sudah benar kemudian pilih “Ya“
                                                </li>
                                                <li>Masukkan password kamu</li>
                                            </ol>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                            <div class="row">
                                                <div class="col-1">
                                                    <input class="form-check-input" type="radio" name="jenis_pembayaran_deposit" value="BRI">
                                                </div>
                                                <div class="col-6">
                                                    <img src="<?= base_url('assets/img/logo-bri.png') ?>" style="width: 30%;" alt="">
                                                </div>
                                            </div>

                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>Bagaimana cara melakukan pembayaran transfer dari bank BRI?</strong>
                                            <ol>
                                                <li>Akses BRI Mobile Banking melalui handphone</li>
                                                <li>Masukkan User ID dan Password</li>
                                                <li>Pilih menu “Transfer“, lalu pilih “Antar Rekening BNI“, pilih “Input Rekening Baru”</li>
                                                <li> Masukkan nomor Virtual Account</li>
                                                <li>Di halaman konfirmasi, pastikan data transaksi sudah benar kemudian pilih “Ya“
                                                </li>
                                                <li>Masukkan password kamu</li>
                                            </ol>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                                            <div class="row">
                                                <div class="col-1">
                                                    <input class="form-check-input" type="radio" name="jenis_pembayaran_deposit" value="BCA">
                                                </div>
                                                <div class="col-6">
                                                    <img src="<?= base_url('assets/img/logo-bca.webp') ?>" style="width: 20%;" alt="">
                                                </div>
                                            </div>


                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>Bagaimana cara melakukan pembayaran transfer dari bank BCA?</strong>
                                            <ol>
                                                <li>Akses BCA Mobile Banking melalui handphone</li>
                                                <li>Masukkan User ID dan Password</li>
                                                <li>Pilih menu “Transfer“, lalu pilih “Antar Rekening BNI“, pilih “Input Rekening Baru”</li>
                                                <li> Masukkan nomor Virtual Account</li>
                                                <li>Di halaman konfirmasi, pastikan data transaksi sudah benar kemudian pilih “Ya“
                                                </li>
                                                <li>Masukkan password kamu</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Default Accordion Example -->

                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upload Bukti Pembayaran</h5>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <input class="form-control" type="file">
                                <small class="text-grey pl-3">*Gambar harus berformat .gif .jpg .png .jpeg</small>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" type="button">Submit</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


        </div>




    </section>

</main><!-- End #main -->