<?php foreach ($mobil as $mobil_list) : ?>

    <div class="modal fade" id="detailMobilModal<?= $mobil_list['mobil_id'] ?>" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <!-- 
                    <img src="<?= base_url('assets/img/produk/ayla.png') ?>" alt="Profile" class="img-thumbnail"> -->

                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body m-1 mt-2">

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Nama</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil_list['nama_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Merek</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil_list['nama_merek'] ?></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Kap</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil_list['kapasitas_mobil'] ?> orang</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Tahun</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil_list['tahun_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Tipe</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil_list['tipe_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Warna</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil_list['warna_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Nopol</div>
                                    <div class="col-lg-8 col-md-8"><?= $mobil_list['nopol_mobil'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label fw-bold">Sewa</div>
                                    <div class="col-lg-8 col-md-8">Rp. <?= number_format($mobil_list['harga_sewa_mobil'], 0, '', '.')  ?>/24jam</div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

<?php endforeach ?>