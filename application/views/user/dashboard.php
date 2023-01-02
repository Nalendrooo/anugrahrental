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

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Penghasilan -->
                    <div class="col-xxl-4 col-md-4">
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
                                <h5 class="card-title">Total Penghasilan <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle text-white bg-success d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">


                                        <h6>1.350.000,-</h6>
                                        <span class="text-secondary small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">Dari pendapatan</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Penghasilan -->


                    <!-- Jumlah Customer -->
                    <div class="col-xxl-4 col-md-4">
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
                                <h5 class="card-title">Jumlah Customer <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle text-white bg-primary d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">

                                        <?php $this->db->where('role', 3) ?>
                                        <?php $jumlah_customer = $this->db->get('user')->num_rows() ?>

                                        <h6><?= $jumlah_customer ?> customer</h6>

                                        <?php $this->db->where('role', 3) ?>
                                        <?php $this->db->where('is_active', 0) ?>
                                        <?php $jumlah_customer_non_active = $this->db->get('user')->num_rows() ?>

                                        <span class="text-secondary small pt-1 fw-bold"><?= $jumlah_customer_non_active ?> customer</span> <span class="text-muted small pt-2 ps-1">Belum Aktivasi</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Jumlah Customer -->

                    <!-- Jumlah Mobil -->
                    <div class="col-xxl-4 col-md-4">
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
                                <h5 class="card-title">Jumlah Mobil <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle text-white bg-danger d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">

                                        <?php $jumlah_all_mobil = $this->db->get('mobil')->num_rows() ?>
                                        <h6><?= $jumlah_all_mobil ?> mobil</h6>

                                        <?php $this->db->where('status_mobil', 2) ?>
                                        <?php $jumlah_mobil_ready = $this->db->get('mobil')->num_rows() ?>
                                        <span class="text-secondary small pt-1 fw-bold"><?= $jumlah_mobil_ready ?> mobil</span> <span class="text-muted small pt-2 ps-1">Sedang Disewa</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Jumlah Mobil -->

                    <div class="col-lg-8 ">
                        <div class="row">

                            <!-- Customers Card -->
                            <!-- <div class="col-xxl-12 col-xl-12"> -->

                            <!-- <div class="card info-card customers-card">

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
                                </div> -->

                            <!-- </div> -->
                            <!-- End Customers Card -->



                            <!-- Recent Sales -->
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">


                                    <div class="card-body">
                                        <h5 class="card-title">Daftar Customer <span>| <?= date('D, d M Y') ?></span></h5>


                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Customer</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>

                                                <?php foreach ($list_all_customer as $customer) : ?>
                                                    <?php if ($customer['is_active'] == 1) {
                                                        $badge_atv = 'success';
                                                        $is_active = 'Active';
                                                    } else {
                                                        $badge_atv = 'secondary';
                                                        $is_active = 'Non active';
                                                    } ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $customer['username'] ?></td>
                                                        <td><?= $customer['email'] ?></td>

                                                        <td><span class="badge bg-<?= $badge_atv ?>"><?= $is_active ?></span></td>
                                                    </tr>
                                                <?php endforeach ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div><!-- End Recent Sales -->

                            <!-- Top Selling -->
                            <!-- <div class="col-12">
                                <div class="card top-selling overflow-auto">

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

                                    <div class="card-body pb-0">
                                        <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Preview</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Sold</th>
                                                    <th scope="col">Revenue</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                                                    <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                                                    <td>$64</td>
                                                    <td class="fw-bold">124</td>
                                                    <td>$5,828</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                                                    <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                                                    <td>$46</td>
                                                    <td class="fw-bold">98</td>
                                                    <td>$4,508</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                                                    <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                                                    <td>$59</td>
                                                    <td class="fw-bold">74</td>
                                                    <td>$4,366</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                                                    <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                                                    <td>$32</td>
                                                    <td class="fw-bold">63</td>
                                                    <td>$2,016</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                                                    <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                                                    <td>$79</td>
                                                    <td class="fw-bold">41</td>
                                                    <td>$3,239</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div> -->
                            <!-- End Top Selling -->

                        </div>
                    </div><!-- End Left side columns -->

                    <!-- Right side columns -->
                    <div class="col-lg-4">




                        <!-- Website Traffic -->
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

                            <div class="card-body pb-0">
                                <h5 class="card-title">Grafik Merek <span>| <?= date('D, d M Y') ?></span></h5>

                                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#trafficChart")).setOption({
                                            tooltip: {
                                                trigger: 'item'
                                            },
                                            legend: {
                                                top: '5%',
                                                left: 'center'
                                            },
                                            series: [{
                                                name: 'Merek',
                                                type: 'pie',
                                                radius: ['40%', '70%'],
                                                avoidLabelOverlap: false,
                                                label: {
                                                    show: false,
                                                    position: 'center'
                                                },
                                                emphasis: {
                                                    label: {
                                                        show: true,
                                                        fontSize: '18',
                                                        fontWeight: 'bold'
                                                    }
                                                },
                                                labelLine: {
                                                    show: false
                                                },
                                                data: [
                                                    <?php foreach ($list_merek as $merek) : ?>

                                                        <?php $this->db->where('merek_id', $merek['merek_id']) ?>
                                                        <?php $jumlah = $this->db->get('mobil')->num_rows() ?> {

                                                            value: <?= $jumlah ?>,
                                                            name: '<?= $merek['nama_merek'] ?>'

                                                        },
                                                    <?php endforeach ?>

                                                ]
                                            }]
                                        });
                                    });
                                </script>

                            </div>
                        </div><!-- End Website Traffic -->

                        <!-- News & Updates Traffic -->
                        <!-- <div class="card">
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

                            <div class="card-body pb-0">
                                <h5 class="card-title">News &amp; Updates <span>| Today</span></h5> -->

                        <!-- <div class="news">
                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-1.jpg" alt="">
                                        <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                        <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-2.jpg" alt="">
                                        <h4><a href="#">Quidem autem et impedit</a></h4>
                                        <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-3.jpg" alt="">
                                        <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                        <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-4.jpg" alt="">
                                        <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                        <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="assets/img/news-5.jpg" alt="">
                                        <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                        <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                                    </div>

                                </div> -->
                        <!-- End sidebar recent posts-->

                        <!-- </div>
                        </div> -->
                        <!-- End News & Updates -->

                    </div><!-- End Right side columns -->

                </div>
    </section>

</main><!-- End #main -->