<?php $this->load->view('head'); ?>

<!-- modal mon stock debut -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: lightseagreen;">
        <h5 class="modal-title" style="color:white" id="exampleModalLongTitle">Mon Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
</br>
      <div class="input-group-prepend container MyIcons">
            <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-info"></i> </span>
        </div>
        <div class="container" style="width: 50%;">
        <span class="text-center">Vous pouvez mettre à jour votre stock de masques si celui-ci a évolué</span>
      </div>
      <?php foreach($profil as $profile) {?>
    <div class="modal-body container" style="width: 70%;">
    <?php echo form_open_multipart('/Welcome/updateStock'); ?>
        <span class="container" style="color: lightseagreen ;">Nombre de masques disponibles</span>
      <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" style="color: lightseagreen;"> <i class="fa fa-user"></i> </span>
            </div>
            <input required name="stock" type="number" value="<?php echo $profile->nb_mask_dispo ?>" class="form-control" placeholder="Nom complet">
      </div>
      <div class="container" style="width: 50% ;">
      <button type="submit" style="border-radius: 25px ;" style="width: 100% ;" class="btn btn-primary">Mettre à jour</button>
      </div>
      <?php echo form_close(); ?>
      </br>
      </div>
      <?php } ?>
     
    </div>
  </div>
</div>
<!-- modal mon stock fin -->

