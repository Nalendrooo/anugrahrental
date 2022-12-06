<?php foreach ($user_sub_menu as $sub_menu) : ?>
    <div class="modal fade" id="editSubMenu<?= $sub_menu['sub_menu_id'] ?>" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title ">Edit Sub Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url('menu/editSubMenu') ?>">

                        <div>
                            <input type="hidden" class="form-control" name="sub_menu_id" value="<?= $sub_menu['sub_menu_id'] ?>">
                        </div>

                        <label class="col-sm-2 col-form-label">Menu</label>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <select class="form-select" name="menu_id" aria-label="Default select example">
                                    <?php foreach ($user_menu as $menu) : ?>

                                        <!-- Selected -->
                                        <?php $selected = $menu['menu_id'] == $sub_menu['menu_id'] ? "selected" : "" ?>
                                        <option value="<?= $menu['menu_id']; ?>" <?= $selected ?>><?= $menu['menu_for']; ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 ms-1">
                            <div class="form-check form-switch">
                                <?php if ($sub_menu['is_active'] == 1) {
                                    $checked = "checked";
                                    $active = "Active";
                                } else {
                                    $active = "Non Active";
                                }  ?>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="is_active" <?= $checked ?>>
                                <label class="form-check-label" for="flexSwitchCheckDefault"><?= $active ?></label>
                            </div>
                        </div>
                        <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                        <div class="row mb-3">
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" name="title_menu" value="<?= $sub_menu['title_menu'] ?>">
                            </div>
                        </div>
                        <label for="inputText" class="col-sm-2 col-form-label">URL</label>
                        <div class="row mb-3">
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" name="url_menu" value="<?= $sub_menu['url_menu'] ?>">
                            </div>
                        </div>
                        <label for="inputText" class="col-sm-2 col-form-label">Icons</label>
                        <div class="row mb-3">
                            <div class="col-sm-12 ">
                                <input type="text" class="form-control" name="icon_menu" value="<?= $sub_menu['icon_menu'] ?>">
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
    <!-- End Basic Modal-->
<?php endforeach  ?>