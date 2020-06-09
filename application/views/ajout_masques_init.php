<?php $this->load->view('head'); ?>

<!-- modal mes photos debut -->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header container" style="background-color: lightseagreen;">
        <h5 class="modal-title" style="color:white" id="exampleModalLabel">Ajouter Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
</br>
      <div class="modal-body container" style="width: 70%;">
      <?php echo form_open_multipart('/Welcome/insert_photo'); ?>
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-image"></i> </span>
                    </div>
                    <input required name="photo" id="photo" class="form-control" type="file">
                </div>
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-chart-line"></i> </span>
                    </div>
                    <input required name="price" class="form-control" placeholder="Prix Unitaire" type="number">
                    <select class="custom-select" style="max-width: 90px;">
                        <option selected>Fcfa</option>
                        <option value="1">Euro</option>
                        <option value="2">Dollard</option>
                    </select>
                </div>
</br>
                <div class="container" style="width: 50% ;">
                  <button type="submit" style="border-radius: 25px ;" style="width: 100% ;" class="btn btn-primary">Ajouter</button>
                </div>
     
      </div>
      <?php echo form_close(); ?>
      
    </div>
  </div>
</div>

<!-- modal mes photos debut -->