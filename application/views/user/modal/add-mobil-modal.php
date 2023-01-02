<div class="modal fade" id="addNewMobil" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mobil Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action=" <?= base_url('user/tambah_mobil_baru') ?>" method="post">

                    <div class="col-md-12 ">
                        <label class="form-label">Nama Mobil</label>
                        <input type="text" class="form-control" name="nama_mobil">
                    </div>
                    <div class="col-md-12 ">
                        <label class="form-label">Merek</label>
                        <select class="form-select" name="merek_id">
                            <?php foreach ($merek as $mrk) : ?>
                                <option value="<?= $mrk['merek_id'] ?>"><?= $mrk['nama_merek'] ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Kapasitas</label>
                        <input type="number" class="form-control" name="kapasitas_mobil">
                    </div>

                    <div class="col-4">
                        <label class="form-label">Warna</label>
                        <input type="text" class="form-control" name="warna_mobil">
                    </div>

                    <div class="col-4">
                        <label class="form-label">Tahun</label>
                        <input type="year" class="form-control" name="tahun_mobil">
                    </div>

                    <div class="col-4">
                        <label class="form-label">Tipe</label>
                        <select class="form-select" name="tipe_mobil">
                            <?php $list_tipe = ['Pribadi', 'Sport', 'Sedan', 'Off Road', 'Klasik'] ?>
                            <?php foreach ($list_tipe as $tipe) : ?>
                                <option value="<?= $tipe ?>"><?= $tipe ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status_mobil">
                            <option value="1" selected>Ready</option>
                            <option disabled>Dibooking</option>
                            <option disabled>Disewa</option>
                            </option>
                        </select>
                    </div>



                    <div class="col-md-4">
                        <label class="form-label">Driver</label>
                        <select class="form-select" name="driver_mobil">
                            <option value="tersedia">Tersedia</option>
                            <option value="tidak-tersedia">Tidak Tersedia</option>
                        </select>
                    </div>

                    <div class="col-md-7">
                        <label class="form-label">Harga Sewa</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="harga_sewa_mobil">
                        </div>
                    </div>

                    <div class="col-md-5 ">
                        <label class="form-label">Nomor Polisi</label>
                        <input type="text" class="form-control" name="nopol_mobil">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="image_mobil">
                    </div>

                    <div class="col-md-12 ">
                        <label class="form-label">Nama Pemilik</label>
                        <input type="text" class="form-control" name="pemilik_mobil">
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_active" value="on">
                                    <label class="form-check-label">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_active" value="off">
                                    <label class="form-check-label">
                                        Non Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>