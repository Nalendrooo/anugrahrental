<?php foreach ($user_menu as $menu) : ?>
    <div class="modal fade" id="editMenu<?= $menu['menu_id']; ?>" tabindex="-1">

        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title ">Edit Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('menu/editMenu') ?>">

                        <input type="hidden" class="form-control" name="menu_id" value="<?= $menu['menu_id'] ?>">
                        <label for="inputText" class="col-sm-2 col-form-label">Menu</label>
                        <div class="row mb-3">
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" name="menu_for" value="<?= $menu['menu_for'] ?>">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>