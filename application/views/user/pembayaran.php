<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>


        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">User</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">



            <!-- Sales Card -->
            <!-- <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

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
                        <h5 class="card-title">Sales <span>| Today</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
            <!-- End Sales Card -->


            <!-- Revenue Card -->
            <!-- <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

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
                        <h5 class="card-title">Revenue <span>| This Month</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>$3,264</h6>
                                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <!-- <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

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
                        <h5 class="card-title">Customers <span>| This Year</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>1244</h6>
                                <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                            </div>
                        </div>

                    </div>
                </div>

            </div> -->
            <!-- End Customers Card -->


            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->

                    <div class="card-body">
                        <h5 class="card-title">Pembayaran Deposit <span>| <?= date('D, d M Y') ?></span></h5>

                        <?= $this->session->flashdata('message'); ?>

                        <table class="table table-border datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Metode Pembayaran</th>
                                    <th scope="col">Waktu Pembayaran</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($deposit as $depo) : ?>
                                    <?php if ($depo['jenis_pembayaran_deposit'] == 'BNI') {
                                        $badges_bnk = 'warning';
                                    } elseif ($depo['jenis_pembayaran_deposit'] == 'BRI') {
                                        $badges_bnk = 'primary';
                                    } else {
                                        $badges_bnk = 'secondary';
                                    } ?>



                                    <tr>
                                        <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                        <th><a href="#"><?= $depo['username'] ?></a></th>
                                        <th><a href="<?= base_url('user/detail_bukti_pembayaran/') . $depo['user_id']  ?>"> <span class="badge  bg-<?= $badges_bnk ?>">BANK <?= $depo['jenis_pembayaran_deposit'] ?></span></a></th>
                                        <th><?= $depo['created_at'] ?></a></th>
                                        <th> <span class="badge border-danger border-1 text-danger">Belum Terverifikasi</span></th>


                                    </tr>
                                <?php endforeach ?>


                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->

                    <div class="card-body">
                        <h5 class="card-title">Pembayaran Sewa <span>| <?= date('m-h-y') ?></span></h5>

                        <table class="table table-border datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mobil</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Lama Sewa</th>
                                    <th scope="col">Total Biaya</th>
                                    <th scope="col">Metode Pembayaran</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($list_all_sewa as $sewa) : ?>
                                    <?php if ($sewa['metode_pembayaran_sewa'] == 'BNI') {
                                        $badges_bnk = 'warning';
                                    } elseif ($sewa['metode_pembayaran_sewa'] == 'BRI') {
                                        $badges_bnk = 'primary';
                                    } else {
                                        $badges_bnk = 'secondary';
                                    } ?>


                                    <tr>
                                        <td scope="row"><a href="#"><?= $no++ ?></a></td>

                                        <td><?= $sewa['nama_mobil'] ?></td>
                                        <td><?= $sewa['username'] ?></td>
                                        <td><?= $sewa['lama_sewa'] ?>jam</td>
                                        <td>Rp. <?= number_format($sewa['total_pembayaran'], 0, '', '.') ?>,-</td>
                                        <td> <span class="badge  bg-<?= $badges_bnk ?>">BANK <?= $sewa['metode_pembayaran_sewa'] ?></span></td>

                                        <td>
                                            <a href="<?= base_url('user/setujui_pembayaran_sewa/') . $sewa['sewa_id'] . '/' . $sewa['mobil_id'] ?>"><span class="badge bg-success">Setujui</span></a>
                                        </td>


                                    </tr>


                                <?php endforeach ?>


                            </tbody>
                        </table>


                    </div>

                </div>
            </div><!-- End Recent Sales -->











        </div>
    </section>

</main><!-- End #main -->