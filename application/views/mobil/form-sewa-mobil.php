<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Mobil</a></li>
                <li class="breadcrumb-item">Daftar Mobil</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php foreach ($data_mobil as $mobil) : ?>
        <section class="section profile">





            <div class="card">
                <div class="card-body pt-3">
                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Form Sewa
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                Lihat Detail
                            </button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                            <div class="row g-0">
                                <div class="col-md-4 p-3">
                                    <img src="<?= base_url('assets/img/produk/ayla.png') ?>" class="img-fluid rounded-start" alt="...">
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"> <?= $mobil['nama_mobil'] ?></h5>

                                        <form action="<?= base_url('mobil/pilih_metode_pembayaran') ?>" method="post" class="row g-3">
                                            <input type="hidden" class="form-control" value="<?= $user['user_id'] ?>" name="user_id">
                                            <input type="hidden" class="form-control" value="<?= $mobil['mobil_id'] ?>" name="mobil_id">

                                            <div class="col-md-12">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" value="<?= $user['username'] ?>" disabled>
                                                <input type="hidden" value="<?= $user['username'] ?>" name="username_cust">

                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" value="<?= $user['email'] ?>" name="email_cust" disabled>
                                                <input type="hidden" value="<?= $user['email'] ?>" name="email_cust">
                                            </div>
                                            <div class="col-12">
                                                <label>Lokasi Pengambilan</label>

                                                <textarea class="form-control" style="height: 100px;" name="lokasi_pengambilan"></textarea>

                                            </div>
                                            <div class="col-md-8">
                                                <label class="form-label">Handphone</label>
                                                <input type="text" class="form-control" name="handphone">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Waktu Pengambilan</label>
                                                <select name="waktu_pengambilan" class="form-select">
                                                    <?php $waktu_pengambilan = ['01:00', '03:00', '05:00', '07:00', '09:00', '11:00'] ?>
                                                    <?php foreach ($waktu_pengambilan as $waktu) : ?>
                                                        <option value="<?= $waktu ?>"><?= $waktu ?> WIB</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Lama Sewa</label>
                                                <select name="lama_sewa" class="form-select">
                                                    <option value="24" selected>24jam - Rp. <?= number_format($mobil['harga_sewa_mobil'] * 1, 0, '', '.') ?>,-</option>
                                                    <option value="48">48jam - Rp. <?= number_format($mobil['harga_sewa_mobil'] * 2, 0, '', '.') ?>,-</option>
                                                    <option value="72">72jam - Rp. <?= number_format($mobil['harga_sewa_mobil'] * 3, 0, '', '.') ?>,-</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Driver</label>
                                                <select name="sewa_driver" class="form-select">
                                                    <option value="1">Driver - Rp. <?= number_format($mobil['harga_sewa_mobil'] * 0.5, 0, '', '.') ?>/24jam</option>
                                                    <option value="0">Tanpa Driver</option>
                                                </select>
                                            </div>

                                            <div class="d-grid gap-2 mt-4">
                                                <button class="btn btn-primary" type="submit">Sewa Sekarang</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div><!-- End Card with an image on left -->


                        </div>



                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <!-- Card with an image on left -->

                            <div class="row g-0">
                                <div class="col-md-4 p-3">
                                    <img src="<?= base_url('assets/img/produk/ayla.png') ?>" class="img-fluid rounded-start" alt="...">
                                    <!-- <img src="assets/img/card.jpg" class="img-fluid rounded-start" alt="..."> -->
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"> Details</h5>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 label fw-bold">Nama</div>
                                            <div class="col-lg-8 col-md-8"><?= $mobil['nama_mobil'] ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 label fw-bold">Merek</div>
                                            <div class="col-lg-8 col-md-8"><?= $mobil['nama_merek'] ?></div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 label fw-bold">Kapasitas</div>
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

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 label fw-bold">Sewa</div>
                                            <div class="col-lg-8 col-md-8">Rp. <?= number_format($mobil['harga_sewa_mobil'], 0, '', '.')  ?>/24jam</div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- End Card with an image on left -->



                        </div>

                    </div><!-- End Default Tabs -->

                </div>





        </section>
        <div class="card">
            <div class="card-body">
                <div class="card-title">Aturan</div>
                <ul>
                    <li> Durasi sewa per hari adalah 24 jam.</li>
                    <li> Overtime per-jam: Rp 50.000 (unit dibawah 2000 cc) dan Rp 75.000 (unit diatas 2000 cc).</li>
                    <li> Biaya akan dikenakan jika durasi sewa melebihi 12 jam pemakaian atau lewat pukul 23.59 per-hari rental.</li>
                    <li> Akomodasi pengemudi (Overnight Lodging Cost): Rp 150.000 per-malam. Biaya akan dikenakan jika penggunaan unit dan pengemudi melewati pukul 23.59 baik dalam dan luar kota, serta mengharuskan pengemudi untuk menginap.</li>
                    <li> Tambahan ini tidak termasuk penginapan pengemudi.</li>
                </ul>
            </div>
        </div>

    <?php endforeach ?>
</main><!-- End #main -->