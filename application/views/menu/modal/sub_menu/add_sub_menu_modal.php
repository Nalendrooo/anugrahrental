<div class="modal fade" id="addSubMenu" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title ">New Sub Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('menu/addSubMenu') ?>">
                    <label class="col-sm-2 col-form-label">Menu</label>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <select class="form-select" name="menu_id" aria-label="Default select example">
                                <?php foreach ($user_menu as $menu) : ?>
                                    <option value="<?= $menu['menu_id']; ?>"><?= $menu['menu_for']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 ms-1">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="is_active" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>
                        </div>
                    </div>
                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                    <div class="row mb-3">
                        <div class="col-sm-12 ">
                            <input type="text" class="form-control" name="title_menu">
                        </div>
                    </div>
                    <label for="inputText" class="col-sm-2 col-form-label">URL</label>
                    <div class="row mb-3">
                        <div class="col-sm-12 ">
                            <input type="text" class="form-control" name="url_menu">
                        </div>
                    </div>
                    <label for="inputText" class="col-sm-2 col-form-label">Icons</label>
                    <div class="row mb-3">
                        <div class="col-sm-12 ">
                            <input type="text" class="form-control" name="icon_menu">
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
</div><!-- End Basic Modal-->