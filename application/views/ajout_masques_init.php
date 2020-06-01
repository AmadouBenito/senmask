<?php $this->load->view('head'); ?>

<!-- modal mes photos debut -->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mes Photos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('/Welcome/doPublier'); ?>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Type du Masque</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01">
            <option selected>Choisir le type du masque</option>
            <option value="1">type 1</option>
            <option value="2">type 2</option>
            <option value="3">type 3</option>
          </select>
        </div>

        <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-chart-line"></i> </span>
                    </div>
                    <input required name="prix" class="form-control" placeholder="Prix Unitaire" type="number">
                    <select class="custom-select" style="max-width: 90px;">
                        <option selected>Fcfa</option>
                        <option value="1">Euro</option>
                        <option value="2">Dollard</option>
                    </select>
                </div>
      <span style="color: orange">Images acceptées: JPEG, JPG ou PNG</span>
                <!-- Image certificas -->
                <div class="form-group input-group" style="margin: unset">
                    <input class="form-control" placeholder="Photo de Masques" type="text" style="border: none !important; background: unset; padding: unset !important">
                </div>
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-image"></i> </span>
                    </div>
                    <input name="photo" id="photo" class="form-control" type="file">
                </div>
                
      </div>
      <?php echo form_close(); ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- modal mes photos debut -->