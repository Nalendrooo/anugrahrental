<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Customer</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">




            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">



                    <div class="card-body">
                        <h5 class="card-title">Saat ini disewa <span>| <?= date('D, d M Y') ?></span></h5>

                        <table class="table table-border datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">Mobil</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Waktu Pengambilan</th>
                                    <th scope="col">Driver</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Metode</th>
                                    <th scope="col">Waktu Pembayaran</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>

                                <?php foreach ($list_disewa as $disewa) : ?>
                                    <?php if ($disewa['status_sewa'] == 1) {
                                        $badges_sts = 'primary';
                                        $status = 'Terverifikasi';
                                    } else {
                                        $badges_sts = 'danger';
                                        $status = 'Belum Terverifikasi';
                                    } ?>

                                    <?php if ($disewa['metode_pembayaran_sewa'] == 'BNI') {
                                        $badges_bnk = 'warning';
                                    } elseif ($disewa['metode_pembayaran_sewa'] == 'BRI') {
                                        $badges_bnk = 'primary';
                                    } else {
                                        $badges_bnk = 'secondary';
                                    } ?>

                                    <?php if ($disewa['sewa_driver'] == 1) {
                                        $badges_drv = 'primary';
                                        $driver = 'Ya';
                                    } else {
                                        $badges_drv = 'danger';
                                        $driver = 'Tidak';
                                    } ?>

                                    <tr>
                                        <td scope="row"><a href="#"><?= $no++ ?></a></td>
                                        <td><?= $disewa['nama_mobil'] ?></td>
                                        <td><?= $disewa['lokasi_pengambilan'] ?></td>
                                        <td><?= $disewa['lama_sewa'] ?> jam</td>
                                        <td><?= $disewa['waktu_pengambilan'] ?> WIB</td>
                                        <td><span class="badge rounded-pill bg-<?= $badges_drv ?>"><?= $driver ?></span></a></td>
                                        <td>Rp. <?= number_format($disewa['total_pembayaran'], 0, '', '.') ?>,-</td>
                                        <td><span class="badge  bg-<?= $badges_bnk ?>">BANK <?= $disewa['metode_pembayaran_sewa'] ?></span></a></td>

                                        <td><?= $disewa['created_at'] ?></td>
                                        <td><span class="badge border-primary border-1 text-<?= $badges_sts ?>"><?= $status ?></span></td>
                                    <?php endforeach ?>

                                    </tr>



                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->











        </div>
    </section>

</main><!-- End #main -->