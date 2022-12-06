<?php foreach ($user_menu as $menu) : ?>

    <div class="modal" tabindex="-1" id="deleteMenu<?= $menu['menu_id'] ?>">
        <div class="modal-dialog">
            <div class="modal-content" style="background: transparent;">
                <div class=" modal-body">
                    <form method="post" action="<?php echo base_url('menu/deleteMenu/' . $menu['menu_id']) ?>">

                        <div class="alert alert-danger d-flex align-items-center" role="alert">

                            <p class="mt-3 ms-3">
                                <span class="font-weight-bold">Anda yakin akan menghapus menu <strong><?= $menu['menu_for'] ?></strong> ?</span>
                                <span> Data tidak dapat dipulihkan kembali !</span>
                            </p>

                            <button type="submit" class="btn btn-danger btn-sm mt-5 "><i class="bi bi-trash3 text-white"></i></button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach ?>