<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Mobil</li>
                <li class="breadcrumb-item">Daftar Mobil</li>
                <li class="breadcrumb-item">Form Sewa mobil</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section>
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body p-4">
                        <h3 class=" text-center fw-bold">Pesanan Anda</h3>
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <hr>

                            <h6 class="card-title text-left">Keterangan Pesanan</h6>


                            <div class="row">
                                <div class="col-lg-6 col-md-6 label ">Nama</div>
                                <div class="col-lg-6 col-md-6 "><?= $this->input->post('username_cust') ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 label">Email</div>
                                <div class="col-lg-6 col-md-6"><?= $this->input->post('email_cust') ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 label">No Handphone</div>
                                <div class="col-lg-6 col-md-6"><?= $this->input->post('handphone') ?></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 label">Lama Sewa</div>
                                <div class="col-lg-6 col-md-6"><?= $this->input->post('lama_sewa') ?>jam</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 label">Lokasi Pengambilan</div>
                                <div class="col-lg-6 col-md-6"><?= $this->input->post('lokasi_pengambilan') ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 label">Waktu Pengambilan</div>
                                <div class="col-lg-6 col-md-6"><?= $this->input->post('waktu_pengambilan') ?> WIB</div>
                            </div>

                            <h6 class="card-title">Biaya</h6>

                            <?php switch ($this->input->post('lama_sewa')) {
                                case 24:
                                    $waktu = 1;
                                    break;
                                case 48:
                                    $waktu = 2;
                                    break;
                                case 72:
                                    $waktu = 3;
                                    break;
                                default:
                                    $waktu = 0;
                                    break;
                            }
                            ?>


                            <?php foreach ($data_mobil as $mobil) : ?>

                                <?php $lama_sewa = $waktu * $mobil['harga_sewa_mobil'] ?>

                                <?php if ($this->input->post('sewa_driver') == '1') {
                                    $sewa_driver = $waktu * $mobil['harga_sewa_mobil'] * 0.5;
                                } else {
                                    $sewa_driver = 0;
                                } ?>

                                <?php $total_pembayaran = $lama_sewa + $sewa_driver ?>


                                <div class="row">
                                    <div class="col-lg-6 col-md-6 label ">Biaya Sewa</div>
                                    <div class="col-lg-6 col-md-6 fw-bold">Rp. <?= number_format($lama_sewa, 0, '', '.') ?>,-</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 label">Biaya Driver</div>
                                    <div class="col-lg-6 col-md-6 fw-bold">Rp. <?= number_format($sewa_driver, 0, '', '.') ?>,-</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 label">Biaya Layanan</div>
                                    <div class="col-lg-6 col-md-6 fw-bold">GRATIS</div>
                                </div>
                                <hr>
                                <h6 class="card-title">Total Pembayaran</h6>


                                <h4 class="fw-bold text-right">Rp. <?= number_format($total_pembayaran, 0, '', '.') ?>,-</h4>
                            <?php endforeach ?>




                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body p-4">
                        <h3 class=" text-center fw-bold">Detail Mobil</h3>
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <hr>

                            <h6 class="card-title text-left">Keterangan Mobil</h6>


                            <img src="<?= base_url('assets/img/produk/ayla.png') ?>" class="img-fluid  rounded-start" width="65%">


                            <?php foreach ($data_mobil as $mobil) : ?>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Nama</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil['nama_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Merek</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil['nama_merek'] ?></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Kap</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil['kapasitas_mobil'] ?> orang</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Tahun</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil['tahun_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Tipe</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil['tipe_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Warna</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil['warna_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Nopol</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil['nopol_mobil'] ?></div>
                                </div>

                            <?php endforeach ?>




                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        </div>
                    </div>
                </div>
            </div>

            <form action="<?= base_url('customer/sewa_mobil') ?>" method="post">

                <input type="hidden" name="user_id" value="<?= $this->input->post('user_id') ?>">
                <input type="hidden" name="mobil_id" value="<?= $this->input->post('mobil_id') ?>">
                <input type="hidden" name="email_cust" value="<?= $this->input->post('email_cust') ?>">
                <input type="hidden" name="handphone" value="<?= $this->input->post('handphone') ?>">
                <input type="hidden" name="lokasi_pengambilan" value="<?= $this->input->post('lokasi_pengambilan') ?>">
                <input type="hidden" name="lama_sewa" value="<?= $this->input->post('lama_sewa') ?>">
                <input type="hidden" name="waktu_pengambilan" value="<?= $this->input->post('waktu_pengambilan') ?>">
                <input type="hidden" name="sewa_driver" value="<?= $this->input->post('sewa_driver') ?>">
                <input type="hidden" name="total_pembayaran" value="<?= $total_pembayaran ?>">

                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pilih Metode Pembayaran</h5>

                                <?= form_error('metode_pembayaran_sewa', '<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'); ?>



                                <div class="accordion">

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                                                <div class="row">
                                                    <div class="col-1">
                                                        <input class="form-check-input" type="radio" name="metode_pembayaran_sewa" value="BNI">
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
                                                        <input class="form-check-input" type="radio" name="metode_pembayaran_sewa" value="BRI">
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
                                                        <input class="form-check-input" type="radio" name="metode_pembayaran_sewa" value="BCA">
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

                            </div>
                        </div>
                    </div>
                </div>

            </form>


        </div>




    </section>

</main><!-- End #main -->