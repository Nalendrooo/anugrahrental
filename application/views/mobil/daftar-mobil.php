<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Mobil</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Panduan Sewa <span>| <?= date('d M Y') ?></span></h5>

                        <div class="activity">

                            <div class="activity-item d-flex">
                                <div class="activite-label">1</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    Customer melakukan registrasi & login
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">2</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    Customer melengkapi berkas & data diri
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">3</div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content">
                                    Customer melakukan pembayaran <a href="#" class="fw-bold text-dark">Deposit</a> sebelum melakukan booking/sewa
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">4</div>
                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                <div class="activity-content">
                                    Customer memilih mobil di menu <a href="#" class="fw-bold text-dark">Daftar mobil</a>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">5</div>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                <div class="activity-content">
                                    Customer mengisi data penyewaan & melakukan pembayaran sewa
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">6</div>
                                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                <div class="activity-content">
                                    Customer mengunggu verifikasi pembayaran & menunggu notifikasi via Whatsapp
                                </div>
                            </div><!-- End activity item-->

                        </div>

                    </div>
                </div><!-- End Recent Activity -->



                <!-- News & Updates Traffic -->
                <div class="card">


                    <div class="card-body pb-0">
                        <h5 class="card-title">Berita &amp; Promo <span>| <?= date('d M Y') ?></span></h5>

                        <div class="news">

                            <div class="post-item clearfix">
                                <img src="<?= base_url('assets/img/promo/promo2.jpg') ?>" alt="">
                                <h4><a href="#">Tur Sehari Penuh Murah di Bali</a></h4>
                                <p>Hanya Rp. 450.000, adalah Paket Tour Spesial dari Rent Car Bali untuk mengunjungi tempat-tempat menarik dengan mobil pribadi, Pengemudi Tur Bali kami yang luar biasa ramah akan membimbing Anda untuk mengunjungi tempat-tempat indah tujuan wisata</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="<?= base_url('assets/img/promo/promo3.jpg') ?>" alt="">
                                <h4><a href="#">Bali Combination Tour Murah</a></h4>
                                <p>Hanya Rp. 700.000 dengan kombinasi tur dan aktivitas. dengan pengalaman hebat untuk dinikmati di Bali yang indah ini, dengan harga yang terjangkau Anda mendapatkan pengalaman yang unik dan sangat berkesan di Bali.</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="<?= base_url('assets/img/promo/promo4.jpg') ?>" alt="">
                                <h4><a href="#">Tour Setengah Hari Murah Bali</a></h4>
                                <p>Hanya Rp. 300.000, adalah Paket Tur Khusus dari Rent Car Bali untuk melihat Bali dengan budaya unik dan tempat-tempat menarik di Bali, Pengemudi Tur Bali profesional kami dengan ramah membimbing Anda untuk mengunjungi panorama indah dari lokasi wisata.</p>
                            </div>


                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->


            <!-- Right side columns -->
            <div class="col-lg-8 ">
                <div class="row">

                    <!-- Customers Card -->
                    <div class="col-xxl-12 col-xl-12">
                        <!-- <?php foreach ($mobil_merek as $merek) : ?> -->

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title"><?= $merek['nama_merek'] ?> <span>| <?= date('D, d M Y') ?></span></h5>

                                <div class="row">
                                    <?php foreach ($mobil as $mobil_list) : ?>


                                        <?php if ($merek['merek_id'] == $mobil_list['merek_id']) : ?>

                                            <div class="col-lg-4 col-xxl-3">
                                                <!-- Card with an image on top -->
                                                <div class="card">
                                                    <img src="<?= base_url('assets/img/produk/ayla.png') ?>" class="card-img-top " alt="...">
                                                    <div class="card-body">
                                                        <h5 class="mt-2 fw-bold"><?= $mobil_list['nama_mobil'] ?></h5>
                                                        <p>Rp. <?= number_format($mobil_list['harga_sewa_mobil'], 0, '', '.')  ?>/24jam</p>
                                                        <div class="row">
                                                            <div class="col-lg-6 ">

                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#detailMobilModal<?= $mobil_list['mobil_id'] ?>">
                                                                    <span class="badge bg-info">Detail</span>
                                                                </a>

                                                            </div>
                                                            <div class="col-lg-6">
                                                                <span class="badge border-peimary text-primary border-1 "><?= $mobil_list['kapasitas_mobil'] ?> orang</span>

                                                            </div>
                                                        </div>
                                                        <div class="d-grid gap-2 mt-3">

                                                            <!-- <button class="btn btn-sm btn-outline-secondary" type="button">Booking</button> -->
                                                            <a href="<?= base_url('mobil/sewa_mobil/' .  $mobil_list['mobil_id']) ?>" class="btn btn-sm btn-primary" type="button">Sewa</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <?php $this->load->view('mobil/modal/detail_mobil_modal') ?>

                                        <?php endif ?>
                                        <!-- End Card with an image on top -->
                                    <?php endforeach ?>


                                </div>

                            </div>
                        </div>

                        <!-- <?php endforeach ?> -->
                    </div>
                    <!-- End Customers Card -->





                </div>
            </div><!-- End Left side columns -->



        </div>
    </section>

</main><!-- End #main -->