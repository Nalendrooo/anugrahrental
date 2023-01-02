<div class="modal fade" id="addMenu" tabindex="-1">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title ">Tambah Menu Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('menu/addMenu') ?>">

          <label for="inputText" class="col-sm-2 col-form-label">Menu</label>
          <div class="row mb-3">
            <div class="col-sm-12 ">
              <input type="text" class="form-control" name="menu_for">
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