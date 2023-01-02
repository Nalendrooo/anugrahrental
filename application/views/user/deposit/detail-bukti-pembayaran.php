<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item">Pembayaran</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Alert flash data -->
    <?= $this->session->flashdata('message'); ?>

    <section class="section profile">

        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail</button>
                        </li>


                        </li>

                    </ul>
                    <div class="tab-content pt-2">




                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Bukti Pembayaran</h5>


                            <div class="row">
                                <div class="col-lg-9">
                                    <?php foreach ($detail_deposit as $depo) : ?>


                                        <img src="<?= base_url('/assets/img/bukti_transfer_deposit/') .   $depo['bukti_pembayaran_deposit']  ?>" alt="" width="100%">
                                    <?php endforeach ?>

                                </div>
                                <div class="col-lg-3">

                                    <a type="button" href="<?= base_url('user/setuju_pembayaran/') . $depo['user_id'] ?>" class="btn btn-success">
                                        <i class="bi bi-check-circle"></i> Setujui

                                    </a>
                                    <!-- <button type="button" class="btn btn-success">
                                            <i class="bi bi-check-circle"></i> Setujui
                                        </button> -->
                                    <br>
                                    <br>
                                    <!-- <a href="">
                                            <button type="button" class="btn btn-danger">
                                                <i class="bi bi-exclamation-octagon"></i>
                                                Tolak
                                            </button>
                                        </a> -->

                                </div>
                            </div>





                        </div>

                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->