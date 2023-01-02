<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Ubah Data Diri</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('customer') ?>">Customer</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('customer') ?>">Profile</a></li>
                <li class="breadcrumb-item active">Form Ubah Data Diri</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        </div>

        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-data-diri">Data Diri</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <form action="" <?= base_url('customer/ubah_data_diri') ?> method="post">
                            <input value="<?= $customer['customer_id'] ?>" name="customer_id" type="hidden" class="form-control">

                            <div class="row mb-3">
                                <label for="about" class="col-md-3 col-lg-3 col-form-label">Alamat</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="alamat_customer" class="form-control" id="about" style="height: 90px"><?= $customer['alamat_customer'] ?></textarea>
                                    <?= form_error('alamat_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="company" class="col-md-3 col-lg-3 col-form-label">Kecamatan</label>
                                <div class="col-md-8 col-lg-3">
                                    <input value="<?= $customer['kecamatan_customer'] ?>" name="kecamatan_customer" type="text" class="form-control">
                                    <?= form_error('kecamatan_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-8 col-lg-1">
                                </div>
                                <label for="company" class="col-md-3 col-lg-2 col-form-label">Kabupaten / Kota</label>
                                <div class="col-md-8 col-lg-3">
                                    <input value="<?= $customer['kota_customer'] ?>" name="kota_customer" type="text" class="form-control">
                                    <?= form_error('kota_suctomer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <?php if ($customer['jenis_kelamin_customer'] == 'Laki-laki') {
                                $check_male = 'checked';
                                $check_female = '';
                            } else {
                                $check_male = '';
                                $check_female = 'checked';
                            } ?>


                            <div class="row">
                                <label for="company" class="col-md-3 col-lg-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-8 col-lg-2">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $check_male ?> type="radio" name="jenis_kelamin_customer" value="Laki-laki">
                                        <label class="form-check-label">
                                            Laki - Laki
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-2">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $check_female ?> type="radio" name="jenis_kelamin_customer" value="Perempuan">
                                        <label class="form-check-label">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label for="company" class="col-md-3 col-lg-3 col-form-label"></label>
                                <div class="col-md-8 col-lg-2">
                                    <?= form_error('jenis_kelamin_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3 mt-3">
                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Nomor HP</label>
                                <div class="col-md-8 col-lg-5">
                                    <input value="<?= $customer['nomor_hp_customer'] ?>" name="nomor_hp_customer" type="text" class="form-control">
                                    <?= form_error('nomor_hp_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <?php if ($customer['status_pekerjaan_customer'] == 'Bekerja') {
                                $check_bekerja = 'checked';
                                $check_tidak_bekerja = '';
                            } else {
                                $check_bekerja = '';
                                $check_tidak_bekerja = 'checked';
                            } ?>


                            <div class="row">
                                <label for="company" class="col-md-3 col-lg-3 col-form-label">Status Pekerjaan</label>
                                <div class="col-md-8 col-lg-2">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $check_bekerja ?> type="radio" name="status_pekerjaan_customer" value="Bekerja">
                                        <label class="form-check-label">
                                            Bekerja
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-8 col-lg-2">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $check_tidak_bekerja ?> type="radio" name="status_pekerjaan_customer" value="Tidak Bekerja">
                                        <label class="form-check-label">
                                            Tidak Bekerja
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="company" class="col-md-3 col-lg-3 col-form-label"></label>
                                <div class="col-md-8 col-lg-2">
                                    <?= form_error('status_pekerjaan_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="row mb-3 mt-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Pekerjaan Sekarang</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" name="pekerjaan_sekarang_customer" aria-label="Default select example">

                                        <?php $list_kerja = ['Lainnya', 'Bisnis Pribadi', 'Karyawan Swasta', 'Pegawai Negeri Sipil', 'Freelance']; ?>

                                        <?php foreach ($list_kerja as $a) { ?>
                                            <?php $selected = $customer['pekerjaan_sekarang_customer'] == $a ?  'selected' : ''; ?>

                                            <option value="<?= $a; ?> " <?= $selected ?>><?= $a; ?></option>
                                        <?php } ?>

                                    </select>
                                    <?= form_error('pekerjaan_sekarang_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-lg-3 col-form-label">Sosmed</label>
                                <div class="col-md-8 col-lg-4">
                                    <input value="<?= $customer['sosmed_customer'] ?>" name="sosmed_customer" type="text" class="form-control">
                                    <?= form_error('sosmed_customer', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="d-grid gap-2 mt-5">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Bordered Tabs -->

                </div>
            </div>


    </section>

</main><!-- End #main -->