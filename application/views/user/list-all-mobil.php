<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>


        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">User</li>
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



                    <div class="card-body">

                        <h5 class="card-title text-center">Daftar Semua Mobil </h5>

                        <?= $this->session->flashdata('message') ?>


                        <!-- Modal Add Mobil -->
                        <button type="button" class="btn btn-primary btn-sm mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addNewMobil">
                            <i class="bi bi-plus-square" data-bs-toggle="modal" data-bs-target="#addSubMenu"> </i>
                            Tambah
                        </button>
                        <!-- Modal Tambah Mobil -->

                        <?php $this->load->view('user/modal/add-mobil-modal') ?>

                        <table class="table table-border datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Mobil</th>
                                    <th scope="col">Merek</th>


                                    <th scope="col">NoPol</th>
                                    <th scope="col">Pemilik</th>
                                    <th scope="col">Driver</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($all_mobil as $mobil) : ?>
                                    <?php $hrg_booking = $mobil['harga_sewa_mobil'] / 100 * 50 ?>
                                    <?php $driver = $mobil['driver_mobil'] == 1 ? 'Tersedia' : 'Tidak Tersedia' ?>

                                    <?php if ($mobil['status_mobil'] == 1) {
                                        $badge_sts = 'success';
                                        $status = 'Ready';
                                    } else if (($mobil['status_mobil'] == 2)) {
                                        $badge_sts = 'primary';
                                        $status = 'Disewa';
                                    } else {
                                        $badge_sts = 'warning';
                                        $status = 'Dibooking';
                                    } ?>


                                    <?php if ($mobil['is_active'] == 1) {
                                        $badge_act = 'info';
                                        $is_active = 'Active';
                                    } else {
                                        $badge_act = 'secondary';
                                        $is_active = 'Non Active';
                                    } ?>

                                    <tr>
                                        <th scope="row"><a href="#"><?= $no++ ?></a></th>
                                        <td><a href="#" class="text-secondary fw-bold"><?= $mobil['nama_mobil'] ?></a></td>
                                        <td><?= $mobil['nama_merek'] ?></td>


                                        <td><?= $mobil['nopol_mobil'] ?></td>
                                        <td><?= $mobil['pemilik_mobil'] ?></td>
                                        <td><?= $driver ?></td>
                                        <td><span class="badge bg-<?= $badge_sts ?>"><?= $status ?></span></td>
                                        <td><span class="badge bg-<?= $badge_act ?>"><?= $is_active ?></span></td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMobil<?= $mobil['mobil_id'] ?>"><i class="bi bi-pencil-square text-white"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteSubMenu"><i class="bi bi-trash"></i></button>

                                        </td>
                                    </tr>
                                    <!-- Modal Tambah Mobil -->
                                <?php endforeach ?>


                            </tbody>
                        </table>

                        <?php $this->load->view('user/modal/edit-mobil-modal') ?>

                    </div>

                </div>
            </div><!-- End Recent Sales -->











        </div>
    </section>

</main><!-- End #main -->